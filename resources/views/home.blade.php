@extends('layouts.main')


@section('content')

<div class="row justify-content-center mt-4">
    <h1 class="text-center">Laravel Blog</h1>
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
<div class="row px-2 justify-content-between mt-3">
    @if($posts->count()>0)
    <div class="col-12 mr-1 mt-3 shadow-sm text-center">
        <div class="card">
            <div class="w-100 overflow-hidden border-bottom" style="height: 50vh;">
                <img src="{{ asset('images/post-images/'.$posts[0]->image) }}" class="card-img-top" alt="{{ $posts[0]->image }}">
            </div>
            <div class="card-body"><small>
                    <p class="m-0">Writed by <a class="text-decoration-none" href="/post?writer={{ $posts[0]->user->name }}">{{ $posts[0]->user->name }}</a> in <a class="text-decoration-none" href="/post?category={{ $posts[0]->category->slug }}">{{ $posts[0]->category->category_name }}</a> {{ $posts[0]->created_at->diffForHumans() }} </p>
                </small>
                <h5 class="card-title">{{ $posts[0]->title }}</h5>
                <p class="card-text">{{$posts[0]->excerpt}}</p>
                <a href="/post/{{$posts[0]->slug}}" class="btn btn-sm btn-primary">Read More</a>
            </div>
        </div>
    </div>
    @else
    <div class="row text-center">
        <div class="col-md-7 m-auto">
            <h3>No Posts!</h3>
        </div>
    </div>
    @endif

    @foreach($posts->skip(1) as $post)
    <div class="col-lg-4 mr-1 mt-3 shadow-sm">
        <div class="card">
            <img src="{{ asset('images/post-images/'.$post->image) }}" class="card-img-top bg-secondary" alt="..." style="width:100%;height:140px">
            <div class="card-body"><small>
                    <p class="m-0">Writed by <a class="text-decoration-none" href="/writer/{{ $post->user->name }}">{{ $post->user->name }}</a> in <a class="text-decoration-none" href="/post?category={{ $post->category->slug }}">{{ $post->category->category_name }}</a> </p>
                </small>
                <h5 class="card-title">{{ $post->title }}</h5>
                <p class="card-text">{{$post->excerpt}}</p>
                <a href="/post/{{$post->slug}}" class="btn btn-sm btn-primary">Read More</a>
            </div>
        </div>
    </div>
    @endforeach
</div>

@endsection