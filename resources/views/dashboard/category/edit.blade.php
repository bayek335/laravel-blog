@extends('dashboard.layouts.dashboard-main')

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Add Category</h1>
</div>

<div class="col-6">
    <form action="/dashboard/category/{{$category->slug}}" method="POST">
        @method('PUT')
        @csrf
        <div class="form-group mb-3">
            <label for="name">Name</label>
            <input type="text" name="category_name" id="name" class="form-control @error('category_name') is-invalid @enderror" autocomplete="off" value="@if(old('category_name')){{old('category_name')}}@else{{$category->category_name}}@endif">
            @error('category_name')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="form-group mb-3">
            <label for="slug">Slug</label>
            <input type="text" name="slug" id="slug" class="form-control" readonly value="{{ $category->slug }}">
            @error('slug')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-sm btn-primary w-25">Submit</button>
        </div>
    </form>
</div>

<script>
    const name = document.querySelector('#name');
    const slug = document.querySelector('#slug');
    name.addEventListener('keyup', () => {

        fetch('/dashboard/category/create/getslug?name=' + name.value)
            .then(response => response.json())
            .then(data => slug.value = data.slug);
    });
</script>
@endsection