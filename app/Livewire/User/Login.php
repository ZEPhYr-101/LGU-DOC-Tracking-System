<?php

namespace App\Livewire\User;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    public $email, $password;
    public function render()
    {
        return view('livewire.user.login')->layout('layouts.user-login');
    }

    public function login()
{
    $this->validate([
        'email' => ['email', 'required'],
        'password' => ['required', 'string', 'min:3', 'max:12']
    ]);

    $user = User::where('email', $this->email)->first();

    if ($user && $user->is_Accepted == "0") {
        session()->flash('error', 'Please verify your email');
        return;
    }
    $users = Auth::guard('user')->attempt(['email' => $this->email, 'password' => $this->password]);
    if ($users) {
        return redirect(route('user.dashboard'));
    } else {
        session()->flash('error', 'Invalid email and password');
    }
}

}
