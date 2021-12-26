@extends('layouts.layout')

@section('container')

    <div class="container">
        <h1>kategori {{ $category->name }}</h1>



        @if ($category->post->isEmpty())
            <h5 class="mt-5 text-center">Not found :(</h5>
        @else
            <div class="row mt-5">
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
        @endif

    </div>

    </div>




@endsection
