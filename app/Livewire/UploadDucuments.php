<?php

namespace App\Livewire;

use App\Models\Category;
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
    public $categories;
    public function mount()
    {
        $this->categories = Category::all();
    }

    public function create()
    {
        $validatedData = $this->validate([
            'documentName' => 'required',
            'category' => 'required',
            'description' => 'required',
            'document' => 'required|file|mimes:doc,docx,pdf,txt,rtf,odt,xls,xlsx,csv,jpg,jpeg,png,gif,bmp,svg,ppt,pptx',
        ]);

        $category = Category::findOrFail($validatedData['category']);

        $folderName = str_replace(' ', '_', $category->category_name);

        $folderPath = 'documents/' . $folderName;

        if (!Storage::exists($folderPath)) {
            Storage::makeDirectory($folderPath, 0755, true);
        }

        $filename = $validatedData['document']->store($folderPath, 'public');

        if ($filename) {
            $document = new Document();
            $document->documentName = $validatedData['documentName'];
            $document->user_id = Auth::guard('admin')->user()->user_id_no;
            $document->category_id = $validatedData['category'];
            $document->description = $validatedData['description'];
            $document->document = $filename;
            $document->doc_tracking_code = "DOCS-" . mt_rand(1000000000000, 9999999999999);
            $document->save();

            $documentPath = Storage::url($filename);

            session()->flash('success', 'Document uploaded successfully');
            session()->flash('document_path', $documentPath);

            $this->reset();
        } else {
            session()->flash('error', 'Failed to upload document. Please try again.');
        }

        return redirect()->route('alldocuments');
    }
    public function render()
    {
        return view('livewire.upload-ducuments')->layout('layouts.main');
    }
}
