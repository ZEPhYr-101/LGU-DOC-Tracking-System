<?php

namespace App\Livewire\Admin;

use App\Models\Document as ModelsDocument;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Documents extends Component
{
    public
        $document,
        $edit_id,
        $edit_documentName,
        $documentName,
        $category,
        $description,
        $edit_category,
        $edit_description,
        $new_document,
        $old_document,
        $showTable = true,
        $createForm = false,
        $updateForm = false;
    public $totalDocuments;
    use WithFileUploads;

    use WithPagination;
    public function pageinationView()
    {
        return 'custom-pagination-links-view';
    }
    public function render()
    {
        $documents = ModelsDocument::orderBy('id', 'DESC')->where('user_id', Auth::user()->id)->paginate(4);
        $this->totalDocuments = ModelsDocument::count();
        return view('livewire.admin.documents', compact('documents'))->layout('layouts.main');
    }

    public function goBack()
    {
        $this->showTable = true;
        $this->createForm = false;
        $this->updateForm = false;
    }

    public function showForm()
    {
        $this->showTable = false;
        $this->createForm = true;
    }

    public function create()
    {
        $document = new ModelsDocument();
        $this->validate([
            'documentName' => ['required'],
            'document' => ['required'],
            'category' => ['required'],
            'description' => ['required'],
        ]);
        $filename = "";
        if ($this->document) {
            $filename = $this->document->store('documents', 'public');
        }
        $document->documentName = $this->documentName;
        $document->user_id = Auth::user()->id;
        $document->category = $this->category;
        $document->description = $this->description;
        $document->document = $filename;
        $result = $document->save();
        if ($result) {
            session()->flash('success', 'Document upload Successfully');
            $this->documentName = "";
            $this->category = "";
            $this->description = "";
            $this->document = "";
            $this->goBack();
        }
    }

    public function edit($id)
    {
        $this->showTable = false;
        $this->updateForm = true;
        $documents = ModelsDocument::findOrFail($id);
        $this->edit_id = $documents->id;
        $this->edit_documentName = $documents->documentName;
        $this->edit_category = $documents->category;
        $this->edit_description = $documents->description;
        $this->old_document = $documents->document;
    }

    public function update($id)
    {
        $documents = ModelsDocument::findOrFail($id);
        $this->validate([
            'edit_documentName' => ['required'],
        ]);
        $filename = "";
        if ($this->new_document) {
            $path = public_path('storage\\') . $documents->document;
            if (File::exists($path)) {
                File::delete($path);
            }
            $filename = $this->new_document->store('documents', 'public');
        } else {
            $filename = $this->old_document;
        }
        $documents->documentName = $this->edit_documentName;
        $documents->category = $this->edit_category;
        $documents->description = $this->edit_description;
        $documents->document = $filename;
        $result = $documents->save();
        if ($result) {
            session()->flash('success', 'Document Update Successfully');
            $this->edit_documentName = "";
            $this->new_document = "";
            $this->old_document = "";
            $this->goBack();
        }
    }

    public function delete($id)
    {
        $documents = ModelsDocument::findOrFail($id);
        $path = public_path('storage\\') . $documents->document;
        if (File::exists($path)) {
            File::delete($path);
        }
        $result = $documents->delete();
        if ($result) {
            session()->flash('success', 'Document Delete Successfully');
        }
    }
}
