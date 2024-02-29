<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class Register extends Component
{
    public $is_agree = false;
    public $name;
    public $email;
    public $password;

    //make agree
    public function makeAgree()
    {
        $this->is_agree = !$this->is_agree;;
    }

    public function register()
    {
        $validator = $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // if ($validator->fails()) {
        //     $this->addError('email', 'The provided credentials are incorrect.');
        //     return;
        // }

        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);

        // event(new Registered($user));

        Auth::login($user);

        return redirect()->intended('/dashboard');
        // return $this->redirect('/dashboard', navigate: true);
    }

    public function render()
    {
        return view('livewire.register');
    }
}
