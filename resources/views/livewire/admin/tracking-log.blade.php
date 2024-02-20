<div>
    <x-slot name="title">
        Admin - Tracking Log
    </x-slot>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Tracking-Log</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.admin-dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Tracking-Log</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="card card-warning">
        <div class="card-header">
            <h3 class="card-title">Track Documents</h3>
        </div>
        <div class="card-body">
            <form>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Upload Document</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input"
                                        id="exampleInputFile2">
                                    <label class="custom-file-label" for="exampleInputFile2">Choose
                                        file</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Document Name</label>
                            <input type="text" class="form-control" placeholder="Enter ..."
                                id="documentName2">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Category</label>
                            <input type="text" class="form-control" placeholder="Enter ..."
                                id="category2">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Description</label>
                            <textarea class="form-control" rows="3" placeholder="Enter ..." id="description2"></textarea>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Department</label>
                            <input type="text" class="form-control" placeholder="Enter ..."
                                id="department2">
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</div>
