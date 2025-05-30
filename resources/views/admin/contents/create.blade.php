@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="d-flex justify-content-between mb-4">
                <h1 class="h3">Add New Content</h1>
                <a href="{{ route('admin.contents.index') }}" class="btn btn-primary">
                    <i class="fas fa-arrow-left"></i> Back to List
                </a>
            </div>
            
            @include('admin.contents.form', [
                'action' => route('admin.contents.store'),
                'content' => null,
                'categories' => $categories,
                'keywords' => $keywords
            ])
        </div>
    </div>
</div>
@endsection