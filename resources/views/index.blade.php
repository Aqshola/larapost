@extends('layouts.layout')

@section('container')

    <div class="container p-0">
        <h1 class="p-0">{{ $title }}</h1>
        <div class="row mt-5 p-2">
            @foreach ($posts as $post)
                <div class="col-12 mb-2 border-bottom p-0 pb-4 ">
                    <h2>
                        <a href="/post/{{ $post->slug }}" class="text-decoration-none">{{ $post->title }}</a>
                    </h2>
                    <p>By <a href="/post/author/{{ $post->user->username }}">{{ $post->user->name }}</a>
                        {{ $post->user->name }} in <a
                            href="/category/{{ $post->category->slug }}">{{ $post->category->name }}</a></p>
                    <p>
                        {{ $post->excerpt }}
                    </p>
                    <a href="/post/{{ $post->slug }}" class="text-decoration-none mt-2">Read more...</a>
                </div>
            @endforeach

        </div>

    </div>




@endsection
