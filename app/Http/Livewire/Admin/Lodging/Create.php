<?php

namespace App\Http\Livewire\Admin\Lodging;

use App\Models\Facility;
use App\Models\Gallery;
use App\Models\Lodging;
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
    public $priceStartingFrom;
    public $mainImage;
    public $facilities = [];
    public $galleries = [];
    public $validationFailed = false;


    public function mount()
    {
        $this->newForm();
    }


    public function newForm()
    {
        array_push($this->facilities, ['value']);
        array_push($this->galleries, ['image']);
    }


    public function addFacility()
    {
        array_push($this->facilities, ['value']);
    }


    public function deleteFacility($index)
    {
        if (count($this->facilities) > 1)
        {
            unset($this->facilities[$index]);
            array_values($this->facilities);
        }
    }


    public function addGelleryImage()
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


    protected $rules = [
        'title'              => 'required|min:3|max:180|unique:lodgings,title',
        'description'        => 'required|min:3',
        'location'           => 'required|min:3|max:180',
        'lat'                => 'required',
        'priceStartingFrom'  => 'required|integer|min:0',
        'mainImage'          => 'required|image|mimes:jpg,png|max:1024',
        'facilities.*.value' => 'required|min:3|max:250',
        'galleries.*.image'  => 'required|image|mimes:jpg,png|max:1024',
    ];


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

        $imageName = Str::random(10) . '.' . $this->mainImage->extension();

        $this->mainImage->storeAs('public/images/lodgings', $imageName);

        $lodging = Lodging::create([
            'code'                => 'LOD00' . Str::upper(Str::random(3)),
            'title'               => Str::title($this->title),
            'slug'                => Str::slug($this->title),
            'description'         => $this->description,
            'location'            => Str::title($this->location),
            'lat'                 => $this->lat,
            'long'                => $this->long,
            'price_starting_from' => $this->priceStartingFrom,
            'main_image'          => $imageName
        ]);


        foreach ($this->facilities as $facility)
        {
            Facility::create([
                'value'      => $facility['value'],
                'lodging_id' => $lodging->id
            ]);
        }


        foreach ($this->galleries as $image)
        {
            $imageName = Str::random(10) . '.' . $image['image']->extension();

            $image['image']->storeAs('public/images/galleries/lodgings', $imageName);

            Gallery::create([
                'filename'   => $imageName,
                'lodging_id' => $lodging->id
            ]);
        }

        $this->reset();
        $this->newForm();

        $this->dispatchBrowserEvent('reset', ['resetDate' => true]);

        session()->flash('message', 'Data penginapan baru berhasil ditambahkan');
    }


    public function render()
    {
        return view('livewire.admin.lodging.create')
                    ->layoutData([
                        'titleBar'      => 'Daftar Penginapan',
                        'heroImage'     => 'lodging.jpg',
                        'heroGradient'  => 'from-green-600/75 to-green-800/75',
                        'breadcrumbs' => [
                            ['route' => route('admin.lodging.index'), 'label' => 'daftar penginapan'],
                            ['route' => '#', 'label' => 'tambah penginapan'],
                        ]
                    ]);
    }

}
