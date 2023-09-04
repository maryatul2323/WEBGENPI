<?php

namespace App\Http\Livewire\Guest\TouristAttraction;

use App\Models\TravelObject;
use Livewire\Component;

class Details extends Component
{

    public $touristAttraction;
    public $lat;
    public $long;


    public function mount(TravelObject $travelObject)
    {
        if ($travelObject->travelObjectCategory->category == 'Pesona Alam') abort('404');

        $this->touristAttraction = $travelObject;
        $this->lat               = $travelObject->lat;
        $this->long              = $travelObject->long;
    }


    public function render()
    {
        return view('livewire.guest.tourist-attraction.details')
                        ->layout('layouts.guest', [
                            'titleBar'      => 'Objek Wisata | ' . $this->touristAttraction->title,
                            'headerBg'      => 'bg-purple-600/75',
                            'hero'          => asset('storage/images/travel-objects/' . $this->touristAttraction->main_image),
                            'heroBgColor'   => 'bg-gradient-to-b from-black/50 via-transparent to-transparent',
                            'footerBgColor' => 'bg-gradient-to-tr from-purple-600/75 to-purple-800/75'
                        ]);
    }

}
