@extends('layouts.main')


@section('content')
<div class="row px-2 mt-4">
    <div class="col">
        <div class="card">
            <div class="card-header bg-white">
                <h2 class=" pt-4">{{ $post->title }}</h2>
                <small>
                    <p class="m-0">Writed by <a class="text-decoration-none" href="/post?writer={{ $post->user->name }}">{{ $post->user->name }}</a> in <a class="text-decoration-none" href="/post?category={{ $post->category->slug }}">{{ $post->category->category_name }}</a> {{ $post->created_at->diffForHumans() }} </p>
                </small>
            </div>
            <div class="card-header bg-secondary">
                <img src="" alt="" style="height: 25vw;width:100%">
            </div>
            <div class="card-body">
                <p class="card-text mt-3">{!! $post->body !!}</p>
            </div>
        </div>
    </div>
</div>

@endsection