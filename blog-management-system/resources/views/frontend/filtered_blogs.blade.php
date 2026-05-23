@if($blogs->count() > 0)

@foreach($blogs as $blog)

<div class="col-md-4 mb-4">

    <div class="card blog-card h-100">

        @if($blog->image)

        <img src="{{ asset('uploads/' . $blog->image) }}"
             class="card-img-top">

        @endif

        <div class="card-body d-flex flex-column">

            <span class="blog-category">
                {{ $blog->category }}
            </span>

            <h4>{{ $blog->title }}</h4>

            <p>
                {{ $blog->short_description }}
            </p>

            <a href="{{ route('blogs.show', $blog->id) }}"
               class="btn btn-dark read-btn mt-auto">

               Read More

            </a>

        </div>

    </div>

</div>

@endforeach

@else

<div class="col-12">

    <div class="alert alert-warning text-center">

        No blogs found.

    </div>

</div>

@endif