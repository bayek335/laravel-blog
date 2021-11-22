@extends('dashboard.layouts.dashboard-main')


@section('content')
<div class="row px-2 mt-4">
    <div class="col">
        <div class="card border-0">
            <div class="card-header bg-white">
                <h2 class=" pt-4">{{ $post->title }}</h2>
                <p>
                    <a class="btn btn-sm btn-warning" href="/dashboard/posts/edit/{{$post->slug}}">edit</a>
                    <a class="btn btn-sm btn-danger" href="/dashboard/posts/delete/{{$post->slug}}">delete</a>
                </p>
            </div>
            <div class="card-header bg-secondary">
                <img src="" alt="" style="height: 25vw;width:100%">
            </div>
            <div class="card-body">
                <p class="">Post at : {{ $post->created_at }} <small>( {{ $post->created_at->diffForHumans() }} )</small> </p>
                <p class="">Category : {{$post->category->category_name}}</p>
                <p>Excerpt :{{ $post->excerpt }} </p>
                <p>Slug :{{ $post->slug }} </p>
                <p class="card-text mt-3">{{ $post->body }}</p>
            </div>
        </div>
    </div>
</div>

@endsection