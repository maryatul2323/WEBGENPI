<?php

namespace App\Http\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{

    public $email;
    public $password;
    public $validationFailed = false;


    public function mount()
    {
        if (Auth::check())
        {
            return redirect()->route('admin.dashboard.index');
        }
    }


    protected $rules = [
        'email'    => 'required|email:dns',
        'password' => 'required'
    ];


    protected $messages = [
        'required' => 'Wajib diisi',
        'email'    => 'Email tidak valid',
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

        if ( ! Auth::attempt(['email' => $this->email, 'password' => $this->password]))
        {
            session()->flash('message', 'Email atau kata sandi tidak sesuai atau tidak terdaftar');
        }
        else 
        {
            return redirect()->route('admin.dashboard.index');
        }
    }
    

    public function render()
    {
        return view('livewire.auth.login')
                    ->layout('layouts.auth', [
                        'titleBar' => 'Masuk',
                    ]);
    }
}
