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
    public $users;
    public $categories;
    public $admins;
    public $search = '';

    public function mount()
    {

        $this->categories = Category::all();
        $this->users = User::all();
        $this->admins = Admin::all();
    }
    public function render()
    {
        $documents = Document::where('documentName', 'like', '%' . $this->search . '%')->orderBy('id', 'DESC')->paginate(10);
        return view('livewire.all-documents', ['documents' => $documents])->layout('layouts.main');
    }
}
