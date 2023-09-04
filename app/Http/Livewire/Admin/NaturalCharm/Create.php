<?php

namespace App\Http\Livewire\Admin\NaturalCharm;

use App\Models\Gallery;
use Livewire\Component;
use Illuminate\Support\Str;
use App\Models\TravelObject;
use Livewire\WithFileUploads;
use App\Models\TravelObjectCategory;

class Create extends Component
{

    use WithFileUploads;


    public $title;
    public $description;
    public $location;
    public $long;
    public $lat;
    public $mainImage;
    public $galleries = [];
    public $travelObjectCategory;
    public $validationFailed = false;


    public function mount()
    {
        $this->newForm();
    }


    public function newForm()
    {
        $this->travelObjectCategory = TravelObjectCategory::where('category', 'Pesona Alam')->first();

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
        'title'             => 'required|min:3|max:180|unique:travel_objects,title',
        'description'       => 'required|min:3',
        'location'          => 'required|min:3|max:180',
        'lat'               => 'required',
        'mainImage'         => 'required|image|mimes:jpg,png|max:1024',
        'galleries.*.image' => 'required|image|mimes:jpg,png|max:1024',
    ];


    protected $messages = [
        'required'              => 'Wajib diisi',
        'min'                   => 'Minimal 3 karakter',
        'title.max'             => 'Maksimal 180 karakter',
        'unqiue'                => 'Judul sudah digunakan',
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

        $mainImage = Str::random(10) . '.' . $this->mainImage->extension();

        $this->mainImage->storeAs('public/images/travel-objects', $mainImage);
        
        $travelObject = TravelObject::create([
            'code'                      => 'TRO00' . Str::upper(Str::random(3)),
            'title'                     => Str::title($this->title),
            'slug'                      => Str::slug($this->title),
            'description'               => $this->description,
            'location'                  => Str::title($this->location),
            'lat'                       => $this->lat,
            'long'                      => $this->long,
            'main_image'                => $mainImage,
            'travel_object_category_id' => $this->travelObjectCategory->id
        ]);


        foreach ($this->galleries as $image)
        {
            $imageName = Str::random(10) . '.' . $image['image']->extension();

            $image['image']->storeAs('public/images/galleries/travel-objects', $imageName);

            Gallery::create([
                'filename'         => $imageName,
                'travel_object_id' => $travelObject->id
            ]);
        }

        $this->reset();
        $this->newForm();

        $this->dispatchBrowserEvent('reset', ['resetDate' => true]);

        session()->flash('message', 'Data pesona alam baru berhasil ditambahkan');
    }


    public function render()
    {
        return view('livewire.admin.natural-charm.create')
                    ->layoutData([
                        'titleBar'      => 'Tambah Pesona Alam',
                        'heroImage'     => 'natural-charm.jpg',
                        'heroGradient'  => 'from-yellow-600/75 to-yellow-800/75',
                        'breadcrumbs' => [
                            ['route' => route('admin.naturalCharm.index'), 'label' => 'daftar pesona alam'],
                            ['route' => '#', 'label' => 'tambah pesona alam'],
                        ]
                    ]);
    }

}
