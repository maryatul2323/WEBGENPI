<?php

namespace App\Http\Livewire\Admin\Event;

use App\Models\Event;
use App\Models\Gallery;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class Create extends Component
{

    use WithFileUploads;


    public $title;
    public $description;
    public $location;
    public $lat;
    public $long;
    public $date;
    public $mainImage;
    public $galleries = [];
    public $validationFailed = false;


    public function mount()
    {
        array_push($this->galleries, ['image']);
    }


    public function deleteGelleryImage($index)
    {
        if (count($this->galleries) > 1)
        {
            unset($this->galleries[$index]);
            array_values($this->galleries);
        }
    }


    public function addGelleryImage()
    {
        array_push($this->galleries, ['image']);
    }


    protected $rules = [
        'title'             => 'required|min:3|max:180|unique:events,title',
        'description'       => 'required|min:3',
        'location'          => 'required|min:3|max:180',
        'lat'               => 'required',
        'date'              => 'required',
        'mainImage'         => 'required|image|mimes:jpg,png|max:1024',
        'galleries.*.image' => 'required|image|mimes:jpg,png|max:1024',
    ];


    protected $messages = [
        'required'              => 'Wajib diisi',
        'min'                   => 'Minimal 3 karakter',
        'title.max'             => 'Maksimal 180 karakter',
        'unique'                => 'Judul sudah digunakan',
        'location.max'          => 'Maksimal 180 karakter',
        'image'                 => 'Wajib gambar',
        'mimes'                 => 'Ekstensi yang diperbolehkan .jpg dan .png',
        'mainImage.max'         => 'Ukuran maksimal 1MB',
        'galleries.*.image.max' => 'Ukuran maksimal 1MB',
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

        $imageName = Str::random(10) . '.' .$this->mainImage->extension();

        $this->mainImage->storeAs('public/images/events', $imageName);

        $date = Str::of($this->date)->explode(' - ');

        $event = Event::create([
            'code'        => 'EVE00' . Str::upper(Str::random(3)),
            'title'       => Str::title($this->title),
            'slug'        => Str::slug($this->title),
            'description' => $this->description,
            'location'    => Str::title($this->location),
            'lat'         => $this->lat,
            'long'        => $this->long,
            'start_date'  => $date->first(),
            'till_date'   => $date->last(),
            'main_image'  => $imageName
        ]);


        foreach ($this->galleries as $image)
        {
            $imageName = Str::random(10) . '.' . $image['image']->extension();

            $image['image']->storeAs('public/images/galleries/events', $imageName);

            Gallery::create([
                'filename' => $imageName,
                'event_id' => $event->id
            ]);
        }


        $this->reset();
        
        array_push($this->galleries, ['image']);

        $this->dispatchBrowserEvent('reset', ['resetDate' => true]);

        session()->flash('message', 'Data event baru berhasil ditambahkan');
    }


    public function render()
    {
        return view('livewire.admin.event.create')
                    ->layoutData([
                        'titleBar'      => 'Tambah Event',
                        'heroImage'     => 'event.jpg',
                        'heroGradient'  => 'from-pink-600/75 to-pink-800/75',
                        'breadcrumbs' => [
                            ['route' => route('admin.event.index'), 'label' => 'daftar event'],
                            ['route' => '#', 'label' => 'tambah event'],
                        ]
                    ]);
    }
    
}
