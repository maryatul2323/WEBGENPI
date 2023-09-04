<?php

namespace App\Http\Livewire\Guest\NaturalCharm;

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


    public function paginationView()
    {
        return 'pagination.custom';
    }


    public function render()
    {
        return view('livewire.guest.natural-charm.index', [
                        'naturalCharms' => TravelObject::whereRelation('travelObjectCategory', 'category', 'Pesona Alam')
                                                            ->where(function($query) {
                                                                $query->where('title', 'like', '%' . $this->search . '%')
                                                                        ->orWhere('location', 'like', '%' . $this->search . '%');
                                                            })
                                                            ->latest()
                                                            ->paginate(9)
                    ])
                    ->layout('layouts.guest', [
                        'titleBar'      => 'Pesona Alam',
                        'headerBg'      => 'bg-yellow-600/75',
                        'hero'          => asset('storage/images/heroes/natural-charm.jpg'),
                        'heroBgColor'   => 'bg-gradient-to-tr from-yellow-600/75 to-yellow-800/75',
                        'footerBgColor' => 'bg-gradient-to-tr from-yellow-600/75 to-yellow-800/75'
                    ]);
    }

}
