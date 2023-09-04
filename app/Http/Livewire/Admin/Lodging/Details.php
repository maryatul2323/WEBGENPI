<?php

namespace App\Http\Livewire\Admin\Lodging;

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


    public function delete()
    {
        $this->lodging->delete();

        session()->flash('message', 'Berhasil menghapus salah satu data penginapan');

        return redirect()->route('admin.lodging.index');
    }

    
    public function render()
    {
        return view('livewire.admin.lodging.details')
                    ->layoutData([
                        'titleBar'      => 'Ubah Penginapan',
                        'heroImage'     => 'lodging.jpg',
                        'heroGradient'  => 'from-green-600/75 to-green-800/75',
                        'breadcrumbs' => [
                            ['route' => route('admin.lodging.index'), 'label' => 'daftar penginapan'],
                            ['route' => '#', 'label' => $this->lodging->title],
                        ]
                    ]);
    }

}
