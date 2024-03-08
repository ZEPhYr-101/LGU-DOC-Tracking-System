<div>
    <x-slot name="title">
        Admin | AllDocuments
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
            <script>
                document.addEventListener('livewire:load', function() {
                    window.livewire.on('showSuccessMessage', function(message) {
                        toastr.success(message);
                    });
                });
            </script>
        @endif

        @if (session()->has('error'))
            <script>
                document.addEventListener('livewire:load', function() {
                    window.livewire.on('showErrorMessage', function(message) {
                        toastr.error(message);
                    });
                });
            </script>
        @endif
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <h3>TOTAL DOCUMENTS: </h3>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                        <i class="fas fa-upload">
                            <span>Upload Documents</span>
                        </i>
                    </button>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="row">
                <div class="col-12">
                    <div class="card-header">
                        <div class="row justify-content-between align-items-center">
                            <!-- Adding justify-content-between to space items apart -->
                            <div class="card-tools">
                                <div style="display: flex; align-items: center; gap: 1px;">
                                    <div class="input-group input-group-sm" style="width: 60px;">
                                        <select wire:model="perPage" wire:change="filter" class="form-control">
                                            <option value="10">10</option>
                                            <option value="20">20</option>
                                            <option value="50">50</option>
                                            <option value="75">75</option>
                                            <option value="100">100</option>
                                        </select>

                                    </div>
                                    <span>entries per page</span>
                                </div>
                            </div>
                            <div class="card-tools">
                                <div class="input-group input-group-sm" style="width: 100%;">
                                    <input type="text" wire:model="query" wire:keyup.debounce="filter" name="table_search" class="form-control float-right" placeholder="Search" style="width: calc(100% - 215px); margin-right: 5px;">

                                    <select wire:model="category_id" wire:change="filter" class="form-control" style="width: 200px;">
                                        <option value="">Select Category</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    @livewire('all-documents')

                </div>
            </div>
        </div>

        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        @livewire('upload-ducuments')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
