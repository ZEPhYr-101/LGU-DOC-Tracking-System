<?php

// In App/Http/Livewire/IncomingDocuments.php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Commit; // assuming you have a model named Commit that corresponds to your `commit` table

class IncomingDocuments extends Component
{
    public $incomingDocuments;

    public function mount()
    {
        // Fetch incoming documents for the authenticated user
        // You need to define the relationship in your User model for this to work
        $this->incomingDocuments = Commit::with('uploadedBy') // assuming 'uploadedBy' is a relation defined in Commit model
                                     ->where('committed_by', auth()->id())
                                     ->orderBy('date', 'desc')
                                     ->get();
    }

    public function render()
    {
        return view('livewire.incoming-documents')->layout('layouts.main');
    }
}

