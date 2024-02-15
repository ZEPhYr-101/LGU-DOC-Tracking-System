<div>
<div>
    <x-slot name="title">Admin - Login</x-slot>
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
<div style="background-image: url('{{ asset('images/municipyo.jpg') }}'); background-color: rgba(255, 255, 255, 0.8); background-blend-mode: lighten; display: flex; justify-content: center; align-items: center; height: 100vh;">

    <div class="container" style="display: flex; justify-content: center; align-items: center; height: 100vh;">
    <div class="card shadow-lg border-0 rounded-lg mt-5">
        <div class="row justify-content-center">
        <div class="col" style="flex: 1; max-width: 75%; display: flex; justify-content: center; align-items: center;">
            <img src="{{ asset('images/Green Mint globalnet technology Logo (1).png') }}" alt="Doc Track img" style="max-width: 150%; max-height: 150%; " width="600" height="550" />
        </div>
        
        <div class="col" style="flex: 1; max-width: 50%;margin: 0 auto;">
                
                    <div class="card-header" style="background-color: white;">
                        <h2 class="text-center font-weight-light my-4">Admin Login</h2>
                    </div>
                    <div class="card-body">
                        @if (session()->has('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        @if (session()->has('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ session('error') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        <form wire:submit.prevent='login'>
                            <div class="form-group">
                                <label class="small mb-1">Username</label>
                                <input class="form-control py-4" wire:model='username' id='username' type="text"
                                    placeholder="Enter username" />
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="small mb-1">Password</label>
                                <input class="form-control py-4" wire:model='password' type="password"
                                    placeholder="Enter password" />
                                @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group d-flex align-items-center justify-content-center mt-4 mb-0">
                                <button class="btn btn-primary" type="submit">
                                <span wire:loading.remove wire:target='login'>Login</span>
                                    <span wire:loading wire:target='login'>Login....</span>
                                </button>
                                
                            </div>
                        </form>
                    </div>
                   
                </div>
            </div>
        </div>
    </div>
    </div>
</div> 
</div>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <script src="{{ asset('js/scripts.js') }}"></script>
    <script src="{{ asset('js/all.min.js') }}"></script>
</div>
