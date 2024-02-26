<?php

namespace App\Livewire\Admin;

use App\Models\Admin;
use App\Models\Document;
use Livewire\Component;
use App\Models\User;


class Documents extends Component
{
    public $documents;
    public $users;

    public $admins;

    public function mount()
    {
        $this->documents = Document::orderByDesc('created_at')->get();
        $this->users = User::all();
        $this->admins = Admin::all();
    }
    public function render()
    {
        return view('livewire.admin.documents')->layout('layouts.main');
    }
}
