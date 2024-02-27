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

    public $route;
    public $description;
    public $document;

    public $categories;

    public function mount()
    {
        $this->categories = Category::all();
        $this->route = url()->previous();
    }


    protected $rules = [
        'documentName' => 'required',
        'category' => 'required',
        'description' => 'required',
        'document' => 'required|file|mimes:doc,docx,pdf,txt,rtf,odt,xls,xlsx,csv,jpg,jpeg,png,gif,bmp,svg,ppt,pptx',
    ];

    public function create()
    {
        $validatedData = $this->validate([
            'document' => $this->rules['document'], // Validating 'document' separately
        ], [
            'document.required' => 'Please select a document to upload.',
            'document.file' => 'The uploaded file is not valid.',
            'document.mimes' => 'Only .doc, .docx, .pdf, .txt, .rtf, .odt, .xls, .xlsx, .csv, .jpg, .jpeg, .png, .gif, .bmp, .svg, .ppt, .pptx files are allowed.',
        ]);

        $categoryId = $this->category;

        $category = Category::findOrFail($categoryId);

        $folderName = str_replace(' ', '_', $category->category_name);

        $folderPath = 'documents/' . $folderName;

        if (!Storage::exists($folderPath)) {
            Storage::makeDirectory($folderPath, 0755, true);
        }

        $filename = $validatedData['document']->store($folderPath, 'public');

        if ($filename) {
            $document = new Document();
            $document->documentName = $this->documentName;
            $document->user_id = Auth::user()->user_id_no;
            $document->category = $categoryId;
            $document->description = $this->description;
            $document->document = $filename;
            $document->doc_tracking_code = "DOCS-" . mt_rand(1000000000000, 9999999999999);
            $document->save();

            $documentPath = Storage::url($filename);

            session()->flash('success', 'Document uploaded successfully');
            session()->flash('document_path', $documentPath);

            $this->reset();

            $categoryId = request()->query('id');

            $redirectUrl = '/admin/documents?id=' . $categoryId;
            return redirect()->to($redirectUrl); // Use redirect() helper
        } else {
            session()->flash('error', 'Failed to upload document. Please try again.');
        }
    }


    public function render()
    {
        return view('livewire.upload-ducuments')->layout('layouts.main');
    }
}
