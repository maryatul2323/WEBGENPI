<?php

namespace App\Http\Livewire\Guest\Lodging;

use App\Models\Lodging;
use Livewire\Component;

class Details extends Component
{

    public $lodging;
    public $lat;
    public $long;


    public function mount(Lodging $lodging)
    {
        $this->lodging = $lodging;
        $this->lat     = $lodging->lat;
        $this->long    = $lodging->long;
    }


    public function render()
    {
        return view('livewire.guest.lodging.details')
                    ->layout('layouts.guest', [
                        'titleBar'      => 'Penginapan | ' . $this->lodging->title,
                        'headerBg'      => 'bg-green-600/75',
                        'hero'          => asset('storage/images/lodgings/' . $this->lodging->main_image),
                        'heroBgColor'   => 'bg-gradient-to-b from-black/50 via-transparent to-transparent',
                        'footerBgColor' => 'bg-gradient-to-tr from-green-600/75 to-green-800/75',
                    ]);
    }

}
