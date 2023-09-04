<?php

namespace App\Http\Livewire\Guest\Travel;

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


    public function paginationView()
    {
        return 'pagination.custom';
    }


    public function render()
    {
        return view('livewire.guest.travel.index', [
                        'travels' => Travel::where('title', 'like', '%' . $this->search . '%')
                                                ->latest()
                                                ->paginate(8)
                    ])
                    ->layout('layouts.guest', [
                        'titleBar'      => 'Travel',
                        'headerBg'      => 'bg-blue-600/75',
                        'hero'          => asset('storage/images/heroes/travel.jpg'),
                        'heroBgColor'   => 'bg-gradient-to-tr from-blue-600/75 to-blue-800/75',
                        'footerBgColor' => 'bg-gradient-to-tr from-blue-600/75 to-blue-800/75',
                    ]);
    }

}
