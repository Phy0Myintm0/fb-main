@foreach($contents as $content)
<div class="col-md-6 mb-4">
    <div class="card content-card h-100">
        <img src="{{ asset('storage/'.$content->image) }}" class="card-img-top" alt="{{ $content->title }}">
        <div class="card-body d-flex flex-column">
            <h5 class="card-title">{{ $content->title }}</h5>
            <p class="card-text">{{ $content->description_preview }}</p>
            
            @if($content->keywords->count())
            <div class="mt-auto mb-2">
                <div class="keyword-container">
                    @foreach($content->keywords as $keyword)
                    <span class="badge keyword-badge bg-{{ $keyword->color }}">
                        {{ $keyword->name }}
                    </span>
                    @endforeach
                </div>
            </div>
            @endif
            
            <div class="d-flex justify-content-between align-items-center mt-auto">
                <span class="publish-date">
                    <i class="far fa-calendar-alt me-1"></i> 
                    {{ $content->formatted_publish_date }}
                </span>
            </div>
        </div>
    </div>
</div>
@endforeach

@if($contents->hasPages())
<div class="col-12">
    {{ $contents->links() }}
</div>
@endif