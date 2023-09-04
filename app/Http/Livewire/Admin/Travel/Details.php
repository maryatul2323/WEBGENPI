<?php

namespace App\Http\Livewire\Admin\Travel;

use App\Models\Travel;
use Livewire\Component;

class Details extends Component
{

    public $travel;


    public function mount(Travel $travel)
    {
        $this->travel = $travel;
    }


    public function delete()
    {
        $this->travel->delete();

        session()->flash('message', 'Berhasil menghapus salah satu data travel');

        return redirect()->route('admin.travel.index');
    }


    public function render()
    {
        return view('livewire.admin.travel.details')
                    ->layoutData([
                        'titleBar'      => 'Rincian Travel',
                        'heroImage'     => 'travel.jpg',
                        'heroGradient'  => 'from-blue-600/75 to-blue-800/75',
                        'breadcrumbs' => [
                            ['route' => route('admin.travel.index'), 'label' => 'daftar travel'],
                            ['route' => '#', 'label' => $this->travel->title]
                        ]
                    ]);
    }
    
}
