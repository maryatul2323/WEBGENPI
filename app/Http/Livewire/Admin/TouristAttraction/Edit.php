<?php

namespace App\Http\Livewire\Admin\TouristAttraction;

use App\Models\Gallery;
use Livewire\Component;
use Illuminate\Support\Str;
use App\Models\TravelObject;
use Livewire\WithFileUploads;
use App\Models\TravelObjectCategory;
use Illuminate\Support\Facades\Storage;

class Edit extends Component
{

    use WithFileUploads;


    public $touristAttraction;
    public $title;
    public $description;
    public $location;
    public $lat;
    public $long;
    public $mainImage;
    public $travelObjectCategories = [];
    public $travelObjectCategoryId;
    public $galleries = [];
    public $oldGalleries = [];
    public $oldGalleryRemoved = [];
    public $validationFailed = false;


    public function mount(TravelObject $travelObject)
    {
        if ($travelObject->travelObjectCategory->category == 'Pesona Alam') abort('404');

        $this->touristAttraction      = $travelObject;
        $this->title                  = $travelObject->title;
        $this->description            = $travelObject->description;
        $this->location               = $travelObject->location;
        $this->lat                    = $travelObject->lat;
        $this->long                   = $travelObject->long;
        $this->travelObjectCategoryId = $travelObject->travel_object_category_id;
        $this->travelObjectCategories = TravelObjectCategory::where('category', '!=', 'Pesona Alam')->get();

        foreach ($travelObject->galleries as $gallery)
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
                            if ($this->touristAttraction->slug != Str::slug($value))
                            {
                                if (TravelObject::where('slug', Str::slug($value))->first())
                                {
                                    $fail('Judul sudah digunakan');
                                }
                            }
                        }],
            'description'            => ['required', 'min:3'],
            'location'               => ['required', 'min:3', 'max:180'],
            'lat'                    => ['required'],
            'travelObjectCategoryId' => ['required'],
            'mainImage'              => ['nullable', 'image', 'mimes:jpg,png', 'max:1024'],
            'galleries.*.image'      => ['required', 'image', 'mimes:jpg,png', 'max:1024']
        ];
    }


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

        $this->touristAttraction->update([
            'title'                     => Str::title($this->title),
            'slug'                      => Str::slug($this->title),
            'description'               => $this->description,
            'location'                  => Str::title($this->location),
            'lat'                       => $this->lat,
            'long'                      => $this->long,
            'travel_object_category_id' => $this->travelObjectCategoryId
        ]);

        if ($this->mainImage)
        {
            Storage::delete('public/images/travel-objects/' . $this->touristAttraction->main_image);

            $mainImage = Str::random(10) . '.' . $this->mainImage->extension();

            $this->mainImage->storeAs('public/images/travel-objects', $mainImage);

            $this->touristAttraction->update([
                'main_image' => $mainImage
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

                    $image['image']->storeAs('public/images/galleries/travel-objects', $imageName);

                    Gallery::create([
                        'filename'         => $imageName,
                        'travel_object_id' => $this->touristAttraction->id
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

        if ($this->touristAttraction->wasChanged() || $galleryWasChanged)
        {
            session()->flash('message', 'Berhasil melakukan perubahan data objek wisata');
        }
    }


    public function render()
    {
        return view('livewire.admin.tourist-attraction.edit')
                    ->layoutData([
                        'titleBar'      => 'Ubah Objek Wisata',
                        'heroImage'     => 'tourist-attraction.jpg',
                        'heroGradient'  => 'from-purple-600/75 to-purple-800/75',
                        'breadcrumbs' => [
                            ['route' => route('admin.touristAttraction.index'), 'label' => 'daftar objek wisata'],
                            ['route' => route('admin.touristAttraction.details', $this->touristAttraction), 'label' => $this->touristAttraction->title],
                            ['route' => '#', 'label' => 'ubah objek wisata'],
                        ]
                    ]);
    }

}
