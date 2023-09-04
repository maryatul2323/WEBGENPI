<?php

namespace App\Http\Livewire\Admin\Lodging;

use App\Models\Lodging;
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


    public function paginationView()
    {
        return 'pagination.custom';
    }


    public function delete(Lodging $lodging)
    {
        $lodging->delete();

        session()->flash('message', 'Berhasil menghapus salah satu data penginapan');
    }


    public function render()
    {
        return view('livewire.admin.lodging.index', [
                        'lodgings' => Lodging::where('title', 'like', '%' . $this->search . '%')
                                                    ->latest()
                                                    ->paginate(8)
                    ])
                    ->layoutData([
                        'titleBar'      => 'Daftar Penginapan',
                        'heroImage'     => 'lodging.jpg',
                        'heroGradient'  => 'from-green-600/75 to-green-800/75',
                        'breadcrumbs' => [
                            ['route' => '#', 'label' => 'daftar penginapan'],
                        ]
                    ]);
    }

}
