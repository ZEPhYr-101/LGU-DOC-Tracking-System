<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Livewire\Component;

class EditUserForm extends Component
{
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

    protected $listeners = ['editUser', 'showEditUserForm', 'hideEditUserForm'];

    public function editUser($id)
    {
        $this->id = $id;

        $user = User::findOrFail($id);
        $this->fname = $user->fname;
        $this->lname = $user->lname;
        $this->email = $user->email;

        $this->emit('showEditUserForm'); // Emit an event to show the edit user form
    }

    public function update()
{
    $validatedData = $this->validate([
        'fname' => 'sometimes|required|string|unique:users,fname,' . $this->id,
        'lname' => 'sometimes|required|string|unique:users,lname,' . $this->id,
        'email' => 'sometimes|required|email|unique:users,email,' . $this->id,
    ]);

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

        $user->save();

        session()->flash('success', 'User Updated Successfully');
        $this->emit('hideEditUserForm'); // Emit an event to hide the edit user form
    } catch (\Exception $e) {
        session()->flash('error', 'Error updating user: ' . $e->getMessage());
    }
}
}