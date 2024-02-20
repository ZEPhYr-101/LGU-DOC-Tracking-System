<div>
    <x-slot name="title">
        Admin - Documents
    </x-slot>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Documents</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.admin-dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Documents</li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="card card-warning">
            <div class="card-header">
                <h3 class="card-title">Add Documents</h3>
            </div>
            <div class="card-body">
                <form>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Upload Document</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                    <input type="file" wire:model='document' class="form-control">
                                        @error('document')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        <label class="custom-file-label" for="exampleInputFile1">Choose
                                            file</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                            <label for="">Enter Document Name</label>
                                <input type="text" wire:model='documentName' class="form-control">
                                @error('title')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="">Enter Category</label>
                                <input type="text" wire:model='category' class="form-control">
                                @error('title')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Description</label>
                                 <input type="text" wire:model='description' class="form-control">
                        @error('title')
                            <span class="text-danger">{{ $message }}</span>
                        
                                <textarea type="text" wire:model='description' class="form-control" class="form-control" rows="3" placeholder="Enter ..." ></textarea>
                                @enderror
                            </div>
                        </div>

                    </div>
                </form>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Fixed Header Table</h3>
                        <div class="card-tools">
                            <div class="input-group input-group-sm" style="width: 200px;">
                                <input type="text" name="table_search" class="form-control float-right"
                                    placeholder="Search">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-body table-responsive p-0" style="height: 500px;">
                        <table class="table table-head-fixed text-nowrap">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Document Name</th>
                                    <th>User</th>
                                    <th>Category</th>
                                    <th>Description</th>
                                    <th>Document</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
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
                                    <h4>Document Not Found</h4>
                                @endforelse
                            </tbody>
                        
                        </table>
                        <div class="text-center">
                            {{ $documents->links('custom-pagination-links-view') }}
                        </div>
                    </div>

                </div>

            </div>
        </div>

    </div>
</div>
