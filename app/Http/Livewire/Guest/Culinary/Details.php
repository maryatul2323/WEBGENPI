<?php

namespace App\Http\Livewire\Guest\Culinary;

use App\Models\Souvenir;
use Livewire\Component;

class Details extends Component
{

    public $culinary;


    public function mount(Souvenir $souvenir)
    {
        if ($souvenir->type != 'Kuliner') abort('404');

        $this->culinary = $souvenir;
    }


    public function render()
    {
        return view('livewire.guest.culinary.details')
                    ->layout('layouts.guest', [
                        'titleBar'      => 'Kuliner | ' . $this->culinary->title,
                        'headerBg'      => 'bg-fuchsia-600/75',
                        'hero'          => asset('storage/images/souvenirs/' . $this->culinary->main_image),
                        'heroBgColor'   => 'bg-gradient-to-b from-black/50 via-transparent to-transparent',
                        'footerBgColor' => 'bg-gradient-to-tr from-fuchsia-600/75 to-fuchsia-800/75',
                    ]);
    }

}
