<?php

namespace App\Http\Livewire\Guest\Souvenir;

use App\Models\Souvenir;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{

    use WithPagination;


    public $search = '';


    public function upadtingSearch()
    {
        $this->resetPage();
    }


    public function paginationView()
    {
        return 'pagination.custom';
    }


    public function render()
    {
        return view('livewire.guest.souvenir.index', [
                        'souvenirs' => Souvenir::where('title', 'like', '%' . $this->search . '%')
                                            ->where('type', 'Cendramata')
                                            ->latest()
                                            ->paginate(8)
                    ])
                    ->layout('layouts.guest', [
                        'titleBar'      => 'Cendramata',
                        'headerBg'      => 'bg-lime-600/75',
                        'hero'          => asset('storage/images/heroes/souvenir.jpg'),
                        'heroBgColor'   => 'bg-gradient-to-tr from-lime-600/75 to-lime-800/75',
                        'footerBgColor' => 'bg-gradient-to-tr from-lime-600/75 to-lime-800/75'
                    ]);
    }
    
}
