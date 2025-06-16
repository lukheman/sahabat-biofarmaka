<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use Livewire\Component;

use Livewire\Attributes\Rule;

#[Layout('layouts.guest')]
#[Title('Login')]
class Login extends Component
{

    #[Rule(['required', 'email', 'exists:users,email'])]
    public string $email = '';

    #[Rule(['required'])]
    public string $password = '';

    public function login() {
        $this->validate();

        if (Auth::attempt($this->all())) {
            return $this->redirectRoute('dashboard');
        } else {
            session()->flash('error', 'Email atau password salah.');
        }
    }

    public function messages()
    {
        return [
            'email.required' => 'Email harus diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.exists' => 'Email tidak terdaftar.',
            'password.required' => 'Password harus diisi.',
        ];
    }


    public function render()
    {
        return view('livewire.login');
    }
}
