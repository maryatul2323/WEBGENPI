<?php

namespace App\Http\Livewire\Guest\NaturalCharm;

use App\Models\TravelObject;
use Livewire\Component;

class Details extends Component
{

    public $naturalCharm;
    public $lat;
    public $long;


    public function mount(TravelObject $travelObject)
    {
        if ($travelObject->travelObjectCategory->category != 'Pesona Alam') abort('404');

        $this->naturalCharm = $travelObject;
        $this->lat          = $travelObject->lat;
        $this->long         = $travelObject->long;
    }


    public function render()
    {
        return view('livewire.guest.natural-charm.details')
                    ->layout('layouts.guest', [
                        'titleBar'      => 'Pesona Alam | ' . $this->naturalCharm->title,
                        'headerBg'      => 'bg-yellow-600/75',
                        'hero'          => asset('storage/images/travel-objects/' . $this->naturalCharm->main_image),
                        'heroBgColor'   => 'bg-gradient-to-b from-black/50 via-transparent to-transparent',
                        'footerBgColor' => 'bg-gradient-to-tr from-yellow-600/75 to-yellow-800/75'
                    ]);
    }
}
