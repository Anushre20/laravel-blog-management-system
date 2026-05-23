@extends('layouts.app')

@section('content')

<div class="container mt-5">

    <div class="card shadow-sm">

        @if($blog->image)

        <img src="{{ asset('uploads/' . $blog->image) }}"
             class="card-img-top"
             style="height:400px; object-fit:cover;">

        @endif

        <div class="card-body">

            <h1 class="mb-3">
                {{ $blog->title }}
            </h1>

            <p class="text-muted">
                Category: {{ $blog->category }}
            </p>

            <p class="text-muted">
                Published:
                {{ $blog->published_date }}
            </p>

            <hr>

            <p>
                {{ $blog->content }}
            </p>

        </div>

    </div>

</div>

@endsection