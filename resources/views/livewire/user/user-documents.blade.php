<div>
    <x-slot name="title">
        User | Documents
    </x-slot>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Documents</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('user.dashboard')}}">Home</a></li>
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
                    <h3>TOTAL DOCUMENTS: {{ $totalDocument }}</h3>
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
                                <div style="display: flex; align-items: center; gap: 10px;">
                                    <div class="input-group input-group-sm" style="width: 100px;">
                                        <select wire:model="perPage" wire:change="filter" class="form-control">
                                            <option value="10">10</option>
                                            <option value="20">20</option>
                                            <option value="50">50</option>
                                            <option value="100">100</option>
                                        </select>
                                    </div>
                                    <span style="white-space: nowrap;">entries per page</span>
                                    <input type="text" wire:model="query" wire:keyup.debounce="filter" name="table_search" class="form-control" placeholder="Search" style="flex-grow: 1;">
                                </div>
                            </div>
                            <div class="card-tools">
                                <div style="display: flex; gap: 10px; align-items: center;">
                                    <select wire:model="selectedYear" wire:change="filter" class="form-control" style="width: auto; flex-grow: 1;">
                                        <option value="">Select Year</option>
                                        @for ($year = date('Y'); $year >= 1900; $year--)
                                            <option value="{{ $year }}">{{ $year }}</option>
                                        @endfor
                                    </select>
                                    <select wire:model="selectedMonth" wire:change="filter" class="form-control" style="width: auto; flex-grow: 1;">
                                        <option value="">Select Month</option>
                                        <option value="1">January</option>
                                        <option value="2">February</option>
                                        <option value="3">March</option>
                                        <option value="4">April</option>
                                        <option value="5">May</option>
                                        <option value="6">June</option>
                                        <option value="7">July</option>
                                        <option value="8">August</option>
                                        <option value="9">September</option>
                                        <option value="10">October</option>
                                        <option value="11">November</option>
                                        <option value="12">December</option>
                                    </select>
                                    <select wire:model="category_id" wire:change="filter" class="form-control" style="width: auto; flex-grow: 1;">
                                        <option value="">Select Category</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    @livewire('user.all-user-documents')
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
                        @livewire('user.user-upload-documents')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
