<?php

namespace App\Livewire\Admin;
use Illuminate\Support\Facades\Auth;

use Livewire\Component;

class AdminLogin extends Component
{
    public $username, $password;

    public function render()
    {
        return view('livewire.admin.admin-login')->layout('layouts.admin-login');
    }

    public function login()
    {
        // $admins = new Admin();
        $this->validate([
            'username' => ['required', 'string', 'max:12', 'min:3'],
            'password' => ['required', 'string', 'max:12', 'min:3'],
        ]);
        $admins = Auth::guard('admin')->attempt(['username' => $this->username, 'password' => $this->password]);
        if ($admins) {
            return redirect(route('admin.admin-dashboard'));
            session()->flash('success', 'Login Successfully');
        } else {
            session()->flash('error', 'Invalid Creditional');
        }
    }
}
