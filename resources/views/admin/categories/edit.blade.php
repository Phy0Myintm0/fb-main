@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="d-flex justify-content-between mb-4">
                <h1 class="h3">Edit Category: {{ $category->name }}</h1>
                <a href="{{ route('admin.categories.index') }}" class="btn btn-primary">
                    <i class="fas fa-arrow-left"></i> Back to List
                </a>
            </div>
            
            @include('admin.categories.form', [
                'action' => route('admin.categories.update', $category),
                'category' => $category,
                'method' => 'PUT'
            ])
        </div>
    </div>
</div>
@endsection