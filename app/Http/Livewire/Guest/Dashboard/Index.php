<?php

namespace App\Http\Livewire\Guest\Dashboard;

use App\Models\Event;
use App\Models\Lodging;
use App\Models\Souvenir;
use App\Models\Travel;
use App\Models\TravelObject;
use Livewire\Component;

class Index extends Component
{

    public $naturalCharms;
    public $touristAttractions;
    public $travels;
    public $events;
    public $lodgings;
    public $culinaries;
    public $souvenirs;


    public function mount()
    {
        $this->naturalCharms      = TravelObject::with('travelObjectCategory')->whereRelation('travelObjectCategory', 'category', 'Pesona Alam')->take(6)->get();
        $this->touristAttractions = TravelObject::with('travelObjectCategory')->whereRelation('travelObjectCategory', 'category', '!=', 'Pesona Alam')->take(6)->get();
        $this->travels            = Travel::take(6)->get();
        $this->events             = Event::take(6)->get();
        $this->lodgings           = Lodging::take(6)->get();
        $this->culinaries         = Souvenir::where('type', 'Kuliner')->take(6)->get();
        $this->souvenirs          = Souvenir::where('type', 'Cendramata')->take(6)->get();
    }


    public function render()
    {
        return view('livewire.guest.dashboard.index')
                    ->layout('layouts.guest', [
                        'titleBar'      => 'Beranda',
                        'headerBg'      => 'bg-cyan-600/75',
                        'hero'          => asset('storage/images/heroes/hero.jpg'),
                        'heroBgColor'   => 'bg-gradient-to-tr from-cyan-600/75 to-cyan-800/75',
                        'footerBgColor' => 'bg-gradient-to-tr from-cyan-600/75 to-cyan-800/75'
                    ]);
    }

}
