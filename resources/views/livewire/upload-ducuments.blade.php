<div>
    <form wire:submit.prevent="create">
        <div class="form-group">
            <label for="documentName">Document Name</label>
            <input type="text" class="form-control" id="documentName" wire:model.defer="documentName">
            @error('documentName') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="form-group">
            <label for="category">Category</label>
            <input type="text" class="form-control" id="category" wire:model.defer="category">
            @error('category') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" rows="3" wire:model.defer="description"></textarea>
            @error('description') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="form-group">
            <label for="document">Document</label>
            <input type="file" class="form-control-file" id="document" wire:model.defer="document">
            @error('document') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
