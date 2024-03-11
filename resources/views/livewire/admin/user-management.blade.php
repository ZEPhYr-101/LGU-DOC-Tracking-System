<div>
    <x-slot name="title">
        Admin | User Management
    </x-slot>

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">User Management</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.admin-dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">User Management</li>
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
                    <h3>TOTAL USERS: {{ $totalUser }} </h3>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="row">
                <div class="col-12">
                    <div class="card-header">
                        <div class="row justify-content-between align-items-center">
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
                                    <input type="text" wire:model="query" wire:keyup.debounce="filter" name="table_search" class="form-control" placeholder="Search..." style="flex-grow: 1;">
                                </div>
                            </div>
                        </div>
                    </div>
                    @livewire('all-user')
                </div>
            </div>
        </div>
    </div>
</div>
