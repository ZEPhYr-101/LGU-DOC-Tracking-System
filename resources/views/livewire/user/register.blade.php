<div style="background-color: white;">
    <x-slot name="title">User - Register</x-slot>
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
    @livewireStyles

    <div style="background-image: url('{{ asset('images/municipyo.jpg') }}'); background-color: rgba(255, 255, 255, 0.8); background-blend-mode: lighten; display: flex; justify-content: center; align-items: center; height: 100vh;">

    <div class="container" style="display: flex; justify-content: center; align-items: center; height: 100vh;">
    <div class="card shadow-lg border-0 rounded-lg mt-5">
        <div class="row justify-content-center">
        <div class="col" style="flex: 1; max-width: 75%; display: flex; justify-content: center; align-items: center;">
            <img src="{{ asset('images/Green Mint globalnet technology Logo (1).png') }}" alt="Doc Track img" style="max-width: 150%; max-height: 150%; " width="470" height="460" />
        </div>
            <div class="col" style="flex: 1; max-width: 50%;">
                
                    <div class="card-header" style="background-color: white;">
                        <h3 class="text-center font-weight-light my-4">Create Account</h3>
                    </div>
                    <div class="card-body">
                        <form wire:submit.prevent='create'>
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="small mb-1" for="">First
                                            Name</label>
                                        <input class="form-control py-4" wire:model='fname' type="text"
                                            placeholder="Enter first name" />
                                        @error('fname')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="small mb-1">Last Name</label>
                                        <input class="form-control py-4" wire:model='lname' type="text"
                                            placeholder="Enter last name" />
                                        @error('lname')
                                            <span class="text-danger">{{ $lname }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="small mb-1">Email</label>
                                <input class="form-control py-4" wire:model='email' type="email"
                                    aria-describedby="emailHelp" placeholder="Enter email address" />
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="small mb-1">Password</label>
                                        <input class="form-control py-4" wire:model='password' type="password"
                                            placeholder="Enter password" />
                                        @error('password')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="small mb-1">Confirm Password</label>
                                        <input class="form-control py-4" wire:model='password' type="password"
                                            placeholder="Enter password" />
                                        @error('password')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                            <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="small mb-1">Department</label>
                                        <input class="form-control py-4" wire:model='lname' type="text"
                                            placeholder="Enter Department" />
                                        @error('lname')
                                            <span class="text-danger">{{ $lname }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mt-4 mb-0"><button class="btn btn-primary btn-block"
                                    type="submit">Create Account</button></div>
                        </form>
                    </div>
                    <div class="card-footer text-center">
                        <div class="small"><a >Have an account? Go to
                                login</a>
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
    @livewireScripts

   
