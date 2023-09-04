<?php

namespace App\Http\Livewire\Admin\Event;

use App\Models\Event;
use App\Models\Gallery;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class Edit extends Component
{

    use WithFileUploads;


    public $event;
    public $title;
    public $description;
    public $location;
    public $lat;
    public $long;
    public $date;
    public $mainImage;
    public $galleries = [];
    public $oldGalleries = [];
    public $oldGalleryRemoved = [];
    public $validationFailed = false;


    public function mount(Event $event)
    {
        $this->event       = $event;
        $this->title       = $event->title;
        $this->description = $event->description;
        $this->location    = $event->location;
        $this->lat         = $event->lat;
        $this->long        = $event->long;
        $this->date        = $event->start_date->format('Y-m-d') . ' - ' . $event->till_date->format('Y-m-d');

        foreach ($event->galleries as $gallery)
        {
            array_push($this->oldGalleries, $gallery);
        }
    }   


    public function deleteGelleryImage($index, $galleryId = null)
    {
        if ((count($this->galleries) + count($this->oldGalleries)) > 1)
        {
            if ($galleryId)
            {
                array_push($this->oldGalleryRemoved, $galleryId);
                unset($this->oldGalleries[$index]);
            } 
            else 
            {
                unset($this->galleries[$index]);
                array_values($this->galleries);
            }
        }
    }


    public function addGelleryImage()
    {
        array_push($this->galleries, ['image']);
    }


    protected function rules()
    {
        return [
            'title' =>  ['required', 'min:3', 'max:180', function ($attr, $value, $fail) {
                            if ($this->event->slug != Str::slug($value))
                            {
                                if (Event::where('slug', Str::slug($value))->first())
                                {
                                    $fail('Judul sudah digunakan');
                                }
                            }
                        }],
            'description' => ['required', 'min:3'],
            'location'    => ['required', 'min:3', 'max:180'],
            'lat'         => ['required'],
            'date'        => ['required'],
            'mainImage'   => ['nullable', 'image', 'mimes:jpg,png', 'max:1024']
        ];
    }


    protected $messages = [
        'required'      => 'Wajib diisi',
        'min'           => 'Minimal 3 karakter',
        'title.max'     => 'Maksimal 180 karakter',
        'location.max'  => 'Maksimal 180 karakter',
        'image'         => 'Wajib gambar',
        'mimes'         => 'Ekstensi yang diperbolehkan .jpg dan .png',
        'mainImage.max' => 'Ukuran maksimal 1MB'
    ];


    public function updated($propertyName)
    {
        $this->validationFailed = false;

        $this->validateOnly($propertyName);
    }


    public function validation()
    {
        $this->validationFailed = true;

        $this->validate();

        $this->validationFailed = false;
    }


    public function submit()
    {
        $this->validation();

        $date = Str::of($this->date)->explode(' - ');

        $this->event->update([
            'title'       => Str::title($this->title),
            'slug'        => Str::slug($this->title),
            'description' => $this->description,
            'location'    => Str::title($this->location),
            'lat'         => $this->lat,
            'long'        => $this->long,
            'start_date'  => $date->first(),
            'till_date'   => $date->last(),
        ]);

        if ($this->mainImage)
        {
            Storage::delete('public/images/events/' . $this->event->main_image);

            $imageName = Str::random(10) . '.' . $this->mainImage->extension();

            $this->mainImage->storeAs('public/images/events', $imageName);

            $this->event->update([
                'main_image' => $imageName
            ]);
        }


        $galleryWasChanged = false;

        if ($this->galleries)
        {
            foreach ($this->galleries as $image)
            {
                if (! isset($image['id']))
                {
                    $imageName = Str::random(10) . '.' . $image['image']->extension();

                    $image['image']->storeAs('public/images/galleries/events', $imageName);

                    Gallery::create([
                        'filename' => $imageName,
                        'event_id' => $this->event->id
                    ]);

                    $galleryWasChanged = true;
                }
            }
        }


        if ($this->oldGalleryRemoved)
        {
            foreach ($this->oldGalleryRemoved as $id)
            {
                Gallery::find($id)->delete();
            }

            $galleryWasChanged = true;
        }


        if ($this->event->wasChanged() || $galleryWasChanged)
        {
            session()->flash('message', 'Berhasil melakukan perubahan data event');
        }
    }


    public function render()
    {
        return view('livewire.admin.event.edit')
                    ->layoutData([
                        'titleBar'      => 'Ubah Event',
                        'heroImage'     => 'event.jpg',
                        'heroGradient'  => 'from-pink-600/75 to-pink-800/75',
                        'breadcrumbs' => [
                            ['route' => route('admin.event.index'), 'label' => 'daftar event'],
                            ['route' => route('admin.event.details', $this->event), 'label' => $this->event->title],
                            ['route' => '#', 'label' => 'ubah event'],
                        ]
                    ]);
    }

}
