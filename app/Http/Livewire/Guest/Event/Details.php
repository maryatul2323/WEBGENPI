<?php

namespace App\Http\Livewire\Guest\Event;

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


    public function render()
    {
        return view('livewire.guest.event.details')
                    ->layout('layouts.guest', [
                        'titleBar'      => 'Event | ' . $this->event->title,
                        'headerBg'      => 'bg-pink-600/75',
                        'hero'          => asset('storage/images/events/' . $this->event->main_image),
                        'heroBgColor'   => 'bg-gradient-to-b from-black/50 via-transparent to-transparent',
                        'footerBgColor' => 'bg-gradient-to-tr from-pink-600/75 to-pink-800/75',
                    ]);;
    }

}
