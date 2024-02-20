<!-- resources/views/livewire/edit-user-form.blade.php -->

<div>
    <x-slot name="title">
        User Management - Edit
    </x-slot>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">User Management</a></li>
                        <li class="breadcrumb-item active">Edit User</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                @if (session()->has('success'))
                <script>
                    document.addEventListener('livewire:load', function() {
                        window.livewire.on('showSuccessMessage', function(message) {
                            toastr.success(message);
                        });
                    });
                </script>
            @endif

                    <form wire:submit.prevent="update">
                        <div class="form-group">
                            <label for="name">First Name: </label>
                            <input type="text" wire:model="fname" class="form-control" id="name"
                                placeholder="{{ $user->fname }}">
                        </div>
                        <div class="form-group">
                            <label for="name">Last Name: </label>
                            <input type="text" wire:model="lname" class="form-control" id="name"
                                placeholder="{{ $user->lname }}">
                        </div>
                        <div class="form-group">
                            <label for="email">Email Address: </label>
                            <input type="email" wire:model="email" class="form-control" id="email"
                                placeholder="{{ $user->email }}">
                        </div>
                        <div class="form-group">
                            <label for="email">Department: </label>
                            <input type="text" wire:model="dept" class="form-control" id="dept"
                                placeholder="{{ $user->dept }}">
                        </div>

                        <div class="text-right">
                            <button type="submit" class="btn btn-primary">Update User</button>
                        </div>
                        @livewireScripts
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
