<?php

namespace App\Livewire\User;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Register extends Component
{
    public $fname,
        $lname,
        $email,
        $dept,
        $password;
    public function render()
    {
        return view('livewire.user.register')->layout('layouts.user-login');
    }
    public function create()
    {
        $users = new User();
        $this->validate([
            'fname' => ['required', 'string', 'min:3', 'max:10'],
            'lname' => ['required', 'string', 'min:3', 'max:10'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'string', 'min:3', 'max:12'],
            'dept' => ['required'],
        ]);

        $users->fname = $this->fname;
        $users->lname = $this->lname;
        $users->email = $this->email;
        $users->password = Hash::make($this->password);
        $users->dept = $this->dept;
        $users->is_Accepted = 0;

        $result = $users->save();
        if ($result) {
            session()->flash('success', 'You are successfully registered! Admin will approve your account in 2 minutes. Check your email. ');
            $this->fname = '';
            $this->lname = '';
            $this->email = '';
            $this->password = '';
            $this->c_password = '';
            $this->dept = '';
            return redirect(route('user.login'));
        }
    }
}