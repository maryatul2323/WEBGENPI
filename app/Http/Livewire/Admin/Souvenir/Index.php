<?php

namespace App\Http\Livewire\Admin\Souvenir;

use App\Models\Souvenir;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{

    use WithPagination;


    public $search = '';
    public $types  = [];
    public $type   = null;


    public function mount()
    {
        $this->types = ['Kuliner', 'Cendramata'];
    }


    public function updatingSearch()
    {
        $this->resetPage();
    }


    public function filter($value = null)
    {
        $this->type = $value;
    }


    public function paginationView()
    {
        return 'pagination.custom';
    }


    public function delete(Souvenir $souvenir)
    {
        $souvenir->delete();

        session()->flash('message', 'Berhasil menghapus salah satu data suvenir');
    }


    public function render()
    {
        return view('livewire.admin.souvenir.index', [
                        'souvenirs' => Souvenir::where('title', 'like', '%' . $this->search . '%')
                                                    ->when($this->type, function($query) {
                                                        $query->where('type', $this->type);
                                                    })
                                                    ->latest()
                                                    ->paginate(8)
                    ])
                    ->layoutData([
                        'titleBar'      => 'Daftar Suvenir',
                        'heroImage'     => 'souvenir.jpg',
                        'heroGradient'  => 'from-lime-600/75 to-lime-800/75',
                        'breadcrumbs' => [
                            ['route' => '#', 'label' => 'daftar suvenir']
                        ]
                    ]);
    }

}
