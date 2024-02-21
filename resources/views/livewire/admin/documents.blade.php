<div>
    <x-slot name="title">
        Admin | Documents
    </x-slot>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Documents</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.admin-dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Documents</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <h3>Document ( {{ $totalDocuments }} )</h3>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            Add Documents
                        </button>
                    </div>
                </div>
            </div>


        @if ($showTable == true)
            <div class="card">
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-striped text-nowrap">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Document Name</th>
                                    <th>User</th>
                                    <th>Category</th>
                                    <th>Description</th>
                                    <th>Document</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($documents as $document)
                                    <tr>
                                        <td>{{ $document->id }}</td>
                                        <td>{{ $document->documentName }}</td>
                                        <td>{{ $document->users->fname . ' ' . $document->users->lname }}</td>
                                        <td>{{ $document->category }}</td>
                                        <td>{{ $document->description }}</td>
                                        <td>{{ $document->document }}</td>
                                        <td><button wire:click='edit({{ $document->id }})'
                                                class="btn btn-primary">Edit</button></td>
                                        <td><button wire:click='delete({{ $document->id }})'
                                                class="btn btn-danger">Delete</button></td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8" class="text-center">Document Not Found</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <div class="text-center">
                            {{ $documents->links('custom-pagination-links-view') }}
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>


    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create Document</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent='create'>
                        <div class="form-group">
                            <label for="documentName">Document Name</label>
                            <input type="text" wire:model='documentName' class="form-control" id="documentName">
                            @error('documentName')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="category">Category</label>
                            <input type="text" wire:model='category' class="form-control" id="category">
                            @error('category')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <input type="text" wire:model='description' class="form-control" id="description">
                            @error('description')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Upload Document</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" wire:model='document' class="custom-file-input" id="document">
                                    <label class="custom-file-label" for="exampleInputFile2">Choose
                                        file</label>
                                </div>
                            </div>
                        </div>
                        <div class="text-right">
                            <button type='submit' class="btn btn-primary">Submit</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>



    @if ($updateForm == true)
        <div class="container">
            <button class="btn btn-success" wire:click='goback'>
                <span wire:loading.remove wire:target='goback'>GoBack</span>
                <span wire:loading wire:target='goback'>GoBack....</span>
            </button>
            <form wire:submit.prevent='update({{ $edit_id }})'>
                <div class="form-group my-1">
                    <label for="">Enter Document Name</label>
                    <input type="text" wire:model='edit_documentName' class="form-control">
                    @error('title')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group my-1">
                    <label for="">Enter Category</label>
                    <input type="text" wire:model='edit_category' class="form-control">
                    @error('title')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group my-1">
                    <label for="">Enter Description</label>
                    <input type="text" wire:model='edit_description' class="form-control">
                    @error('title')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group my-1">
                    <label for="">Upload Document</label>
                    <input type="file" wire:model='new_document' class="form-control">
                    <input type="hidden" wire:model='old_document' class="form-control">
                    @if ($new_document)
                        <span>{{ $new_document }}</span>
                    @else
                        <span>{{ $old_document }}</span>
                    @endif
                    @error('document')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <button type='submit' class="btn btn-success">Save</button>
            </form>
        </div>
    @endif
</div>
