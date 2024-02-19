<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class EditUserForm extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public function render()
    {
        $user = User::findOrFail($this->id);

        return view('livewire.admin.edit-user-form', [
            'user' => $user,
        ])->layout('layouts.main');
    }

    public $id;
    public $fname;
    public $lname;
    public $email;
    public $dept;

    protected $listeners = ['editUser', 'showEditUserForm', 'hideEditUserForm'];

    public function editUser($id)
    {
        $this->id = $id;

        $user = User::findOrFail($id);
        $this->fname = $user->fname;
        $this->lname = $user->lname;
        $this->email = $user->email;
        $this->dept = $user->dept;

        $this->emit('showEditUserForm'); // Emit an event to show the edit user form
    }

    public function update()
{
    $rules = [];

    if (!empty($this->fname)) {
        $rules['fname'] = 'string|unique:users,fname,' . $this->id;
    }

    if (!empty($this->lname)) {
        $rules['lname'] = 'string|unique:users,lname,' . $this->id;
    }

    if (!empty($this->email)) {
        $rules['email'] = 'email|unique:users,email,' . $this->id;
    }

    if (!empty($this->dept)) {
        $rules['dept'] = 'string|unique:users,dept,' . $this->id;
    }

    $validatedData = $this->validate($rules);

    try {
        // Find the user by ID and update the fields
        $user = User::findOrFail($this->id);

        // Update the fields individually only if they are present in the request
        if (isset($validatedData['fname'])) {
            $user->fname = $validatedData['fname'];
        }

        if (isset($validatedData['lname'])) {
            $user->lname = $validatedData['lname'];
        }

        if (isset($validatedData['email'])) {
            $user->email = $validatedData['email'];
        }

        if (isset($validatedData['dept'])) {
            $user->email = $validatedData['dept'];
        }
        $user->save();

        session()->flash('success', 'User Updated Successfully');
        $this->emit('hideEditUserForm'); // Emit an event to hide the edit user form
    } catch (\Exception $e) {
        session()->flash('error', 'Error updating user: ' . $e->getMessage());
    }
}

}