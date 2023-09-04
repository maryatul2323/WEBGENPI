<?php

namespace App\Http\Livewire\Admin\Travel;

use App\Models\Travel;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{

    use WithPagination;


    public $search = '';


    public function updatingSearch()
    {
        $this->resetPage();
    }


    public function delete(Travel $travel)
    {
        $travel->delete();

        session()->flash('message', 'Berhasil menghapus salah satu data travel');
    }


    public function paginationView()
    {
        return 'pagination.custom';
    }

    
    public function render()
    {
        return view('livewire.admin.travel.index', [
                        'travels' => Travel::where('title', 'like', '%' . $this->search . '%')
                                                ->latest()
                                                ->paginate(8)
                    ])
                    ->layoutData([
                        'titleBar'      => 'Daftar Travel',
                        'heroImage'     => 'travel.jpg',
                        'heroGradient'  => 'from-blue-600/75 to-blue-800/75',
                        'breadcrumbs' => [
                            ['route' => '#', 'label' => 'daftar travel'],
                        ]
                    ]);
    }
    
}
