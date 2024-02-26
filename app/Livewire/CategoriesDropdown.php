<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Document;
use App\Models\User;
use App\Models\Admin;
use Livewire\Component;

class CategoriesDropdown extends Component
{
    public $categories;
    public $current_route;
    public $currentRoute;

    public function mount()
    {
        $this->categories = Category::all();
    }

    public function render()
    {
        return view('livewire.categories-dropdown');
    }
}
