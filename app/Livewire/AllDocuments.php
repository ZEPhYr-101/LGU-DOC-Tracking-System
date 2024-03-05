<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Admin;
use App\Models\Category;
use App\Models\Document;
use App\Models\User;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Request;

class AllDocuments extends Component
{
    use WithPagination;
    public $documents;
    public $users;
    public $categories;
    public $admins;
    public $search = '';

    public function mount()
    {
        $this->documents = Document::all();
        $this->categories = Category::all();
        $this->users = User::all();
        $this->admins = Admin::all();
    }
    public function render()
    {
        return view('livewire.all-documents')->layout('layouts.main');
    }
}
