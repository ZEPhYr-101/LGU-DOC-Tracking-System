<?php

namespace App\Livewire\User;

use App\Models\Admin;
use App\Models\Category;
use App\Models\Document;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class AllUserDocuments extends Component
{
    use WithPagination; // Use the WithPagination trait

    public $users;
    public $admins;
    public $categories;
    public $category_id;
    public $query;
    public $perPage = 10;
    public $selectedYear;
    public $selectedMonth;

    protected $listeners = ['reloadUserDocuments'];

    public function mount()
    {
        $this->users = User::get();
        $this->admins = Admin::get();
        $this->categories = Category::get();
    }

    public function render()
    {
        // Get the logged-in user's user_id_no directly
        $user_id_no = auth()->user()->user_id_no;

        // Start with a base query for documents
        $documentsQuery = Document::where('user_id', $user_id_no);

        // Filter by category_id if set
        if (!empty($this->category_id)) {
            $documentsQuery->where('category_id', $this->category_id);
        }

        // Filter by search query if set
        if (!empty($this->query)) {
            $documentsQuery->where(function ($query) {
                $query->where('documentName', 'like', '%' . $this->query . '%')
                    ->orWhere('doc_tracking_code', 'like', '%' . $this->query . '%');
            });
        }

        // Filter by selectedYear and selectedMonth if they are set
        if (!empty($this->selectedYear)) {
            $documentsQuery->whereYear('created_at', $this->selectedYear);
        }
        if (!empty($this->selectedMonth)) {
            $documentsQuery->whereMonth('created_at', $this->selectedMonth);
        }

        // Execute the query and get the paginated results
        $documents = $documentsQuery->orderByDesc('id')->paginate($this->perPage);

        // Return the view with documents
        return view('livewire.admin.all-admin-documents', [
            'documents' => $documents,
        ]);
    }

    public function reloadUserDocuments($category_id, $query, $perPage, $selectedYear, $selectedMonth)
    {
        $this->category_id = $category_id;
        $this->query = $query;
        $this->perPage = $perPage;
        $this->selectedYear = $selectedYear;
        $this->selectedMonth = $selectedMonth;

        $this->resetPage(); // Reset to the first page after changing filters
    }
}
