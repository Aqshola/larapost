@extends('layouts.layout')

@section('container')

    <div class="container">
        <h1>List category</h1>

        <ul class="list-group mt-5">
            @foreach ($categories as $category)
                <li class="list-group-item border-0 shadow-sm mb-3 p-3">
                    <a href="/category/{{ $category->slug }}"
                        class="text-decoration-none text-dark">{{ $category->name }}</a>
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
