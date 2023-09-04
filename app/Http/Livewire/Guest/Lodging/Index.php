<?php

namespace App\Http\Livewire\Guest\Lodging;

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


    public function render()
    {
        return view('livewire.guest.lodging.index', [
                        'lodgings' => Lodging::where('title', 'like', '%' . $this->search . '%')
                                                ->latest()
                                                ->paginate(8)
                    ])
                    ->layout('layouts.guest', [
                        'titleBar'      => 'Penginapan',
                        'headerBg'      => 'bg-green-600/75',
                        'hero'          => asset('storage/images/heroes/lodging.jpg'),
                        'heroBgColor'   => 'bg-gradient-to-tr from-green-600/75 to-green-800/75',
                        'footerBgColor' => 'bg-gradient-to-tr from-green-600/75 to-green-800/75',
                    ]);
    }
}
