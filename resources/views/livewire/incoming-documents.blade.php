<!-- In resources/views/livewire/incoming-documents.blade.php -->
<x-slot name="title">
        Incoming Documents
    </x-slot>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>File</th>
            <th>Remarks</th>
            <th>Committed By</th>
            <th>Date</th>
        </tr>
    </thead>
    <tbody>
        @foreach($incomingDocuments as $document)
            <tr>
                <td>{{ $document->commit_id }}</td>
                <td>{{ $document->upload_file }}</td>
                <td>{{ $document->commit_remarks }}</td>
                <td>{{ $document->uploadedBy->name }}</td> <!-- assuming 'uploadedBy' has a 'name' attribute -->
                <td>{{ $document->date->toFormattedDateString() }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
