<?php

namespace App\Http\Livewire\Admin\Event;

use App\Models\Event;
use Livewire\Component;

class Details extends Component
{

    public $event;
    public $lat;
    public $long;


    public function mount(Event $event)
    {
        $this->event = $event;
        $this->lat   = $event->lat;
        $this->long  = $event->long;
    }


    public function delete()
    {
        $this->event->delete();

        session()->flash('message', 'Berhasil menghapus salah satu data event');

        return redirect()->route('admin.event.index');
    }


    public function render()
    {
        return view('livewire.admin.event.details')
                    ->layoutData([
                        'titleBar'      => 'Rincian Event',
                        'heroImage'     => 'event.jpg',
                        'heroGradient'  => 'from-pink-600/75 to-pink-800/75',
                        'breadcrumbs' => [
                            ['route' => route('admin.event.index'), 'label' => 'daftar event'],
                            ['route' => '#', 'label' => $this->event->title],
                        ]
                    ]);
    }

}
