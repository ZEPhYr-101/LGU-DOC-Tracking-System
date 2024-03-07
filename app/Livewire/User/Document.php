<?php

namespace App\Livewire\User;


use App\Models\Admin;
use App\Models\Category;
use App\Models\User;
use Livewire\WithPagination;
use Livewire\Component;
use Illuminate\Support\Facades\Request;


class Document extends Component
{
    use WithPagination;
    public $documents;
    public $users;
    public $categories;
    public $admins;
    public $search = '';
    // Pagination
    protected $paginationTheme = 'bootstrap';

    public function mount()
    {
        $this->categories = Category::all();
        $this->users = User::all();
        $this->admins = Admin::all();

    }

    public function render()
    {
        $id = Request::input('id');
        $query = Document::query(); // Start with a base query

        if ($id) {
            $query->where('category_id', $id); // Filter by category ID if provided
        }

        if ($this->search !== '') {
            // Add search filtering if a search term is present
            $query->where(function ($query) {
                $query->where('documentName', 'like', '%' . $this->search . '%')
                    ->orWhere('doc_tracking_code', 'like', '%' . $this->search . '%');
            });
        }

        $this->documents = $query->orderByDesc('id')->get();

        return view('livewire.user.document');
    }
}
