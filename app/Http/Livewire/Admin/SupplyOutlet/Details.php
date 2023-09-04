<?php

namespace App\Http\Livewire\Admin\SupplyOutlet;

use App\Models\Souvenir;
use App\Models\SupplyOutlet;
use Livewire\Component;

class Details extends Component
{

    public $souvenir;
    public $supplyOutlet;
    public $lat;
    public $long;


    public function mount(Souvenir $souvenir, SupplyOutlet $supplyOutlet)
    {
        $this->souvenir     = $souvenir;
        $this->supplyOutlet = $supplyOutlet;
        $this->lat          = $supplyOutlet->shop->lat;
        $this->long         = $supplyOutlet->shop->long;
    }


    public function delete()
    {
        $this->supplyOutlet->delete();

        session()->flash('message', 'Berhasil menghapus salah satu data gerai suvenir');

        return redirect()->route('admin.souvenir.details', $this->souvenir);
    }


    public function render()
    {
        return view('livewire.admin.supply-outlet.details')
                    ->layoutData([
                        'titleBar'      => 'Rincian Gerai Suvenir',
                        'heroImage'     => 'natural-charm.jpg',
                        'heroGradient'  => 'from-lime-600/75 to-lime-800/75',
                        'breadcrumbs' => [
                            ['route' => route('admin.souvenir.index'), 'label' => 'daftar suvenir'],
                            ['route' => route('admin.souvenir.details', $this->souvenir), 'label' => $this->souvenir->title],
                            ['route' => '#', 'label' => $this->supplyOutlet->shop->name],
                        ]
                    ]);
    }

}
