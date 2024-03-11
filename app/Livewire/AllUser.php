<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class AllUser extends Component
{
    use WithPagination;
    public $query;
    public $perPage = 10;
    protected $listeners = ['reloadUsers'];

    public function render()
    {
        $usersQuery = User::query();
        if ($this->query) {
            $usersQuery->where(function ($query) {
                $query->where('fname', 'like', '%' . $this->query . '%')
                    ->orWhere('lname', 'like', '%' . $this->query . '%')
                    ->orWhere('user_id_no', 'like', '%' . $this->query . '%');
            });
        }

        $users = $usersQuery->orderByDesc('id')->paginate($this->perPage);


        return view('livewire.all-user',['users'=>$users,])->layout('layouts.main');
    }

    public function reloadUsers($query, $perPage)
    {
        $this->query = $query;
        $this->perPage = $perPage;
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
