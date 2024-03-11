<?php

namespace App\Livewire\Admin;

use App\Models\Category;
use App\Models\Document;
use Livewire\Component;

class Documents extends Component
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
    $documents = Document::get(); // Assuming you have this line or something similar to fetch documents
    $totalDocument = Document::count();

    // Combine all variables into a single array to pass to the view
    $data = [
        'categories' => $categories,
        'documents' => $documents,
        'totalDocument' => $totalDocument,
    ];

    // Pass the combined data to the view
    return view('livewire.admin.documents', $data)->layout('layouts.main');
}


    public function filter()
    {
        $this->dispatch('reloadAdminDocuments', $this->category_id, $this->query, $this->perPage, $this->selectedYear, $this->selectedMonth);
    }
}
