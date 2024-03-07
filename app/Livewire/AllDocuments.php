<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Admin;
use App\Models\Category;
use App\Models\Document;
use App\Models\User;
use Livewire\WithPagination;

class AllDocuments extends Component
{
    use WithPagination;

    public $users;
    public $admins;
    public $categories;
    public $category_id;
    public $query;

    protected $listeners = ['reloadDocuments'];

    public function mount()
    {
        $this->users = User::get();
        $this->admins = Admin::get();
        $this->categories = Category::get();
    }

    public function render()
    {
        // Fetch documents with pagination
        $documents = Document::query();

        if ($this->category_id) {
            $documents->where('category_id', $this->category_id);
        }

        if ($this->query) {
            $documents->where('documentName', 'like', '%' . $this->query . '%');
        }

        $documents = $documents->orderByDesc('id')->paginate(10);

        return view('livewire.all-documents', [
            'documents' => $documents,
        ])->layout('layouts.main');
    }

    public function reloadDocuments($category_id, $query)
    {
        $this->category_id = $category_id;
        $this->query = $query;
    }
}
