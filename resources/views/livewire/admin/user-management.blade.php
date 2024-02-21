<div>
    <x-slot name="title">
        Admin - User Management
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
                    <h3>Document {{ $totalUser }} </h3>
                </div>
            </div>
        </div>
        <div class="card">


            <div class="row">
                <div class="col-12">
                    <div class="card-body table-responsive p-0">
                        <table class="table table-striped text-nowrap">
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Department</th>
                                    <th>Status</th>
                                    <th style="width: 40px">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($users as $user)
                                    <tr>
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->fname . ' ' . $user->lname }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->dept }}</td>
                                        <td>
                                            @if ($user->is_Accepted == 1)
                                                <span class="badge bg-success">Approved</span>
                                            @else
                                                <span class="badge bg-danger">Not Approved</span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="btn-group">
                                                @if ($user->is_Accepted == 1)
                                                    <button disabled class="btn btn-sm btn-success">Approved</button>
                                                @else
                                                    <button wire:click='approve({{ $user->id }})'
                                                        class="btn btn-sm btn-success">Approve</button>
                                                @endif
                                                <button wire:click='delete({{ $user->id }})'
                                                    class="btn btn-sm btn-danger">Delete</button>
                                                <button wire:click='editUserForm({{ $user->id }})' type="button"
                                                    class="btn btn-sm btn-warning">
                                                    <i class="fas fa-edit"></i> Edit
                                                </button>
                                                <button wire:click='changePassword({{ $user->id }})' type="button"
                                                    class="btn btn-sm btn-primary">
                                                    <i class="fas fa-edit"></i> Change Password
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center">No users found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>

                    </div>
                    <div class="card-footer clearfix">
                        <ul class="pagination pagination-sm m-0 float-right">
                            {{ $users->links('custom-pagination-links-view') }}
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
