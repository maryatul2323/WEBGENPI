<?php

namespace App\Http\Livewire\Admin\Event;

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


    public function delete(Event $event)
    {
        $event->delete();

        session()->flash('message', 'Berhasil menghapus salah satu data event');
    }


    public function render()
    {
        return view('livewire.admin.event.index', [
                        'events' => Event::where('title', 'like', '%' . $this->search . '%')
                                                ->latest()
                                                ->paginate(8)
                    ])
                    ->layoutData([
                        'titleBar'      => 'Daftar Event',
                        'heroImage'     => 'event.jpg',
                        'heroGradient'  => 'from-pink-600/75 to-pink-800/75',
                        'breadcrumbs' => [
                            ['route' => '#', 'label' => 'daftar event'],
                        ]
                    ]);
    }

}
