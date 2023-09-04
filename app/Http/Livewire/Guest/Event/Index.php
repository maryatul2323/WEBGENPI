<?php

namespace App\Http\Livewire\Guest\Event;

use App\Models\Event;
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
        return view('livewire.guest.event.index', [
                        'events' => Event::where('title', 'like', '%' . $this->search . '%')
                                                ->latest()
                                                ->paginate(8)
                    ])
                    ->layout('layouts.guest', [
                        'titleBar'      => 'Event',
                        'headerBg'      => 'bg-pink-600/75',
                        'hero'          => asset('storage/images/heroes/event.jpg'),
                        'heroBgColor'   => 'bg-gradient-to-tr from-pink-600/75 to-pink-800/75',
                        'footerBgColor' => 'bg-gradient-to-tr from-pink-600/75 to-pink-800/75',
                    ]);;
    }

}
