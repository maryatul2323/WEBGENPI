<?php

namespace App\Http\Livewire\Guest\Travel;

use App\Models\Travel;
use Livewire\Component;

class Details extends Component
{

    public $travel;


    public function mount(Travel $travel)
    {
        $this->travel = $travel;
    }


    public function render()
    {
        return view('livewire.guest.travel.details')
                    ->layout('layouts.guest', [
                        'titleBar'      => 'Travel | ' . $this->travel->title,
                        'headerBg'      => 'bg-blue-600/75',
                        'hero'          => asset('storage/images/travels/' . $this->travel->main_image),
                        'heroBgColor'   => 'bg-gradient-to-b from-black/50 via-transparent to-transparent',
                        'footerBgColor' => 'bg-gradient-to-tr from-blue-600/75 to-blue-800/75',
                    ]);
    }

}
