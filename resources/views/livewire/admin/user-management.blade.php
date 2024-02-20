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
                        <li class="breadcrumb-item"><a href="{{route('admin.admin-dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">User Management</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
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
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Total User: <span style="font-weight:bold">{{ $totalUser }}</span></h3>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover table-sm table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Department</th>
                                    <th>Status</th>
                                    <th>Actions</th>
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
                                                    class="btn btn-warning">
                                                    <i class="fas fa-edit"></i>
                                                    Edit
                                                </button>
                                            </div>
                                        </td>
                                    </tr>

                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center">No users found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- /.card-body -->
                <div class="card-footer clearfix">
                    <ul class="pagination pagination-sm m-0 float-right">
                        {{ $users->links('custom-pagination-links-view') }}
                    </ul>
                </div>
            </div>
            <!-- /.card -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
