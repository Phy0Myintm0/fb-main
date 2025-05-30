@extends('admin.layouts.app')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5>Keywords</h5>
        <a href="{{ route('admin.keywords.create') }}" class="btn btn-primary btn-sm">
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
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($keywords as $keyword)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $keyword->name }}</td>
                        <td>
                            <span class="badge bg-{{ $keyword->color }}">
                                {{ $keyword->color }}
                            </span>
                        </td>
                        <td>
                            <a href="{{ route('admin.keywords.edit', $keyword) }}" 
                               class="btn btn-sm btn-outline-primary">
                                <i class="fas fa-edit"></i>
                            </a>
                            <button type="button" 
            class="btn btn-sm btn-outline-danger"
            data-bs-toggle="delete-modal"
            data-form-id="delete-form-{{ $keyword->id }}">
        <i class="fas fa-trash"></i>
    </button>
    
    <!-- Hidden form for actual deletion -->
    <form id="delete-form-{{ $keyword->id }}" 
          action="{{ route('admin.keywords.destroy', $keyword) }}" 
          method="POST" 
          class="d-none">
        @csrf
        @method('DELETE')
    </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="text-center">No keywords found</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        <div class="mt-3">
            {{ $keywords->links() }}
        </div>
    </div>
</div>
@endsection