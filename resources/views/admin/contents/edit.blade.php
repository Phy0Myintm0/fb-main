@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="d-flex justify-content-between mb-4">
                <h1 class="h3">Edit Content: {{ $content->title }}</h1>
                <a href="{{ route('admin.contents.index') }}" class="btn btn-primary">
                    <i class="fas fa-arrow-left"></i> Back to List
                </a>
            </div>
            
            @include('admin.contents.form', [
                'action' => route('admin.contents.update', $content),
                'content' => $content,
                'categories' => $categories,
                'keywords' => $keywords,
                'method' => 'PUT'
            ])
        </div>
    </div>
</div>
@endsection