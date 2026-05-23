@extends('layouts.app')

@section('content')

<div class="container mt-5">

    <h2>Edit Blog</h2>

    <form action="{{ route('admin.blogs.update', $blog->id) }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Title</label>
            <input type="text"
                   name="title"
                   class="form-control"
                   value="{{ $blog->title }}">
        </div>

        <div class="mb-3">
            <label>Category</label>
            <input type="text"
                   name="category"
                   class="form-control"
                   value="{{ $blog->category }}">
        </div>

        <div class="mb-3">
            <label>Short Description</label>
            <textarea name="short_description"
                      class="form-control">{{ $blog->short_description }}</textarea>
        </div>

        <div class="mb-3">
            <label>Content</label>
            <textarea name="content"
                      class="form-control">{{ $blog->content }}</textarea>
        </div>

        <button class="btn btn-primary">
            Update Blog
        </button>

    </form>

</div>

@endsection