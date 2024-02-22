<?php

namespace App\Livewire\Admin;
use App\Models\Document;
use Livewire\Component;

class Documents extends Component
{
    public $documents;

    public function mount()
    {
        $this->documents = Document::all();
    }
    public function render()
    {
        return view('livewire.admin.documents')->layout('layouts.main');
    }
}
