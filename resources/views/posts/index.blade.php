@extends('layouts.main')


@section('content')

<div class="row justify-content-center mt-4">
    <h1 class="text-center">Laravel Blog - Posts</h1>
</div>
<div class="row ">
    <div class="col-md-7 m-auto">
        <form action="/post" method="get">
            <div class="input-group mb-3">
                @if(request('category'))
                <input type="hidden" name="category" value="{{request('category')}}">
                @endif
                @if(request('writer'))
                <input type="hidden" name="writer" value="{{request('writer')}}">
                @endif
                <input type="text" class="form-control" placeholder="Search posts" name="search" value="@if(request('search')) {{ request('search') }} @endif">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="submit">Search</button>
                </div>
            </div>
        </form>
    </div>
</div>
@if($posts->count()<=0) <div class="row text-center">
    <div class="col-md-7 m-auto">
        <h3>No Posts Found!</h3>
    </div>
    </div>
    @endif
    <div class="row px-2 mt-3">
        @foreach($posts as $post)
        <div class="col-lg-4 mt-3 ">
            <div class="card shadow-sm">
                <img src="{{ asset('images/post-images/'.$post->image) }}" class="card-img-top bg-secondary" alt="...">
                <div class="card-body"><small>
                        <p class="m-0">Writed by <a class="text-decoration-none" href="/post?writer={{ $post->user->name }}">{{ $post->user->name }}</a> in <a class="text-decoration-none" href="/post?category={{ $post->category->slug }}">{{ $post->category->category_name }}</a> </p>
                    </small>
                    <h5 class="card-title">{{ $post->title }}</h5>
                    <p class="card-text">{{$post->excerpt}}</p>
                    <a href="/post/{{$post->slug}}" class="btn btn-sm btn-primary">Read More</a>
                </div>
            </div>
        </div>
        @endforeach
        <div class="row d-flex justify-content-center mt-4">
            {{ $posts->links() }}
        </div>
    </div>

    @endsection