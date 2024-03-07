<div>
    <div class="card-body table-responsive p-0">
        <table class="table table-head-fixed table-striped text-nowrap">
            <thead>
                <tr>
                    <th>#</th>
                    <th>User</th>
                    <th>Document Name</th>
                    <th>Category</th>
                    <th>Description</th>
                    <th>Document No.</th>
                    <th>Download</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($documents as $document)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $document->user_id}}</td>
                        <td>{{ $document->documentName }}</td>
                        <td>
                            @if ($document->category && $categories)
                                @foreach ($categories as $category)
                                    @if ($category->id == $document->category_id)
                                        {{ $category->category_name }}
                                    @endif
                                @endforeach
                            @endif
                        </td>
                        <td>{{ $document->description }}</td>
                        <td>{{ $document->doc_tracking_code }}</td>
                        <td><a href="{{ Storage::url($document->document) }}" target="_blank">Download</a></td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center">No documents found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="card-footer clearfix">
        <ul class="pagination pagination-sm m-0 float-right">
            {{$documents->links('custom-pagination-links-view') }}
        </ul>
    </div>
</div>


