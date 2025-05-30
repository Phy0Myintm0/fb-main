<div class="card">
    <div class="card-body">
        <form method="POST" action="{{ $action }}">
            @csrf
            @if(isset($keyword)) @method('PUT') @endif
            
            <div class="mb-3">
                <label for="name" class="form-label">Keyword Name *</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" 
                       id="name" name="name" value="{{ old('name', $keyword->name ?? '') }}" required>
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
                               @checked(old('color', $keyword->color ?? 'primary') === $color)>
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
            
            <button type="submit" class="btn btn-primary">
                {{ isset($keyword) ? 'Update' : 'Create' }} Keyword
            </button>
        </form>
    </div>
</div>