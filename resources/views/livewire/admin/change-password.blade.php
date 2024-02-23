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
                        <li class="breadcrumb-item"><a href="{{route('userManagement')}}">User Management</a></li>
                        <li class="breadcrumb-item active">Change Password</li>
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
            @if (session()->has('error'))
            <script>
                document.addEventListener('livewire:load', function() {
                    window.livewire.on('showErrorMessage', function(message) {
                        toastr.error(message);
                    });
                });
            </script>
        @endif
                    <form wire:submit.prevent="update">
                        <div class="form-group">
                            <label for="name">Password: </label>
                            <input wire:model="password" class="form-control" id="password" type="password"
                                placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="name">Confirm Password: </label>
                            <input wire:model="c_password" class="form-control" type="password"
                                placeholder="">
                        </div>
                        
                        <div class="text-right">
                            <button type="submit" class="btn btn-primary">Update Password</button>
                        </div>
                        @livewireScripts
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
