<?php

namespace App\Livewire\Admin;

use App\Models\Category;
use App\Models\Document;
use Livewire\Component;

class Documents extends Component
{
    public $category_id;
    public $query;
    public function render()
    {
        $categories = Category::get();
        return view('livewire.admin.documents',['categories' => $categories])->layout('layouts.main');
    }

    public function filter()
    {
        $this->dispatch('reloadDocuments', $this->category_id, $this->query);
    }
}
