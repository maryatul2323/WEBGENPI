<?php

namespace App\Http\Livewire\Admin\SupplyOutlet;

use App\Models\Shop;
use Livewire\Component;
use App\Models\Souvenir;
use App\Models\SupplyOutlet;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class Create extends Component
{

    use WithFileUploads;


    public $souvenir;
    public $choices = [];
    public $choice = 'Pilih gerai';
    public $shops;
    public $shopId = '';
    public $shopName;
    public $shopLocation;
    public $shopLat;
    public $shopLong;
    public $shopMainImage;
    public $validationFailed = false;


    public function mount(Souvenir $souvenir)
    {
        $this->souvenir = $souvenir;
        $this->choices  = ['Pilih gerai', 'Tambahkan gerai baru'];
        $this->shops    = Shop::all();
    }


    


    public function updatedChoice()
    {
        $this->dispatchBrowserEvent('refreshMap', ['refresh' => true]);
    }


    protected $rules = [
        'choice'        => 'required',
        'shopId'        => 'required_if:choice,Pilih gerai',
        'shopName'      => 'required_if:choice,Tambahkan gerai baru|min:3|max:180|unique:shops,name',
        'shopLocation'  => 'required_if:choice,Tambahkan gerai baru|min:3|max:250',
        'shopLat'       => 'required_if:choice,Tambahkan gerai baru',
        'shopMainImage' => 'required_if:choice,Tambahkan gerai baru|image|mimes:jpg,png|max:1024',
    ];


    protected $messages = [
        'required'          => 'Wajib diisi',
        'required_if'       => 'Wajib diisi',
        'min'               => 'Minimal 3 karakter',
        'shopName.max'      => 'Maksimal 180 karakter',
        'unique'            => 'Nama sudah digunakan',
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

        if ($this->choice == 'Tambahkan gerai baru')
        {
            $imageName = Str::random(10) . '.' . $this->shopMainImage->extension();
    
            $this->shopMainImage->storeAs('public/images/shops', $imageName);
    
            $shop = Shop::create([
                'code'       => 'SHP00' . Str::upper(Str::random(3)),
                'name'       => Str::title($this->shopName),
                'slug'       => Str::slug($this->shopName),
                'location'   => Str::title($this->shopLocation),
                'lat'        => $this->shopLat,
                'long'       => $this->shopLong,
                'main_image' => $imageName
            ]);
        }
        
        SupplyOutlet::create([
            'code'        => 'SOT00' . Str::upper(Str::random(3)),
            'souvenir_id' => $this->souvenir->id,
            'shop_id'     => $this->choice == 'Tambahkan gerai baru' ? $shop->id : $this->shopId
        ]);

        $this->reset(['choice', 'shopId', 'shopName', 'shopLocation', 'shopMainImage']);

        $this->dispatchBrowserEvent('reset', ['resetDate' => true]);
        
        session()->flash('message', 'Data gerai baru berhasil ditambakan');
    }


    public function render()
    {
        return view('livewire.admin.supply-outlet.create')
            ->layoutData([
                'titleBar'      => 'Tambah Gerai Suvenir',
                'heroImage'     => 'natural-charm.jpg',
                'heroGradient'  => 'from-lime-600/75 to-lime-800/75',
                'breadcrumbs' => [
                    ['route' => route('admin.souvenir.index'), 'label' => 'daftar suvenir'],
                    ['route' => route('admin.souvenir.details', $this->souvenir), 'label' => $this->souvenir->title],
                    ['route' => '#', 'label' => 'tambah gerai suvenir']
                ]
            ]);
    }

}
