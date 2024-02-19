<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class ApproveUser extends Component
{

    public $totalUser;
    use WithPagination;
    public function pageinationView()
    {
        return 'custom-pagination-links-view';
    }

    public function render()
    {
        $users = User::orderBy('id', 'DESC')->paginate(10);
        $this->totalUser = User::count();
        return view('livewire.admin.user-management', compact('users'))->layout('layouts.main');
    }

    public function approve($id)
    {
        $user = User::findOrFail($id);
        $user->is_Accepted = 1;
        $user->email_verified_at = now();
        $result = $user->save();
        if ($result) {
            session()->flash('success', 'Admin Approve User');
        }
    }

    public function delete($id)
    {
        $user = User::findOrFail($id)->delete();
        if ($user) {
            session()->flash('success', 'User Delete Successfully');
        }
    }
}
