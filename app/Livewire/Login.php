<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Livewire;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;

class Login extends Component
{
    //required field
    // #[Validate('required')]
    public $password;

    // #[Validate('required')]
    public $email;

    public function render()
    {
        return view('livewire.login');
    }

    public function doLogin()
    {
        $this->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // $this->validate();
        if (Auth::attempt(["email" => $this->email, "password" => $this->password], $this->remember)) {
            $this->reset(["email", "password"]);
            // Authentication was successful
            // return redirect()->intended('/dashboard');
            return redirect()->intended('/dashboard');
        } else {
            // Authentication failed
            $this->addError('email', 'Invalid email or password');
        }
    }
}
