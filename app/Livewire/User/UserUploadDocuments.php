<?php

namespace App\Livewire\User;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use App\Models\Document;
use Illuminate\Support\Facades\Storage;

class UserUploadDocuments extends Component
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
            'document' => 'required',
            'document.*' => 'file|mimes:doc,docx,pdf,txt,rtf,odt,xls,xlsx,csv,jpg,jpeg,png,gif,bmp,svg,ppt,pptx',
        ]);

        $category = Category::findOrFail($validatedData['category']);
        $folderName = str_replace(' ', '_', $category->category_name);
        $baseFolderPath = 'documents/' . $folderName;

        // Ensure the base category folder exists
        if (!Storage::exists($baseFolderPath)) {
            Storage::makeDirectory($baseFolderPath, 0755, true);
        }

        $documents = is_array($validatedData['document']) ? $validatedData['document'] : [$validatedData['document']];
        $imageTypes = ['jpg', 'jpeg', 'png', 'gif', 'bmp', 'svg'];

        $images = collect($documents)->filter(fn ($doc) => in_array($doc->getClientOriginalExtension(), $imageTypes));
        $nonImages = collect($documents)->reject(fn ($doc) => in_array($doc->getClientOriginalExtension(), $imageTypes));

        // For multiple images, store them in a specific subfolder and save the folder path in the database
        if ($images->count() > 0) {
            $imageFolderPath = "{$baseFolderPath}/{$validatedData['documentName']}";
            if (!Storage::exists($imageFolderPath)) {
                Storage::makeDirectory($imageFolderPath, 0755, true);
            }
            foreach ($images as $image) {
                $image->store($imageFolderPath, 'public');
            }
            // Save the image folder path for multiple images
            $this->storeDocumentRecord($validatedData, $imageFolderPath, true);
        }

        // Handle non-image files individually
        foreach ($nonImages as $nonImage) {
            $filePath = $nonImage->storeAs($baseFolderPath, $nonImage->getClientOriginalName(), 'public');
            // For individual non-image files, save their paths
            $this->storeDocumentRecord($validatedData, $filePath);
        }

        session()->flash('success', 'Document(s) uploaded successfully.');
        $this->reset();

        return redirect()->route('user.documents');
    }

    protected function storeDocumentRecord($validatedData, $filePath, $isMultipleImages = false)
    {
        $document = new Document();
        if (!$isMultipleImages) {
            $document->documentName = basename($filePath); // For individual files, use the basename as the document name
        } else {
            $document->documentName = $validatedData['documentName']; // For multiple images, use the provided document name
        }
        $document->user_id = Auth::guard('web')->user()->user_id_no;
        $document->office_id = Auth::guard('web')->user()->office_id;
        $document->category_id = $validatedData['category'];
        $document->description = $validatedData['description'];
        $document->document = $filePath; // Store the folder path for multiple images, else individual file path
        $document->doc_tracking_code = "DOCS-" . mt_rand(1000000000000, 9999999999999);
        $document->save();
    }
    public function render()
    {
        return view('livewire.user.user-upload-documents');
    }
}
