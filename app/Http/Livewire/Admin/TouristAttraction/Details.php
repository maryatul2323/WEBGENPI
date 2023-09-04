<?php

namespace App\Http\Livewire\Admin\TouristAttraction;

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


    public function delete()
    {
        $this->touristAttraction->delete();

        session()->flash('message', 'Berhasil menghapus salah satu data objek wisata');

        return redirect()->route('admin.touristAttraction.index');
    }


    public function render()
    {
        return view('livewire.admin.tourist-attraction.details')
                    ->layoutData([
                        'titleBar'      => 'Rincian Wisata Alam',
                        'heroImage'     => 'tourist-attraction.jpg',
                        'heroGradient'  => 'from-purple-600/75 to-purple-800/75',
                        'breadcrumbs' => [
                            ['route' => route('admin.touristAttraction.index'), 'label' => 'daftar objek alam'],
                            ['route' => '#', 'label' => $this->touristAttraction->title],
                        ]
                    ]);
    }

}
