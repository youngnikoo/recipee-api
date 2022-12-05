@extends('layouts.global')

@section('content')
@include('partials.user-sidebar')

<div class="container-fluid page-body-wrapper">
    <!-- partial:partials/_navbar.html -->
    @include('partials.user-navbar')
    <!-- partial -->
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
                <h3 class="page-title"> Data Recipe </h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">User</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Data Recipe</li>
                    </ol>
                </nav>
            </div>
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Data Recipe</h4>
                </div>
                <div class="card-body">
                    <a href="{{ route('posts.create') }}" class="btn btn-primary mb-2">Create</a>
                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Image</th>
                                            <th>Name</th>
                                            <th>Description</th>
                                            <th>Ingredients</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($posts as $key => $post)
                                        <tr>
                                            <td>{{ $key + $posts->firstItem() }}</td>
                                            <td>
                                                <img src="{{ asset('storage/' . $post->image) }}"
                                                    alt="{{ $post->name }}">
                                            </td>
                                            <td>{{ $post->title }}</td>
                                            <td>{{ $post->description }}</td>
                                            <td>{{ $post->ingredients }}</td>
                                            <td>
                                                <a href="{{ route('posts.edit', $post->id) }}"
                                                    class="btn btn-warning">Edit</a>
                                                <form class="d-inline"
                                                    onsubmit="return confirm('Data will be Deleted, Are you sure?')"
                                                    action="{{ route('posts.destroy', $post->id) }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <input type="submit" class="btn btn-danger" value="Delete">
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            {{ $posts->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- main-panel ends -->
</div>

@endsection