<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use App\Models\Document;
use Illuminate\Support\Facades\Storage;

class UploadDucuments extends Component
{
    use WithFileUploads;

    public $documentName;
    public $category;
    public $description;
    public $document;

    protected $rules = [
        'documentName' => 'required',
        'document' => 'required|file',
        'category' => 'required',
        'description' => 'required',
    ];

    public function create()
    {
        $this->validate([
            'documentName' => 'required',
            'document' => 'required|file',
            'category' => 'required',
            'description' => 'required',
        ]);

        $category = $this->category;

        // Sanitize the category name (replace spaces with underscores)
        $category = str_replace(' ', '_', $category);

        // Check if the folder exists, if not, create it
        $folderPath = 'documents/' . $category;
        if (!Storage::exists($folderPath)) {
            Storage::makeDirectory($folderPath, 0755, true); // Recursive directory creation
        }

        // Store the file in the category folder
        $filename = $this->document->store($folderPath, 'public');

        if ($filename) {
            $document = new Document();
            $document->documentName = $this->documentName;
            $document->user_id = Auth::user()->user_id_no;
            $document->category = $category;
            $document->description = $this->description;
            $document->document = $filename;
            $document->doc_tracking_code = "DOCS-" . mt_rand(1000000000000, 9999999999999);

            $document->save();

            // Get the full path of the stored document
            $documentPath = Storage::url($filename);

            session()->flash('success', 'Document uploaded successfully');
            session()->flash('document_path', $documentPath); // Store the document path in session

            // Reset form fields
            $this->reset();

            // Close the modal after successful submission

            // Redirect to the documents page
            $this->redirect('documents');
        } else {
            // Handle the case where file upload failed
            session()->flash('error', 'Failed to upload document. Please try again.');
        }
    }


    public function render()
    {
        return view('livewire.upload-ducuments');
    }
}
