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
                <h3 class="page-title"> Add New Recipe </h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Admin</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Add New Recipe</li>
                    </ol>
                </nav>
            </div>
            <div class="content-wrapper full-page-wrapper align-items-center">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Add New Recipe</h4>
                        <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control p_input @error('title') is-invalid @enderror"
                                    name="title" value="{{ old('title') }}" required>
                                @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea name="description"
                                    class="form-control p_input @error('description') is-invalid @enderror" cols="30"
                                    rows="10">
                                    {{ old('description')}}
                                </textarea>
                                @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Ingredients</label>
                                <input type="number" class="form-control p_input @error('ingredient') is-invalid @enderror"
                                    name="ingredient" value="{{ old('ingredient') }}" required>
                                @error('ingredients')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Directions</label>
                                <input type="number" class="form-control p_input @error('direction') is-invalid @enderror"
                                    name="direction" value="{{ old('direction') }}" required>
                                @error('direction')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>File input</label>
                                <input type="file" class="form-control-file @error('image') is-invalid @enderror"
                                    name="image">
                                @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                <small id="fileHelp" class="form-text text-muted">Max size 2 MB</small>
                            </div>
                            <div class="text-left">
                                <button type="submit" class="btn btn-primary">submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
    </div>
    <!-- main-panel ends -->
</div>
@endsection