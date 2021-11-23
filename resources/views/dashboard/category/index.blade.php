@extends('dashboard.layouts.dashboard-main')

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Category</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
            <button onclick="location.href='/dashboard/category/create'" type="button" class="btn btn-sm btn-outline-secondary">New Category</button>
            <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
        </div>
    </div>
</div>

<table class="table table-bordered w-75">
    <thead>
        <tr>
            <th scope="col" style="width: 5%;">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Slug</th>
            <th scope="col" class="text-center">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($categories as $category)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{ $category->category_name }} </td>
            <td>{{ $category->slug }} </td>
            <td class="d-flex justify-content-center">
                <a href="/dashboard/category/{{$category->slug}}/edit" class="btn btn-sm btn-warning">Edit</a>
                <form action="/dashboard/category/{{$category->slug}}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection