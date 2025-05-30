@extends('admin.layouts.app')

@section('content')
<form action="{{ route('admin.hero-paragraph.update') }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label class="form-label">Hero Section Paragraph</label>
        <textarea name="paragraph" class="form-control" rows="5">{{ $paragraph?->paragraph }}</textarea>
    </div>

    <button type="submit" class="btn btn-primary">Save Paragraph</button>
</form>
@endsection