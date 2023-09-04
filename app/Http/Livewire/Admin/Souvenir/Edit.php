<?php

namespace App\Http\Livewire\Admin\Souvenir;

use App\Models\Gallery;
use Livewire\Component;
use App\Models\Souvenir;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class Edit extends Component
{

    use WithFileUploads;


    public $souvenir;
    public $title;
    public $type;
    public $types;
    public $priceStartingFrom;
    public $description;
    public $mainImage;
    public $galleries = [];
    public $oldGalleries = [];
    public $oldGalleryRemoved = [];
    public $validationFailed = false;


    public function mount(Souvenir $souvenir)
    {
        $this->souvenir          = $souvenir;
        $this->title             = $souvenir->title;
        $this->type              = $souvenir->type;
        $this->priceStartingFrom = $souvenir->price_starting_from;
        $this->description       = $souvenir->description;
        $this->types             = ['Kuliner', 'Cendramata'];

        foreach ($souvenir->galleries as $gallery)
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
            'title' =>  ['required', 'min:3', 'max:180', function($attr, $value, $fail) {
                            if ($this->souvenir->slug != Str::slug($value))
                            {
                                if (Souvenir::where('slug', Str::slug($value))->first())
                                {
                                    $fail('Judul sudah digunakan');
                                }
                            }
                        }],
            'type'              => ['required'],
            'priceStartingFrom' => ['required', 'integer', 'min:0'],
            'description'       => ['required', 'min:3'],
            'mainImage'         => ['nullable', 'image', 'mimes:jpg,png', 'max:1024'],
            'galleries.*.image' => ['required', 'image', 'mimes:jpg,png', 'max:1024']
        ];
    }


    protected $messages = [
        'required'              => 'Wajib diisi',
        'title.min'             => 'Minimal 3 karakter',
        'title.max'             => 'Minimal 180 karakter',
        'unique'                => 'Judul sudah digunakan',
        'integer'               => 'Nilai tidak valid',
        'priceStartingFrom.min' => 'Nilai minumum Rp 0',
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

        $this->souvenir->update([
            'title'               => Str::title($this->title),
            'slug'                => Str::slug($this->title),
            'type'                => $this->type,
            'price_starting_from' => $this->priceStartingFrom,
            'description'         => $this->description
        ]);


        $galleryWasChanged = false;
        if ($this->galleries)
        {
            foreach ($this->galleries as $image)
            {
                if (! isset($image['id']))
                {
                    $imageName = Str::random(10) . '.' . $image['image']->extension();

                    $image['image']->storeAs('public/images/galleries/souvenirs', $imageName);

                    Gallery::create([
                        'filename'    => $imageName,
                        'souvenir_id' => $this->souvenir->id
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

        if ($this->souvenir->wasChanged() || $galleryWasChanged)
        {
            session()->flash('message', 'Berhasil melakukan perubahan data suvenir');
        }
    }


    public function render()
    {
        return view('livewire.admin.souvenir.edit')
                    ->layoutData([
                        'titleBar'      => 'Ubah Suvenir',
                        'heroImage'     => 'souvenir.jpg',
                        'heroGradient'  => 'from-lime-600/75 to-lime-800/75',
                        'breadcrumbs' => [
                            ['route' => route('admin.souvenir.index'), 'label' => 'daftar suvenir'],
                            ['route' => route('admin.souvenir.details', $this->souvenir), 'label' => $this->souvenir->title],
                            ['route' => '#', 'label' => 'ubah suvenir']
                        ]
                    ]);
    }
}
