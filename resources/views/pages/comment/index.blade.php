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
                <h3 class="page-title"> Data Comment </h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">User</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Data Comment</li>
                    </ol>
                </nav>
            </div>
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Data Comment</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Name</th>
                                            <th>Description</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($comments as $key => $comment)
                                        <tr>
                                            <td>{{ $key + $comments->firstItem() }}</td>
                                            <td>{{ $comment->name }}</td>
                                            <td>{{ $comment->description }}</td>
                                            <td>
                                                <form class="d-inline"
                                                    onsubmit="return confirm('Data will be Deleted, Are you sure?')"
                                                    action="{{ route('comments.destroy', $comment->id) }}" method="post">
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
                            {{ $comments->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- main-panel ends -->
</div>

@endsection