@extends('layouts.layout')

@section('container')

    <div class="container">
        <h1 class="p-0 text-center fw-bolder text-danger">
            LaraPost
        </h1>
        <h2 class="text-center fw-normal">
            {{ $title }}
        </h2>

        <div class="row mt-5">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md 7">
                        <div>
                            <img src="https://picsum.photos/seed/picsum/1000" class="img-thumb w-100 rounded" alt="thumb"
                                style="height: 300px; object-fit:cover;">
                        </div>

                    </div>
                    <div class="col-md-5">
                        <div class="card-body ">
                            <small class="text-decoration-none text-muted">By <a
                                    href="/post/author/{{ $posts[0]->user->username }}"
                                    class=" text-decoration-none">{{ $posts[0]->user->name }}</a>
                                in <a href="/category/{{ $posts[0]->category->slug }}"
                                    class="text-decoration-none">{{ $posts[0]->category->name }}</a>
                                {{ $posts[0]->created_at->diffForHumans() }}
                            </small>

                            <h2 class="fs-1">
                                <a href="/post/{{ $posts[0]->slug }}"
                                    class="text-decoration-none text-dark ">{{ $posts[0]->title }}</a>
                            </h2>

                            <p>
                                {{ $posts[0]->excerpt }}
                            </p>

                        </div>
                    </div>
                </div>
            </div>


        </div>
        <div class="row mt-5 p-2">
            @foreach ($posts->skip(1) as $post)
                <div class="col-md-3 mb-2 border-bottom p-2 pb-4 d-flex flex-column">
                    <div class="w-100">
                        <img src="https://picsum.photos/seed/picsum/500" class="img-thumb w-100 rounded" alt="thumb"
                            style="height: 200px; object-fit:cover;" loading="lazy">
                    </div>
                    <h2 class="fs-4">
                        <a href="/post/{{ $post->slug }}"
                            class="text-decoration-none text-dark ">{{ $post->title }}</a>
                    </h2>
                    <small class="text-decoration-none text-muted">By <a href="/post/author/{{ $post->user->username }}"
                            class="text-decoration-none">{{ $post->user->name }}</a>
                        {{ $post->created_at->diffForHumans() }}
                    </small>
                    <p class="flex-grow-1">
                        {{ $post->excerpt }}
                    </p>
                    <a href="/post/{{ $post->slug }}" class="btn-sm btn-primary text-decoration-none mt-2"
                        style="width: fit-content">Read
                        more...</a>
                </div>
            @endforeach

        </div>

    </div>




@endsection
