@extends('admin.layouts.app')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5>Contents</h5>
        <a href="{{ route('admin.contents.create') }}" class="btn btn-primary btn-sm">
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
                        <th>Image</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Keywords</th>
                        <th>Publish Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($contents as $content)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            <img src="{{ asset('storage/'.$content->image) }}" 
                                 alt="{{ $content->title }}" 
                                 style="width: 60px; height: 40px; object-fit: cover;">
                        </td>
                        <td>{{ $content->title }}</td>
                        <td>
                            <span class="badge bg-{{ $content->category->color }}">
                                {{ $content->category->name }}
                            </span>
                        </td>
                        <td>
                            @foreach($content->keywords as $keyword)
                                <span class="badge bg-{{ $keyword->color }} mb-1">
                                    {{ $keyword->name }}
                                </span>
                            @endforeach
                        </td>
                        <td>{{ $content->publish_date ? $content->publish_date->format('M d, Y') : 'Not set' }}</td>                        <td>
                            <a href="{{ route('admin.contents.edit', $content) }}" 
                               class="btn btn-sm btn-outline-primary">
                                <i class="fas fa-edit"></i>
                            </a>
                            <button type="button" 
                                    class="btn btn-sm btn-outline-danger"
                                    data-bs-toggle="delete-modal"
                                    data-form-id="delete-form-{{ $content->id }}">
                                <i class="fas fa-trash"></i>
                            </button>
                            <form id="delete-form-{{ $content->id }}" 
                                  action="{{ route('admin.contents.destroy', $content) }}" 
                                  method="POST" 
                                  class="d-none">
                                @csrf
                                @method('DELETE')
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center">No contents found</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        <div class="mt-3">
            {{ $contents->links() }}
        </div>
    </div>
</div>
@endsection