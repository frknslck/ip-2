@extends('../layout')

@section('content')
    <div class="p-4 p-md-5 mb-4 rounded text-body-emphasis bg-body-secondary">
        <div class="col-lg-6 px-0">
            <h1 class="display-4 fst-italic">{{ $category?->name }}</h1>
        </div>
    </div>

    <div class="row mb-2">

        @foreach($category?->news as $news)
        <div class="col-md-6">
            <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                <div class="col p-4 d-flex flex-column position-static">
                    <h3 class="mb-0">{{ \Illuminate\Support\Str::limit($news->title, 45) }}</h3>
                    <div class="mb-1 text-body-secondary">{{ $news->created_at->format('d.m.Y H:i') }}</div>
                    <p class="card-text mb-auto">{{ \Illuminate\Support\Str::limit($news->description, 120) }}</p>
                    <a href="/news/{{ $news->id }}" class="icon-link gap-1 icon-link-hover stretched-link">
                        Devamı...
                        <svg class="bi"><use xlink:href="#chevron-right"/></svg>
                    </a>
                </div>
                <div class="col-auto d-none d-lg-block">
                    <img class="bd-placeholder-img" width="200" height="250" src="{{ $news->image }}" alt="" />
                </div>
            </div>
        </div>
        @endforeach
    </div>
@endsection
