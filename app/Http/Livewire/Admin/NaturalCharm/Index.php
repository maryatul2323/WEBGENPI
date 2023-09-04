<?php

namespace App\Http\Livewire\Admin\NaturalCharm;

use App\Models\TravelObject;
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


    public function delete(TravelObject $travelObject)
    {
        $travelObject->delete();

        session()->flash('message', 'Berhasil menghapus salah satu data pesona alam');
    }


    public function paginationView()
    {
        return 'pagination.custom';
    }


    public function render()
    {
        return view('livewire.admin.natural-charm.index', [
                        'naturalCharms' => TravelObject::whereRelation('travelObjectCategory', 'category', 'Pesona Alam')
                                                            ->where(function($query) {
                                                                $query->where('title', 'like', '%' . $this->search . '%')
                                                                        ->orWhere('location', 'like', '%' . $this->search . '%');
                                                            })
                                                            ->latest()
                                                            ->paginate(9)
                    ])
                    ->layoutData([
                        'titleBar'      => 'Daftar Pesona Alam',
                        'heroImage'     => 'natural-charm.jpg',
                        'heroGradient'  => 'from-yellow-600/75 to-yellow-800/75',
                        'breadcrumbs' => [
                            ['route' => '#', 'label' => 'daftar pesona alam']
                        ]
                    ]);
    }

}
