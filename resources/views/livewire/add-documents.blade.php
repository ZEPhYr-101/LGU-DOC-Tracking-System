<div>
    <x-slot name="title">
        add | Documents
    </x-slot>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Add Documents</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.admin-dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Add Documents</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="card card-warning">
        <div class="card-header">
            <h3 class="card-title">Track Documents</h3>
        </div>
        <div class="card-body">
            <form>
                <div class="row">
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label>Upload Document</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="exampleInputFile2">
                                    <label class="custom-file-label" for="exampleInputFile2">Choose
                                        file</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label>Document Name</label>
                            <input type="text" class="form-control" placeholder="Enter ..." id="documentName2">
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label>Subject</label>
                            <input type="text" class="form-control" placeholder="Enter ..." id="category2">
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label>Office</label>
                            <input type="text" class="form-control" placeholder="Enter ..." id="category2">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label>Category</label>
                            <input type="text" class="form-control" placeholder="Enter ..." id="department2">
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label>Sub-Category</label>
                            <input type="text" class="form-control" placeholder="Enter ..." id="department2">
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="form-group">
                            <label>Action</label>
                            <input class="form-control" rows="3" placeholder="Enter ..."
                                id="description2"></input>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label>Deadline</label>
                            <input type="text" class="form-control" placeholder="Enter ..." id="department2">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Message</label>
                            <textarea class="form-control" rows="3" placeholder="Enter ..." id="description2"></textarea>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Description</label>
                            <textarea class="form-control" rows="3" placeholder="Enter ..." id="description2"></textarea>
                        </div>
                    </div>

                </div>
            </form>
            <div class="text-right">
                <!-- Place the button inside this div for alignment -->
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>


    </div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Create Document</h3>
                        </div>
                        <div class="card-body">
                            <form wire:submit.prevent='create'>
                                <div class="form-group">
                                    <label for="documentName">Document Name</label>
                                    <input type="text" wire:model='documentName' class="form-control"
                                        id="documentName">
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
                                    <input type="text" wire:model='description' class="form-control"
                                        id="description">
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
                                <button type='submit' class="btn btn-primary">Save</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
