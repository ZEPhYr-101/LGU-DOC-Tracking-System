<!-- resources/views/livewire/edit-user-form.blade.php -->

<div>
    <x-slot name="title">
        Admin - User Management
    </x-slot>

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
    
        <form wire:submit.prevent="update">
            <div class="form-group">
                <label for="name">First Name:  </label>
                <input type="text" wire:model="fname" class="form-control" id="name" placeholder="{{ $user->fname }}">
            </div>
            <div class="form-group">
                <label for="name">Last Name:  </label>
                <input type="text" wire:model="lname" class="form-control" id="name" placeholder="{{ $user->lname }}">
            </div>
            <div class="form-group">
                <label for="email">Email address: </label>
                <input type="email" wire:model="email" class="form-control" id="email" placeholder="{{ $user->email }}">
            </div>
        

        <button type="submit" class="btn btn-primary">Update User</button>
        @livewireScripts
    </form>
</div>
