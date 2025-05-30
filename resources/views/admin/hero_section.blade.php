@extends('admin.layouts.app')

@section('content')
<form action="{{ route('admin.hero-section.update') }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label class="form-label">Main Title (h1)</label>
        <input type="text" name="title" class="form-control" value="{{ $hero?->title }}">
    </div>

    <div class="mb-3">
        <label class="form-label">Paragraph (p)</label>
        <textarea name="content" class="form-control" rows="5">{{ $hero?->content }}</textarea>
    </div>

    <button type="submit" class="btn btn-primary">Save Content</button>
</form>
@endsection