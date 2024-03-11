<?php

namespace App\Livewire\User;

use App\Models\Category;
use App\Models\Document;
use Livewire\Component;

class UserDocuments extends Component
{
    public $category_id;
    public $totalUser;
    public $query;
    public $selectedMonth;
    public $selectedYear;
    public $perPage = 10;
    public function render()
    {
        $categories = Category::get();

        // Fetch only documents that belong to the authenticated user based on user_id_no
        // Assuming you have the user_id_no available from the authenticated user
        $user_id_no = auth()->user()->user_id_no;
        $documents = Document::where('user_id', $user_id_no)->get();

        // Count only documents that belong to the authenticated user based on user_id_no
        $totalDocument = Document::where('user_id', $user_id_no)->count();

        // Combine all variables into a single array to pass to the view
        $data = [
            'categories' => $categories,
            'documents' => $documents,
            'totalDocument' => $totalDocument,
        ];

        // Pass the combined data to the view
        return view('livewire.user.user-documents', $data)->layout('layouts.main-user');
    }


    public function filter()
    {
        $this->dispatch('reloadUserDocuments', $this->category_id, $this->query, $this->perPage, $this->selectedYear, $this->selectedMonth);
    }
}
