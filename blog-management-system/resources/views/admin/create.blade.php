@extends('layouts.app')

@section('content')

<div class="container mt-5">

    <h2 class="mb-4">Add Blog</h2>

    <form action="{{ route('admin.blogs.store') }}" method="POST" enctype="multipart/form-data">

        @csrf

        <div class="mb-3">
            <label>Title</label>
            <input type="text" name="title" class="form-control">
        </div>

        <div class="mb-3">
            <label>Category</label>
            <input type="text" name="category" class="form-control">
        </div>

        <div class="mb-3">
            <label>Image</label>
            <input type="file" name="image" class="form-control">
        </div>
        <div class="mb-3">
            <label>Short Description</label>
            <textarea name="short_description" class="form-control"></textarea>
        </div>

        <div class="mb-3">
            <label>Content</label>
            <textarea name="content" class="form-control"></textarea>
        </div>

        <div class="mb-3">
            <label>Published Date</label>
            <input type="date" name="published_date" class="form-control">
        </div>

        <button class="btn btn-success">
            Save Blog
        </button>

    </form>

</div>

@endsection