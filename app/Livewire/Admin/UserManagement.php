<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UserManagement extends Component
{
    use WithPagination;

    public $totalUser;
    public $search = '';

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $usersQuery = User::orderBy('id', 'DESC');

        if (!empty($this->search)) {
            $usersQuery->where('fname', 'like', '%' . $this->search . '%')
                       ->orWhere('lname', 'like', '%' . $this->search . '%')
                       ->orWhere('user_id_no', 'like', '%'. $this->search. '%');
        }

        $users = $usersQuery->paginate(10);
        $totalUser = User::count();
        return view('livewire.admin.user-management', compact('users', 'totalUser'))->layout('layouts.main');

    }

    public function approve($id)
    {
        $user = User::findOrFail($id);
        $user->is_Accepted = 1;
        $user->email_verified_at = now();
        $result = $user->save();
        if ($result) {
            session()->flash('success', 'Admin Approved User');
            $this->redirect('user-management', 'showSuccessMessage');
        }
    }

    public function delete($id)
    {
        $user = User::findOrFail($id)->delete();
        if ($user) {
            session()->flash('success', 'User Deleted Successfully');
            $this->redirect('user-management', 'showSuccessMessage');
        }
    }
    public function editUserForm($id)
    {
        return redirect()->route('editUserForm', ['id' => $id]);
    }
    public function changePassword($id)
    {
        return redirect()->route('admin.changePassword', ['id' => $id]);
    }
}
