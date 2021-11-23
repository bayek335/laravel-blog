@extends('dashboard.layouts.dashboard-main')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">My Posts</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
            <button onclick="location.href='/dashboard/posts/create'" type="button" class="btn btn-sm btn-outline-secondary"><span data-feather="plus"></span> New Post</button>
            <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
        </div>
        <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
            <span data-feather="calendar"></span>
            This week
        </button>
    </div>
</div>
@if(session()->has('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif
<div class="table-responsive">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Title</th>
                <th scope="col">Category</th>
                <th scope="col">Description</th>
                <th scope="col" class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($posts as $post)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $post->title }}</td>
                <td>{{ $post->category->category_name }}</td>
                <td class="w-50">{{ $post->excerpt }} ....</td>
                <td class="">
                    <a class="text-decoration-none mr-2 badge bg-info" href="/dashboard/posts/{{ $post->slug }}" class="text-center"> <span data-feather='eye'></span> <small>show</small></a>
                    <a class="text-decoration-none mr-2 badge bg-warning" href="/dashboard/posts/{{ $post->slug }}/edit" class="text-center"> <span data-feather='edit'></span> <small>edit</small></a>
                    <form action="/dashboard/posts/{{ $post->slug }}" method="post">
                        @method('DELETE')
                        @csrf
                        <button id="btn-delete" onclick="return confirm('Are you sure to delete this post?')" type="submit" class="btn text-decoration-none mr-2 badge bg-danger" href="" class="text-center"> <span data-feather='x-circle'></span> <small>delete</small></button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection