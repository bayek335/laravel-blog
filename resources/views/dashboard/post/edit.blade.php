@extends('dashboard.layouts.dashboard-main')

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Create New Post</h1>
</div>

<div class="col-lg-8">
    <form action="/dashboard/posts/{{$post->slug}}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="form-group mb-3">
            <label for="title">Title</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror " name="title" id="title" value="@if(old('title')) {{old('title')}} @else {{$post->title}} @endif">
            @error('title')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="form-group mb-3">
            <label for="slug">Slug</label>
            <input type="text" class="form-control" name="slug" id="slug" disabled value="{{$post->slug}}">
        </div>
        <div class="form-group mb-3">
            <label for="category">Category</label>
            <select class="form-select @error('category') is-invalid @enderror" name="category" id="category">
                @foreach($categories as $category)
                <option @if($category->id === $post->category_id) {{ 'selected' }} @endif value="{{$category->id}}">{{$category->category_name}}</option>
                @endforeach
            </select>
            @error('category')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label class="form-label" for="image">Post Image</label>
            <input type="hidden" name="oldimage" value="{{$post->image}}">
            <div class="col-6">
                @if($post->image)
                <img src="{{asset('storage/'.$post->image)}}" alt="" class="img-preview img-fluid mb-3" id="imgPreview">
                @else
                <img src="" alt="" class="img-preview img-fluid mb-3" id="imgPreview">
                @endif
            </div>
            <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" onchange="previewImage()">
            @error('image')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="from-group mb-3">
            <label for="body">Description</label>
            <input id="body" type="hidden" name="body" value="@if(old('body')) {{old('body')}} @else {{$post->body}} @endif">
            <trix-editor input="body"></trix-editor>
            @error('body')
            <small class="text-danger fw-normal">
                {{ $message }}
            </small>
            @enderror
        </div>
        <div class="form-group">
            <button class="btn btn-sm btn-primary w-25" type="submit">Submit</button>
        </div>
    </form>
</div>


<script>
    const title = document.querySelector('#title');
    const slug = document.querySelector('#slug');

    title.addEventListener('change', function() {
        fetch('/dashboard/posts/create/getSlug?title=' + title.value)
            .then(res => res.json())
            .then(data => slug.value = data.slug)
    });

    document.addEventListener('trix-file-accept', function(e) {
        e.preventDefault();
    });


    // img Preview
    function previewImage() {

        const image = document.querySelector('#image');
        const imgPreview = document.querySelector('#imgPreview');

        imgPreview.style.display = 'block';

        const ofReader = new FileReader
        ofReader.readAsDataURL(image.files[0])
        ofReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result
        }
    }
</script>

@endsection