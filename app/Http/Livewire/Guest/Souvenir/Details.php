<?php

namespace App\Http\Livewire\Guest\Souvenir;

use App\Models\Souvenir;
use Livewire\Component;

class Details extends Component
{

    public $souvenir;


    public function mount(Souvenir $souvenir)
    {
        if ($souvenir->type != 'Cendramata') abort('404');

        $this->souvenir = $souvenir;
    }


    public function render()
    {
        return view('livewire.guest.souvenir.details')
                    ->layout('layouts.guest', [
                        'titleBar'      => 'Kuliner | ' . $this->souvenir->title,
                        'headerBg'      => 'bg-lime-600/75',
                        'hero'          => asset('storage/images/souvenirs/' . $this->souvenir->main_image),
                        'heroBgColor'   => 'bg-gradient-to-b from-black/50 via-transparent to-transparent',
                        'footerBgColor' => 'bg-gradient-to-tr from-lime-600/75 to-lime-800/75',
                    ]);
    }

}
