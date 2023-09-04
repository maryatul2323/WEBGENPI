<?php

namespace App\Http\Livewire\Guest\Shop;

use App\Models\Shop;
use Livewire\Component;

class Details extends Component
{

    public $shop;
    public $lat;
    public $long;


    public function mount(Shop $shop)
    {
        $this->shop = $shop;
        $this->lat  = $shop->lat;
        $this->long = $shop->long;
    }


    public function render()
    {
        return view('livewire.guest.shop.details')
                    ->layout('layouts.guest', [
                        'titleBar'      => 'Gerai | ' . $this->shop->name,
                        'headerBg'      => 'bg-cyan-600/75',
                        'hero'          => asset('storage/images/shops/' . $this->shop->main_image),
                        'heroBgColor'   => 'bg-gradient-to-b from-black/50 via-transparent to-transparent',
                        'footerBgColor' => 'bg-gradient-to-tr from-cyan-600/75 to-cyan-800/75',
                    ]);
    }

}
