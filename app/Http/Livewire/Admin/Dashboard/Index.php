<?php

namespace App\Http\Livewire\Admin\Dashboard;

use App\Models\Event;
use App\Models\Lodging;
use App\Models\Souvenir;
use App\Models\Travel;
use App\Models\TravelObject;
use Livewire\Component;

class Index extends Component
{

    public $naturalCharm;
    public $touristAttraction;
    public $travel;
    public $event;
    public $lodging;
    public $souvenir;


    public function mount()
    {
        $this->naturalCharm      = TravelObject::whereRelation('travelObjectCategory', 'category', 'Pesona Alam')->count();
        $this->touristAttraction = TravelObject::whereRelation('travelObjectCategory', 'category', '!=', 'Pesona Alam')->count();
        $this->travel            = Travel::count();
        $this->event             = Event::count();
        $this->lodging           = Lodging::count();
        $this->souvenir          = Souvenir::count();
    }


    public function render()
    {
        return view('livewire.admin.dashboard.index')
                    ->layoutData([
                        'titleBar'      => 'Beranda',
                        'heroImage'     => 'hero.jpg',
                        'heroGradient'  => 'from-cyan-600/75 to-cyan-800/75',
                        'breadcrumbs' => [
                            ['route' => '#', 'label' => 'bernda']
                        ]
                    ]);
    }

}
