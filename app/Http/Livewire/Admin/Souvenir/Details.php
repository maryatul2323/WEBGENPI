<?php

namespace App\Http\Livewire\Admin\Souvenir;

use App\Models\Souvenir;
use App\Models\SupplyOutlet;
use Livewire\Component;

class Details extends Component
{

    public $souvenir;


    public function mount(Souvenir $souvenir)
    {
        $this->souvenir = $souvenir;
    }


    public function delete()
    {
        $this->souvenir->delete();

        session()->flash('message', 'Berhasil menghapus salah satu data suvenir');

        return redirect()->route('admin.souvenir.index');
    }


    public function deleteSupplyOutlet(SupplyOutlet $supplyOutlet)
    {
        $supplyOutlet->delete();

        session()->flash('message', 'Berhasil menghapus salah satu data gerai');
    }


    public function render()
    {
        return view('livewire.admin.souvenir.details', [
                        'supplyOutlets' => SupplyOutlet::with('shop')
                                                            ->where('souvenir_id', $this->souvenir->id)
                                                            ->get()
                    ])
                    ->layoutData([
                        'titleBar'      => 'Rincian Suvenir',
                        'heroImage'     => 'souvenir.jpg',
                        'heroGradient'  => 'from-lime-600/75 to-lime-800/75',
                        'breadcrumbs' => [
                            ['route' => route('admin.souvenir.index'), 'label' => 'daftar suvenir'],
                            ['route' => '#', 'label' => $this->souvenir->title],
                        ]
                    ]);
    }

}
