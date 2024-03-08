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
                        <td>{{ $document->user_id }}</td> <!-- Assuming a user() relationship exists -->
                        <td>{{ $document->documentName }}</td>
                        <td>{{ $document->category->category_name ?? 'N/A' }}</td>
                        <!-- Assuming a category() relationship exists and is eager loaded -->
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

        {{ $documents->links('custom-pagination-links-view') }}

    </div>
</div>
