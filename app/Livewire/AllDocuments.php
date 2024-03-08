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

    public $perPage = 10;

    protected $listeners = ['reloadDocuments'];

    public function mount()
    {
        $this->users = User::get();
        $this->admins = Admin::get();
        $this->categories = Category::get();
    }

    public function render()
    {
        // Start the query
        $documentsQuery = Document::query();

        // Filter by category_id if it's set
        if ($this->category_id) {
            $documentsQuery->where('category_id', $this->category_id);
        }

        // Apply search criteria if $this->query is set
        if ($this->query) {
            $documentsQuery->where(function ($query) {
                $query->where('documentName', 'like', '%' . $this->query . '%')
                    ->orWhere('doc_tracking_code', 'like', '%' . $this->query . '%');
            });
        }

        // Apply ordering and paginate the results
        $documents = $documentsQuery->orderByDesc('id')->paginate($this->perPage);

        // Return the view with the paginated documents
        return view('livewire.all-documents', [
            'documents' => $documents,
        ])->layout('layouts.main');
    }

    public function reloadDocuments($category_id, $query, $perPage)
    {
        $this->category_id = $category_id;
        $this->query = $query;
        $this->perPage = $perPage;
    }
}
