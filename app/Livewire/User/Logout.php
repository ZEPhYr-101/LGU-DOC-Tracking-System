<?php

namespace App\Livewire\User;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Logout extends Component
{
    public function render()
    {
        return view('livewire.user.logout');
    }

    public function logout()
    {
        Auth::guard('user')->logout();
        return redirect(route('user.login'));
    }
}
