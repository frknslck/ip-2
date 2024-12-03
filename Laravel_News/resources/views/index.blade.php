@extends('layout')

@section('content')
    <div class="row mb-2">
        @foreach($news as $nws)
            <div class="col-md-6">
                <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                    <div class="col p-4 d-flex flex-column position-static">
                        <strong class="d-inline-block mb-2 text-primary-emphasis">World</strong>
                        <h3 class="mb-0">{{ \Illuminate\Support\Str::limit($nws->title, 45) }}</h3>
                        <div class="mb-1 text-body-secondary">{{ $nws->created_at->format('d.m.Y H:i') }}</div>
                        <p class="card-text mb-auto">{{ \Illuminate\Support\Str::limit($nws->description, 120) }}</p>
                        <a href="/news/{{ $nws->id }}" class="icon-link gap-1 icon-link-hover stretched-link">
                            Devamı...
                            <svg class="bi"><use xlink:href="#chevron-right"/></svg>
                        </a>
                    </div>
                    <div class="col-auto d-none d-lg-block">
                        <img class="bd-placeholder-img" width="200" height="250" src="{{ $nws->image }}" alt="" />
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
