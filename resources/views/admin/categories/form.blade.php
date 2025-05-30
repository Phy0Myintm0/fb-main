<div class="card">
    <div class="card-body">
        <form method="POST" action="{{ $action }}">
            @csrf
            @if(isset($category)) @method('PUT') @endif
            
            <div class="mb-3">
                <label for="name" class="form-label">Category Name *</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" 
                       id="name" name="name" value="{{ old('name', $category->name ?? '') }}" required>
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="mb-3">
                <label class="form-label">Color *</label>
                <div class="d-flex flex-wrap gap-2">
                    @foreach(['primary', 'secondary', 'success', 'danger', 'warning', 'info', 'dark'] as $color)
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="color" 
                               id="color-{{ $color }}" value="{{ $color }}"
                               @checked(old('color', $category->color ?? 'primary') === $color)>
                        <label class="form-check-label" for="color-{{ $color }}">
                            <span class="badge bg-{{ $color }}">{{ ucfirst($color) }}</span>
                        </label>
                    </div>
                    @endforeach
                </div>
                @error('color')
                    <div class="text-danger small">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" 
                          rows="3">{{ old('description', $category->description ?? '') }}</textarea>
            </div>
            
            <button type="submit" class="btn btn-primary">
                {{ isset($category) ? 'Update' : 'Create' }} Category
            </button>
        </form>
    </div>
</div>