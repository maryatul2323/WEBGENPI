<?php

namespace App\Http\Livewire\Admin\NaturalCharm;

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


    public function delete()
    {
        $this->naturalCharm->delete();

        session()->flash('message', 'Berhasil menghapus salah satu data pesona alam');

        return redirect()->route('admin.naturalCharm.index');
    }


    public function render()
    {
        return view('livewire.admin.natural-charm.details')
                    ->layoutData([
                        'titleBar'      => 'Rincian Pesona Alam',
                        'heroImage'     => 'natural-charm.jpg',
                        'heroGradient'  => 'from-yellow-600/75 to-yellow-800/75',
                        'breadcrumbs' => [
                            ['route' => route('admin.naturalCharm.index'), 'label' => 'daftar pesona alam'],
                            ['route' => '#', 'label' => $this->naturalCharm->title],
                        ]
                    ]);
    }

}
