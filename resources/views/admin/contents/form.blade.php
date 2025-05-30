<div class="card">
    <div class="card-body">
        <form method="POST" action="{{ $action }}" enctype="multipart/form-data" accept-charset="UTF-8">
            @csrf
            @if(isset($content)) @method('PUT') @endif
            
            <div class="row">
                <div class="col-md-8">
                    <div class="mb-3">
                        <label for="title" class="form-label">Title *</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" 
                               id="title" name="title" value="{{ old('title', $content->title ?? '') }}" required>
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label for="description" class="form-label">Description *</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" 
                                  id="description" name="description" rows="5" required>{{ old('description', $content->description ?? '') }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="category_id" class="form-label">Category *</label>
                                <select class="form-select @error('category_id') is-invalid @enderror" 
                                        id="category_id" name="category_id" required>
                                    <option value="">Select Category</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" 
                                            @selected(old('category_id', $content->category_id ?? '') == $category->id)>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="publish_date" class="form-label">Publish Date *</label>
                                <input type="date" class="form-control @error('publish_date') is-invalid @enderror" 
                                       id="publish_date" name="publish_date" 
                                       value="{{ old('publish_date', isset($content) ? $content->publish_date->format('Y-m-d') : '') }}" required>
                                @error('publish_date')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Keywords</label>
                        <div class="d-flex flex-wrap gap-2">
                            @foreach($keywords as $keyword)
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" 
                                           id="keyword-{{ $keyword->id }}" 
                                           name="keywords[]" 
                                           value="{{ $keyword->id }}"
                                           @checked(
                                               (isset($content) && in_array($keyword->id, $content->keywords->pluck('id')->toArray())) 
                                               || in_array($keyword->id, old('keywords', []))
                                           )>
                                    <label class="form-check-label" for="keyword-{{ $keyword->id }}">
                                        <span class="badge bg-{{ $keyword->color }}">
                                            {{ $keyword->name }}
                                        </span>
                                    </label>
                                </div>
                            @endforeach
                        </div>
                        @error('keywords')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                
                <div class="col-md-4">
                    {{-- Main Image --}}
                    <div class="mb-3">
                        <label for="image" class="form-label">Image *</label>
                        <input type="file" class="form-control @error('image') is-invalid @enderror" 
                               id="image" name="image" {{ !isset($content) ? 'required' : '' }}>
                        @error('image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        
                        @if(isset($content) && $content->image)
                            <div class="mt-3">
                                <img src="{{ asset('storage/' . $content->image) }}" 
                                     alt="{{ $content->title }}" 
                                     class="img-thumbnail" style="max-height: 200px;">
                                <p class="small text-muted mt-1">Current image</p>
                            </div>
                        @endif
                    </div>

                    {{-- Optional Image 1 --}}
                    <div class="mb-3">
                        <label for="image_1" class="form-label">Additional Image 1</label>
                        <input type="file" class="form-control @error('image_1') is-invalid @enderror" 
                               id="image_1" name="image_1">
                        @error('image_1')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror

                        @if(isset($content) && $content->image_1)
                            <div class="mt-3">
                                <img src="{{ asset('storage/' . $content->image_1) }}" 
                                     alt="Additional Image 1" 
                                     class="img-thumbnail" style="max-height: 200px;">
                                <p class="small text-muted mt-1">Current additional image 1</p>
                            </div>
                        @endif
                    </div>

                    {{-- Optional Image 2 --}}
                    <div class="mb-3">
                        <label for="image_2" class="form-label">Additional Image 2</label>
                        <input type="file" class="form-control @error('image_2') is-invalid @enderror" 
                               id="image_2" name="image_2">
                        @error('image_2')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror

                        @if(isset($content) && $content->image_2)
                            <div class="mt-3">
                                <img src="{{ asset('storage/' . $content->image_2) }}" 
                                     alt="Additional Image 2" 
                                     class="img-thumbnail" style="max-height: 200px;">
                                <p class="small text-muted mt-1">Current additional image 2</p>
                            </div>
                        @endif
                    </div>

                    {{-- Optional Image 3 --}}
                    <div class="mb-3">
                        <label for="image_3" class="form-label">Additional Image 3</label>
                        <input type="file" class="form-control @error('image_3') is-invalid @enderror" 
                               id="image_3" name="image_3">
                        @error('image_3')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror

                        @if(isset($content) && $content->image_3)
                            <div class="mt-3">
                                <img src="{{ asset('storage/' . $content->image_3) }}" 
                                     alt="Additional Image 3" 
                                     class="img-thumbnail" style="max-height: 200px;">
                                <p class="small text-muted mt-1">Current additional image 3</p>
                            </div>
                        @endif
                    </div>

                </div>
            </div>
            
            <button type="submit" class="btn btn-primary">
                {{ isset($content) ? 'Update' : 'Create' }} Content
            </button>
        </form>
    </div>
</div>
