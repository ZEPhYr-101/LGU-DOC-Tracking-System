<div>
    <div class="card-body table-responsive p-0">
        <table class="table table-striped text-nowrap">
            <thead>
                <tr>
                    <th style="width: 10px">#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>ID No.</th>
                    <th>Office</th>
                    <th>Status</th>
                    <th style="width: 40px">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $user)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $user->fname . ' ' . $user->lname }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->user_id_no }}</td>
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

        {{ $users->links('custom-pagination-links-view') }}

    </div>
</div>
