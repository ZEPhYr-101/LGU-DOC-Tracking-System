<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UserManagement extends Component
{
    use WithPagination;

    public $totalUser;
    public $query;
    public $perPage = 10;

    public function render()
    {
        $users = User::get();
        $totalUser = User::count();

        $data = [
            'users' => $users,
            'totalUser' => $totalUser,
        ];

        return view('livewire.admin.user-management',$data)->layout('layouts.main');
    }

    public function filter()
    {
        $this->dispatch('reloadUsers', $this->query, $this->perPage);
    }
}
