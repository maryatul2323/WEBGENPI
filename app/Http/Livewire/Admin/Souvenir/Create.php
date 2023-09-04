<?php

namespace App\Http\Livewire\Admin\Souvenir;

use App\Models\Gallery;
use App\Models\Souvenir;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class Create extends Component
{

    use WithFileUploads;


    public $title;
    public $type;
    public $types;
    public $priceStartingFrom;
    public $description;
    public $mainImage;
    public $galleries = [];
    public $validationFailed = false;


    public function mount()
    {
        $this->newForm();
    }


    public function newForm()
    {
        $this->types = ['Kuliner', 'Cendramata'];

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
        'title'             => 'required|min:3|max:180|unique:souvenirs,title',
        'type'              => 'required',
        'priceStartingFrom' => 'required|integer|min:0',
        'description'       => 'required|min:3',
        'mainImage'         => 'required|image|mimes:jpg,png|max:1024',
        'galleries.*.image' => 'required|image|mimes:jpg,png|max:1024',
    ];


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

        $imageName = Str::random(10) . '.' . $this->mainImage->extension();

        $this->mainImage->storeAs('public/images/souvenirs', $imageName);

        $souvenir = Souvenir::create([
            'code'                => 'SOV00' . Str::upper(Str::random(3)),
            'title'               => Str::title($this->title),
            'slug'                => Str::slug($this->title),
            'type'                => $this->type,
            'price_starting_from' => $this->priceStartingFrom,
            'description'         => $this->description,
            'main_image'          => $imageName
        ]);


        foreach ($this->galleries as $image)
        {
            $imageName = Str::random(10) . '.' . $image['image']->extension();

            $image['image']->storeAs('public/images/galleries/souvenirs', $imageName);

            Gallery::create([
                'filename'    => $imageName,
                'souvenir_id' => $souvenir->id
            ]);
        }


        $this->reset();
        $this->newForm();

        session()->flash('message', 'Data suvenir baru berhasil ditambahkan');
    }


    public function render()
    {
        return view('livewire.admin.souvenir.create')
                    ->layoutData([
                        'titleBar'      => 'Tambah Suvenir',
                        'heroImage'     => 'souvenir.jpg',
                        'heroGradient'  => 'from-lime-600/75 to-lime-800/75',
                        'breadcrumbs' => [
                            ['route' => route('admin.souvenir.index'), 'label' => 'daftar suvenir'],
                            ['route' => '#', 'label' => 'tambah suvenir']
                        ]
                    ]);
    }

}
