<div>
    <x-slot name="title">
        Admin | Documents
    </x-slot>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Documents</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.admin-dashboard') }}">Home</a></li>
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
                    <h3>TOTAL DOCUMENTS: </h3>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                        Upload Documents
                    </button>
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
                                    <th>#</th>
                                    <th>User</th>
                                    <th>Document Name</th>
                                    <th>Category</th>
                                    <th>Description</th>
                                    <th>Tracking No.</th>
                                    <th>Download</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($documents as $document)
                                    <tr>
                                        @php
                                            $admin = $admins->where('user_id_no', $document->user_id)->first();
                                        @endphp
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ optional($admin)->username }}</td>
                                        <td>{{ $document->documentName }}</td>
                                        <td>
                                            @foreach ($categories as $category)
                                                @if ($category->id == $document->category)
                                                    {{ $category->category_name }}
                                                @endif
                                            @endforeach
                                        </td>

                                        <td>{{ $document->description }}</td>
                                        <td>{{ $document->doc_tracking_code }}</td>
                                        <td><a href="{{ Storage::url($document->document) }}"
                                                target="_blank">Download</a></td>
                                    </tr>

                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center">No documents found.</td>
                                    </tr>
                                @endforelse
                            </tbody>

                        </table>
                    </div>
                    <div class="card-footer clearfix">
                        <ul class="pagination pagination-sm m-0 float-right">
                        </ul>
                    </div>
                </div>
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
                    @livewire('upload-ducuments')
                </div>
            </div>
        </div>
    </div>
