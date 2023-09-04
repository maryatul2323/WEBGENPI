<?php

namespace App\Http\Livewire\Admin\Settings;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class Account extends Component
{

    use WithFileUploads;


    public $name;
    public $email;
    public $profilePicture;
    public $confirmPassword;
    public $validationFailed = false;


    public function mount()
    {
        $this->name  = auth()->user()->name;
        $this->email = auth()->user()->email;
    }


    protected function rules()
    {
        return [
            'name' => ['required', 'min:3', 'max:180'],
            'email' =>  ['required', 'email:dns', function($attr, $value, $fail) {
                            if (auth()->user()->email != $value)
                            {
                                if (User::where('email', $value)->first())
                                {
                                    $fail('Email sudah digunakan');
                                }
                            }
                        }],
            'profilePicture'  => ['nullable', 'image', 'mimes:jpg,png', 'max:1024'],
            'confirmPassword' =>    ['required', function($attr, $value, $fail) {
                                        if (! Hash::check($value, auth()->user()->password))
                                        {
                                            $fail('Konfirmasi kata sandi tidak sesuai');
                                        }
                                    }]
        ];
    }


    protected $messages = [
        'required'           => 'Wajib diisi',
        'min'                => 'Minimal 3 karakter',
        'name.max'           => 'Maksimal 180 karakter',
        'email'              => 'Email tidak valid',
        'image'              => 'Wajib gambar',
        'mimes'              => 'Eksternsi yang diperbolehkan .jpg dan .png',
        'profilePicture.max' => 'Ukuran maksimal 1MB'
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
            'name'  => Str::title($this->name),
            'email' => Str::lower($this->email)
        ]);

        if ($this->profilePicture)
        {
            Storage::delete('public/images/users/' . auth()->user()->profile_picture);

            $imageName = Str::random(10) . '.' . $this->profilePicture->extension();

            $this->profilePicture->storeAs('public/images/users', $imageName);

            auth()->user()->update([
                'profile_picture' => $imageName
            ]);
        }

        if (auth()->user()->wasChanged())
        {
            $this->reset(['confirmPassword']);
            
            session()->flash('message', 'Berhasil melakukan perubahan data akun anda');
        }
    }


    public function render()
    {
        return view('livewire.admin.settings.account')
                    ->layoutData([
                        'titleBar'      => 'Pengaturan Akun',
                        'heroImage'     => 'login.jpg',
                        'heroGradient'  => 'from-fuchsia-600/75 to-fuchsia-800/75',
                        'breadcrumbs' => [
                            ['route' => route('admin.settings.index'), 'label' => 'pengaturan'],
                            ['route' => '#', 'label' => 'akun']
                        ]
                    ]);
    }

}
