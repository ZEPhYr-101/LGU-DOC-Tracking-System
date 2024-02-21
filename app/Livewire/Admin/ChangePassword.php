<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class ChangePassword extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public function render()
    {
        $user = User::findOrFail($this->id);

        return view('livewire.admin.change-password', [
            'user' => $user,
        ])->layout('layouts.main');
    }
    public function hideChangePassword()
    {
        $this->changePasswordVisible = false;
    }

    public $id;
    public $password;
   
    public $changePasswordVisible = false;

    protected $listeners = ['editPassword', 'showChangePassword', 'hideChangePassword'];

    public function editPassword($id)
    {
        $this->id = $id;

        $user = User::findOrFail($id);
        $this->password = $user->password;
        
        $this->emit('showChangePassword'); // Emit an event to show the edit user form
    }

    public function update()
{
    $rules = [];

    if (!empty($this->password)) {
        $rules['password'] = 'string|unique:users,password,' . $this->id;
    }

    $validatedData = $this->validate($rules);

    try {
        // Find the user by ID and update the fields
        $user = User::findOrFail($this->id);

        // Update the fields individually only if they are present in the request
        if (isset($validatedData['password'])) {
            $user->password = $validatedData['password'];
        }

        $result = $user->save();
        if ($result) {
            session()->flash('success', 'Password updated successfully!');
            $this->redirect('/admin/user-management', 'showSuccessMessage');
        }
        // Emit an event to hide the edit user form
        // Redirect to the user-management route
        //return redirect()->route('user-management', 'showSuccessMesssage');
    } catch (\Exception $e) {
        session()->flash('error', 'Error updating password: ' . $e->getMessage());
    }
}

}
