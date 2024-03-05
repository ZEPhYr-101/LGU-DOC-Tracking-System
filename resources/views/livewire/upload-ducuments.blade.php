<form wire:submit.prevent="create">
    <div class="form-group">
        <label for="documentName">Document Name</label>
        <input type="text" class="form-control" id="documentName" wire:model.defer="documentName">
        @error('documentName')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        <label for="category">Category</label>
        <select class="form-control" id="category" wire:model.defer="category">
            <option value="">Select Category</option>
            @if ($categories)
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                @endforeach
            @endif
        </select>
        @error('category')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <textarea class="form-control" id="description" rows="2" wire:model.defer="description"></textarea>
        @error('description')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        <label for="document">Document</label>
        <div class="custom-file">
            <input type="file" name="document" id="document" wire:model.defer="document"
                accept="image/*, .doc, .docx, .pdf, .txt, application/msword, application/vnd.openxmlformats-officedocument.wordprocessingml.document, application/pdf, text/plain">

        </div>
        @error('document')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
