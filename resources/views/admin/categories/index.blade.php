@extends('admin.layouts.app')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5>Categories</h5>
        <a href="{{ route('admin.categories.create') }}" class="btn btn-primary btn-sm">
            <i class="fas fa-plus"></i> Add New
        </a>
    </div>
    <div class="card-body">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        
        <div class="table-responsive">
            <table class="table table-hover">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Color</th>
                        <th>Description</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($categories as $category)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $category->name }}</td>
                        <td>
                            <span class="badge bg-{{ $category->color }}">
                                {{ $category->color }}
                            </span>
                        </td>
                        <td>{{ Str::limit($category->description, 50) }}</td>
                        <td>
                            <a href="{{ route('admin.categories.edit', $category) }}" 
                               class="btn btn-sm btn-outline-primary">
                                <i class="fas fa-edit"></i>
                            </a>
                            <button type="button" 
            class="btn btn-sm btn-outline-danger"
            data-bs-toggle="delete-modal"
            data-form-id="delete-form-{{ $category->id }}">
        <i class="fas fa-trash"></i>
    </button>
    
    <!-- Hidden form for actual deletion -->
    <form id="delete-form-{{ $category->id }}" 
          action="{{ route('admin.categories.destroy', $category) }}" 
          method="POST" 
          class="d-none">
        @csrf
        @method('DELETE')
    </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center">No categories found</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        <div class="mt-3">
            {{ $categories->links() }}
        </div>
    </div>
</div>
@endsection