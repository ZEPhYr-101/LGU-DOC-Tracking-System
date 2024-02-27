<?php

namespace App\Livewire\Admin;

use App\Models\Admin;
use App\Models\Category;
use App\Models\Document;
use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Request;


class Documents extends Component
{
    public $documents;
    public $users;

    public $categories;

    public $admins;

    public function mount()
    {
        $id = Request::input('id'); // Get the ID from the request

        if ($id) {
            // If ID is provided, filter documents by ID
            $this->documents = Document::where('category', $id)->orderByDesc('created_at')->get();
        } else {
            // If ID is not provided, retrieve all documents
            $this->documents = Document::orderByDesc('created_at')->get();
        }
        $this->categories= Category::all();
        $this->users = User::all();
        $this->admins = Admin::all();
    }
    public function render()
    {
        return view('livewire.admin.documents')->layout('layouts.main');
    }
}
