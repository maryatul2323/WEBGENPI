<?php

namespace App\Http\Livewire\Admin\Settings;

use Livewire\Component;

class Index extends Component
{
    
    public function render()
    {
        return view('livewire.admin.settings.index')
                    ->layoutData([
                        'titleBar'      => 'Pengaturan',
                        'heroImage'     => 'login.jpg',
                        'heroGradient'  => 'from-fuchsia-600/75 to-fuchsia-800/75',
                        'breadcrumbs' => [
                            ['route' => '#', 'label' => 'pengaturan']
                        ]
                    ]);
    }

}
