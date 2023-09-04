<?php

namespace App\Http\Livewire\Admin\Lodging;

use App\Models\Facility;
use App\Models\Gallery;
use App\Models\Lodging;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class Edit extends Component
{

    use WithFileUploads;


    public $lodging;
    public $title;
    public $description;
    public $location;
    public $lat;
    public $long;
    public $priceStartingFrom;
    public $mainImage;
    public $facilities = [];
    public $facilityRemoved = [];
    public $galleries = [];
    public $oldGalleries = [];
    public $oldGalleryRemoved = [];
    public $validationFailed = false;


    public function mount(Lodging $lodging)
    {
        $this->lodging           = $lodging;
        $this->title             = $lodging->title;
        $this->description       = $lodging->description;
        $this->location          = $lodging->location;
        $this->lat               = $lodging->lat;
        $this->long              = $lodging->long;
        $this->priceStartingFrom = $lodging->price_starting_from;

        foreach ($lodging->facilities as $facility)
        {
            array_push($this->facilities, ['value' => $facility->value, 'facilityId' => $facility->id]);
        }

        foreach ($lodging->galleries as $gallery)
        {
            array_push($this->oldGalleries, $gallery);
        }
    }


    public function addFacility()
    {
        array_push($this->facilities, ['value']);
    }


    public function deleteFacility($index, $facilityId = null)
    {
        if (count($this->facilities) > 1)
        {
            if ($facilityId)
            {
                array_push($this->facilityRemoved, $facilityId);
            }

            unset($this->facilities[$index]);
            array_values($this->facilities);
        }
    }


    public function addGelleryImage()
    {
        array_push($this->galleries, ['image']);
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


    protected function rules()
    {
        return [
            'title' =>  ['required', 'min:3', 'max:180', function ($attr, $value, $fail) {
                            if ($this->lodging->slug != Str::slug($value))
                            {
                                if (Lodging::where('slug', Str::slug($value))->first())
                                {
                                    $fail('Judul sudah digunakan');
                                }
                            }
                        }],
            'description'        => ['required', 'min:3'],
            'location'           => ['required', 'min:3', 'max:180'],
            'lat'                => ['required'],
            'priceStartingFrom'  => ['required', 'integer', 'min:0'],
            'mainImage'          => ['nullable', 'image', 'mimes:jpg,png', 'max:1024'],
            'facilities.*.value' => ['required', 'min:3', 'max:250'],
            'galleries.*.image'  => ['required', 'image', 'mimes:jpg,png', 'max:1024']
        ];
    }


    protected $messages = [
        'required'               => 'Wajib diisi',
        'title.min'              => 'Minimal 3 karakter',
        'title.max'              => 'Maksimal 180 karakter',
        'unique'                 => 'Judul sudah digunakan',
        'desription.min'         => 'Minimal 3 karakter',
        'location.min'           => 'Minimal 3 karakter',
        'location.max'           => 'Maksimal 180 karakter',
        'integer'                => 'Nilai tidak valid',
        'priceStartingFrom.min'  => 'Nilai minimum Rp 0',
        'image'                  => 'Wajib gambar',
        'mimes'                  => 'Ekstensi yang diperbolehkan .jpg dan .png',
        'image.max'              => 'Ukuran maksimal 1MB',
        'facilities.*.value.min' => 'Minimal 3 karakter',
        'facilities.*.value.max' => 'Maksimlam 250 karakter',
        'galleries.*.image.max'  => 'Ukuran maksimal 1MB',
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

        $this->lodging->update([
            'title'               => Str::title($this->title),
            'slug'                => Str::slug($this->title),
            'description'         => $this->description,
            'location'            => Str::title($this->location),
            'lat'                 => $this->lat,
            'long'                => $this->long,
            'price_starting_from' => $this->priceStartingFrom
        ]);

        if ($this->mainImage)
        {
            Storage::delete('public/images/lodgings/' . $this->lodging->main_image);

            $imageName = Str::random(10) . '.' . $this->mainImage->extension();

            $this->mainImage->storeAs('public/images/lodgings', $imageName);

            $this->lodging->update([
                'main_image' => $imageName
            ]);
        }


        $facilityWasChanged = [];
        foreach ($this->facilities as $itemFacility)
        {
            if (isset($itemFacility['facilityId']))
            {
                $facility = Facility::find($itemFacility['facilityId']);

                $facility->update([
                    'value' => $itemFacility['value']
                ]);

                array_push($facilityWasChanged, $facility->wasChanged());
            }
            else 
            {
                Facility::create([
                    'value'     => $itemFacility['value'],
                    'lodging_id' => $this->lodging->id
                ]);

                array_push($facilityWasChanged, true);
            }
        }


        $galleryWasChanged = false;
        if ($this->galleries)
        {
            foreach ($this->galleries as $image)
            {
                if (! isset($image['id']))
                {
                    $imageName = Str::random(10) . '.' . $image['image']->extension();

                    $image['image']->storeAs('public/images/galleries/lodgings', $imageName);

                    Gallery::create([
                        'filename'   => $imageName,
                        'lodging_id' => $this->lodging->id
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


        if ($this->lodging->wasChanged() || $facilityWasChanged || $galleryWasChanged)
        {
            session()->flash('message', 'Berhasil melakukan perubahan data penginapan');
        }
    }


    public function render()
    {
        return view('livewire.admin.lodging.edit')
                    ->layoutData([
                        'titleBar'      => 'Ubah Penginapan',
                        'heroImage'     => 'lodging.jpg',
                        'heroGradient'  => 'from-green-600/75 to-green-800/75',
                        'breadcrumbs' => [
                            ['route' => route('admin.lodging.index'), 'label' => 'daftar penginapan'],
                            ['route' => route('admin.lodging.details', $this->lodging), 'label' => $this->lodging->title],
                            ['route' => '#', 'label' => 'ubah penginapan'],
                        ]
                    ]);
    }
}
