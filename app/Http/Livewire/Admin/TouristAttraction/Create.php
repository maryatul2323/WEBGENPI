<?php

namespace App\Http\Livewire\Admin\TouristAttraction;

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
    public $lat;
    public $long;
    public $mainImage;
    public $travelObjectCategories = [];
    public $travelObjectCategoryId;
    public $galleries = [];
    public $validationFailed = false;


    public function mount()
    {
        $this->newForm();
    }


    public function newForm()
    {
        $this->travelObjectCategories = TravelObjectCategory::where('category', '!=', 'Pesona Alam')->get();
        
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
        'title'                  => 'required|min:3|max:180|unique:travel_objects,title',
        'description'            => 'required|min:3',
        'location'               => 'required|min:3|max:180',
        'lat'                    => 'required',
        'travelObjectCategoryId' => 'required',
        'mainImage'              => 'required|image|mimes:jpg,png|max:1024',
        'galleries.*.image'      => 'required|image|mimes:jpg,png|max:1024',
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
            'travel_object_category_id' => $this->travelObjectCategoryId
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

        session()->flash('message', 'Data objek wisata baru berhasil ditambahkan');
    }


    public function render()
    {
        return view('livewire.admin.tourist-attraction.create')
                    ->layoutData([
                        'titleBar'      => 'Tambah Objek Wisata',
                        'heroImage'     => 'tourist-attraction.jpg',
                        'heroGradient'  => 'from-purple-600/75 to-purple-800/75',
                        'breadcrumbs' => [
                            ['route' => route('admin.touristAttraction.index'), 'label' => 'daftar objek wisata'],
                            ['route' => '#', 'label' => 'tambah objek wisata'],
                        ]
                    ]);
    }

}
