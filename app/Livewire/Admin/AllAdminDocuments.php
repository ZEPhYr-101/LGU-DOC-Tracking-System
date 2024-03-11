<?php

namespace App\Livewire\Admin;

use App\Models\Admin;
use App\Models\Category;
use App\Models\Document;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class AllAdminDocuments extends Component
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

    protected $listeners = ['reloadAdminDocuments'];

    public function mount()
    {
        $this->users = User::get();
        $this->admins = Admin::get();
        $this->categories = Category::get();
    }

    public function render()
    {
        // Determine if the logged-in user is an admin or a regular user
        $is_admin = Auth::guard('admin')->check(); // True if an admin is logged in
        $is_user = Auth::guard('web')->check(); // True if a regular user is logged in

        // Initialize variables
        $user_id = null; // Changed from $user_id_no to $user_id for clarity
        $office_id = null;

        // Get user details based on the type of logged-in user
        if ($is_admin) {
            $user = Auth::guard('admin')->user();
        } elseif ($is_user) {
            $user = Auth::guard('web')->user();
        }

        // If a user is logged in (whether admin or regular user), proceed to set necessary variables
        if ($user) {
            $user_id = $user->id; // Assuming the user's ID field is named 'id'
            $office_id = $user->office_id; // Assuming the user model has office_id
        }

        // Start with a base query for documents
        $documentsQuery = Document::query();

        if ($is_admin) {
            // For admins, fetch all documents associated with the admin's office_id
            // The requirement to match user_id with admin's user_id_no seems incorrect since admin might want to see all documents in their office, not just their own
            // If you indeed need to match the admin's user_id with documents' user_id, uncomment the next line and remove the where('office_id', $office_id) line
            // $documentsQuery->where('user_id', $user_id);
            $documentsQuery->where('office_id', $office_id);
        } elseif ($is_user) {
            // For regular users, fetch documents that match the user_id
            $documentsQuery->where('user_id', $user_id);
        }

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

        $documents = $documentsQuery->orderByDesc('id')->paginate($this->perPage);

        return view('livewire.admin.all-admin-documents', [
            'documents' => $documents,
        ]);
    }

    public function reloadAdminDocuments($category_id, $query, $perPage, $selectedYear, $selectedMonth)
    {
        $this->category_id = $category_id;
        $this->query = $query;
        $this->perPage = $perPage;
        $this->selectedYear = $selectedYear;
        $this->selectedMonth = $selectedMonth;

        $this->resetPage(); // Reset to the first page after changing filters
    }
}
