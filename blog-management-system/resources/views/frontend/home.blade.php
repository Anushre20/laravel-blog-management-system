@extends('layouts.app')

@section('content')

<nav class="navbar navbar-expand-lg navbar-custom">

    <div class="container">

        <a class="navbar-brand" href="/">
            BlogSphere
        </a>

        <div>
            <a class="nav-link d-inline-block"
               href="/admin/blogs">
               Admin
            </a>
        </div>

    </div>

</nav>

<div class="container mt-5">

    <div class="hero-section text-center">

        <h1>Discover Modern Stories & Insights</h1>

        <p class="mt-3">
            Explore blogs with dynamic AJAX filtering.
        </p>

    </div>

    <div class="filter-box">

        <div class="row">

            <div class="col-md-6 mb-3">

                <input type="text"
                       id="search"
                       class="form-control"
                       placeholder="Search blogs...">

            </div>

            <div class="col-md-6 mb-3">

                <select id="category"
                        class="form-control">

                    <option value="">
                        All Categories
                    </option>

                    @foreach($categories as $category)

                    <option value="{{ $category }}">
                        {{ $category }}
                    </option>

                    @endforeach

                </select>

            </div>

        </div>

    </div>

    <div class="row" id="blog-container">

        @include('frontend.filtered_blogs')

    </div>

</div>

<div class="footer text-center">

    <div class="container">

        <h4>BlogSphere</h4>

        <p class="mt-3">
            Laravel Blog Management System
        </p>

    </div>

</div>

@endsection

<script>

window.onload = function () {

    $('#search, #category').on('keyup change', function () {

        let search = $('#search').val();

        let category = $('#category').val();

        $.ajax({

            url: "{{ route('blogs.filter') }}",

            type: "GET",

            data: {
                search: search,
                category: category
            },

            beforeSend: function () {

                $('#blog-container').html(`
                    <div class="text-center mt-5">
                        <h4>Loading blogs...</h4>
                    </div>
                `);

            },

            success: function (response) {

                $('#blog-container').html(response);

            }

        });

    });

};

</script>