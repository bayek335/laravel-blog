@extends('dashboard.layouts.dashboard-main')


@section('content')
<div class="row px-2 mt-4">
    <div class="col">
        <div class="card border-0">
            <div class="card-header bg-white">
                <h2 class="pt-4 mb-3">{{ $post->title }}</h2>
                <a class="btn btn-sm btn-warning" href="/dashboard/posts/{{$post->slug}}/edit">edit</a>
                <form action="/dashboard/posts/{{ $post->slug }}" method="post" class="d-inline-block">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-sm btn-danger " class="text-center">
                        <span data-feather='x-circle'></span> <small onclick="return confirm('Are you sure to delete this post?')">delete</small>
                    </button>
                </form>
            </div>
            <div class="card-header bg-secondary mt-3">
                <img src="{{asset('storage/'.$post->image)}}" alt="" style="height: 25vw;width:100%">
            </div>
            <div class="card-body">
                <p>Post by : {{$post->user->name}}</p>
                <p class="">Post at : {{ $post->created_at }} <small>( {{ $post->created_at->diffForHumans() }} )</small> </p>
                <p class="">Category : {{$post->category->category_name}}</p>
                <p>Excerpt :{{ $post->excerpt }} </p>
                <p>Slug :{{ $post->slug }} </p>
                <p class="card-text mt-3">{!! $post->body !!}</p>
            </div>
        </div>
    </div>
</div>

@endsection