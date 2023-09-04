<?php

namespace App\Http\Livewire\Admin\SupplyOutlet;

use App\Models\Shop;
use Livewire\Component;
use App\Models\Souvenir;
use Illuminate\Support\Str;
use App\Models\SupplyOutlet;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;

class Edit extends Component
{

    use WithFileUploads;


    public $souvenir;
    public $supplyOutlet;
    public $shopName;
    public $shopLocation;
    public $shopLat;
    public $shopLong;
    public $shopMainImage;
    public $validationFailed = false;


    public function mount(Souvenir $souvenir, SupplyOutlet $supplyOutlet)
    {
        $this->souvenir     = $souvenir;
        $this->supplyOutlet = $supplyOutlet;
        $this->shopName     = $supplyOutlet->shop->name;
        $this->shopLocation = $supplyOutlet->shop->location;
        $this->shopLat      = $supplyOutlet->shop->lat;
        $this->shopLong     = $supplyOutlet->shop->long;
    }


    protected function rules()
    {
        return [
            'shopName' =>   ['required', 'min:3', 'max:180', function($attr, $value, $fail) {
                                if ($this->supplyOutlet->shop->slug != Str::slug($value))
                                {
                                    if (Shop::where('slug', Str::slug($value))->first())
                                    {
                                        $fail('Nama sudah digunakan');
                                    }
                                }
                            }],
            'shopLocation'  => ['required', 'min:3', 'max:250'],
            'shopLat'       => ['required'],
            'shopMainImage' => ['nullable', 'image', 'mimes:jpg,png', 'max:1024']
        ];
    }


    protected $messages = [
        'required'          => 'Wajib diisi',
        'min'               => 'Minimal 3 karakter',
        'shopName.max'      => 'Maksimal 180 karakter',
        'shopLocation.max'  => 'Maksimal 250 karakter',
        'image'             => 'Wajib gambar',
        'mimes'             => 'Ekstensi yang diperbolehkan .jpg dan .png',
        'shopMainImage.max' => 'Ukuran maksimal 1MB'
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


        $this->supplyOutlet->shop->update([
            'name'     => Str::title($this->shopName),
            'slug'     => Str::slug($this->shopName),
            'location' => Str::title($this->shopLocation),
            'lat'      => $this->shopLat,
            'long'     => $this->shopLong,
        ]);


        if ($this->shopMainImage)
        {
            Storage::delete('public/images/shops/' . $this->supplyOutlet->shop->main_image);

            $imageName = Str::random(10) . '.' . $this->shopMainImage->extension();

            $this->shopMainImage->storeAs('public/images/shops', $imageName);

            $this->supplyOutlet->shop->update([
                'main_image' => $imageName
            ]);
        }


        if ($this->supplyOutlet->shop->wasChanged())
        {
            session()->flash('message', 'Berhasil melakukan perubahan data gerai suvenir');
        }
    }


    public function render()
    {
        return view('livewire.admin.supply-outlet.edit')
                    ->layoutData([
                        'titleBar'      => 'Ubah Gerai Suvenir',
                        'heroImage'     => 'natural-charm.jpg',
                        'heroGradient'  => 'from-lime-600/75 to-lime-800/75',
                        'breadcrumbs' => [
                            ['route' => route('admin.souvenir.index'), 'label' => 'daftar suvenir'],
                            ['route' => route('admin.souvenir.details', $this->souvenir), 'label' => $this->souvenir->title],
                            ['route' => route('admin.supplyOutlet.details', [$this->souvenir, $this->supplyOutlet]), 'label' => $this->supplyOutlet->shop->name],
                            ['route' => '#', 'label' => 'ubah gerai suvenir']
                        ]
                    ]);
    }

}
