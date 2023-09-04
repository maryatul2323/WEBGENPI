<?php

namespace App\Http\Livewire\Admin\Settings;

use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Password extends Component
{

    public $newPassword;
    public $repeatPassword;
    public $confirmPassword;
    public $validationFailed = false;


    protected function rules()
    {
        return [
            'newPassword'     => ['required', 'min:6'],
            'repeatPassword'  => ['required', 'same:newPassword'],
            'confirmPassword' => ['required', function($attr, $value, $fail) {
                                        if (! Hash::check($value, auth()->user()->password))
                                        {
                                            $fail('Konfirmasi kata sandi lama tidak sesuai');
                                        }
                                    }]
        ];
    }


    protected $messages = [
        'required' => 'Wajib diisi',
        'min'      => 'Minimal 6 karakter',
        'same'     => 'Ulangi kata sandi tidak sesuai',
    ];


    public function updated($propertyName)
    {
        $this->validationFailed = false;

        $this->validateOnly($propertyName);
    }


    public function validation()
    {
        $this->validationFailed = true;

        $this->validate();

        $this->validationFailed = false;
    }


    public function submit()
    {
        $this->validation();

        auth()->user()->update([
            'password' => bcrypt($this->newPassword)
        ]);

        $this->reset();

        session()->flash('message', 'Berhasil melakukan perubahan kata sandi akun anda');
    }


    public function render()
    {
        return view('livewire.admin.settings.password')
                    ->layoutData([
                        'titleBar'      => 'Pengaturan Kata Sandi',
                        'heroImage'     => 'login.jpg',
                        'heroGradient'  => 'from-fuchsia-600/75 to-fuchsia-800/75',
                        'breadcrumbs' => [
                            ['route' => route('admin.settings.index'), 'label' => 'pengaturan'],
                            ['route' => '#', 'label' => 'kata sandi']
                        ]
                    ]);
    }
}
