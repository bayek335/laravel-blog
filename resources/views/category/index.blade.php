@extends('layouts.main')


@section('content')
<div class="row justify-content-center mt-4">
    <h1 class="text-center ">Posts - Category " {{ $posts[0]->category->category_name }} "</h1>

</div>
<div class="row ">
    <div class="col-md-7 m-auto">
        <form action="/post" method="get">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Search posts" name="search">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="submit">Search</button>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="row px-2 mt-3">
    @foreach($posts as $post)
    <div class="col-lg-4 mt-3 ">
        <div class="card shadow-sm">
            <img src="..." class="card-img-top bg-secondary" alt="..." style="width:100%;height:140px">
            <div class="card-body">
                <small>
                    <p class="m-0">Writed by <a class="text-decoration-none" href="/writer/{{ $post->user->name }}">{{ $post->user->name }}</a> {{ $post->created_at->diffForHumans() }} </p>
                </small>
                <h5 class="card-title mt-1">{{ $post->title }}</h5>
                <p class="card-text">{{$post->excerpt}}</p>
                <a href="/post/{{$post->slug}}" class="btn btn-sm btn-primary">Read More</a>
            </div>
        </div>
    </div>
    @endforeach
</div>

@endsection