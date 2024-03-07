<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Livewire;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Attributes\Title;

#[title("login")]
class Login extends Component
{
    //required field
    // #[Validate('required')]
    public $password,  $email, $remember, $authMessage;


    public function render()
    {
        return view('livewire.login')->extends("layouts.app")->section("content");
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
            $this->authMessage = "Successfully authenticated. Redirecting...";
            // Authentication was successful
            // return redirect()->intended('/dashboard');
            $this->redirectIntended("dashboard", navigate: true);
        } else {
            // Authentication failed
            $this->addError('email', 'Invalid email or password');
        }
    }
}
