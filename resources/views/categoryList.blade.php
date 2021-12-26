@extends('layouts.layout')

@section('container')

    <div class="container">
        <h1>List category</h1>

        <ul class="list-group">
            @foreach ($categories as $category)
                <li class="list-group-item">
                    <a href="/category/{{ $category->slug }}">{{ $category->name }}</a>
                </li>
            @endforeach


        </ul>

        {{-- <div class="row mt-5">
            @foreach ($category->post as $post)
                <div class="col-12 mb-2">
                    <h2>
                        <a href="/post/{{ $post->slug }}">{{ $post->title }}</a>
                        </h1>
                        <p>
                            {{ $post->excerpt }}
                        </p>
                </div>
            @endforeach
        </div> --}}

    </div>




@endsection
