@extends('../layout')

@section('content')
    <div class="row g-5">
        <div class="col-md-12">
            <article class="blog-post">
                <h2 class="display-5 link-body-emphasis mb-1">{{ $news->title }}</h2>
                <p class="blog-post-meta">{{ $news->created_at }}</p>

                <p>{{ $news->description }}</p>
                <p><img src="{{ $news->image }}" alt="" /></p>
                <p>{{ $news->content }}</p>
            </article>
        </div>
    </div>
@endsection
