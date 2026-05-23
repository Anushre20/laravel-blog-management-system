@extends('layouts.app')

@section('content')

<div class="container mt-5">

    <div class="admin-header">

        <h2>Admin Dashboard</h2>

        <p>
            Manage all blogs here
        </p>

    </div>

    <div class="admin-card">

    <div class="d-flex justify-content-between mb-4">
        <h2>All Blogs</h2>

        <a href="{{ route('admin.blogs.create') }}" class="btn btn-primary">
            Add Blog
        </a>
    </div>

    <table class="table table-bordered">

        <thead>
            <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Title</th>
                <th>Category</th>
                <th>Date</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>

            @foreach($blogs as $blog)

            <tr>
<td>{{ $blog->id }}</td>

<td>
    @if($blog->image)
        <img src="{{ asset('uploads/' . $blog->image) }}"
             width="80">
    @endif
</td>

<td>{{ $blog->title }}</td>

<td>{{ $blog->category }}</td>

<td>{{ $blog->published_date }}</td>

<td>
    <a href="{{ route('admin.blogs.edit', $blog->id) }}"
       class="btn btn-warning btn-sm">
       Edit
    </a>

    <form action="{{ route('admin.blogs.destroy', $blog->id) }}"
          method="POST"
          style="display:inline-block;">

        @csrf
        @method('DELETE')

        <button class="btn btn-danger btn-sm">
            Delete
        </button>
    </form>
</td>
            </tr>

            @endforeach

        </tbody>

</table>

    </div>

</div>

@endsection