<?php

namespace App\Http\Livewire\Guest\Culinary;

use App\Models\Souvenir;
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
        return view('livewire.guest.culinary.index', [
                        'culinaries' => Souvenir::where('title', 'like', '%' . $this->search . '%')
                                                    ->where('type', 'Kuliner')
                                                    ->latest()
                                                    ->paginate(8)
                    ])
                    ->layout('layouts.guest', [
                        'titleBar'      => 'Kuliner',
                        'headerBg'      => 'bg-fuchsia-600/75',
                        'hero'          => asset('storage/images/heroes/culinary.jpg'),
                        'heroBgColor'   => 'bg-gradient-to-tr from-fuchsia-600/75 to-fuchsia-800/75',
                        'footerBgColor' => 'bg-gradient-to-tr from-fuchsia-600/75 to-fuchsia-800/75',
                    ]);
    }

}
