<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Validation\Rule;

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
    public $c_password;
   
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
    $rules = [
        'password' => 'string|unique:users,password,' . $this->id,
    ];

    if (!empty($this->password)) {
        $rules['c_password'] = 'required|string|same:password';
    }

    $validatedData = $this->validate($rules, [
        'c_password.same' => 'The confirmation password must match the password.',
    ]);

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
    } catch (\Exception $e) {
        session()->flash('error', 'Error updating password: ' . $e->getMessage());
        $this->redirect('/admin/user-management', 'showErrorMessage');
    }
}

}
