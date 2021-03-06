@extends('layouts.layout')

@section('container')

    <div class="container">
        <h1 class="p-0 text-center fw-bolder text-danger">
            LaraPost
        </h1>
        <h2 class="text-center fw-normal">
            {!! $title !!}
        </h2>

        @if ($posts->isEmpty())

            <h1 class="text-center mt-5 fs-3">Tidak ada post</h1>
        @else
            <div class="row mt-5">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md 7">
                            @if ($posts[0]->image)
                                <div class="position-relative">
                                    <img src="{{ asset('storage/' . $posts[0]->image) }}" class="img-thumb w-100 rounded"
                                        alt="thumb" style="height: 300px; object-fit:cover;">
                                </div>

                            @else
                                <div class="position-relative">
                                    <img src="/asset/Larapost.png" class="img-thumb w-100 rounded" alt="thumb"
                                        style="height: 300px; object-fit:cover;">
                                </div>
                            @endif

                        </div>
                        <div class="col-md-5">
                            <div class="card-body ">
                                <small class="text-decoration-none text-muted">By <a
                                        href="/?author={{ $posts[0]->user->username }}"
                                        class=" text-decoration-none">{{ $posts[0]->user->name }}</a>
                                    in <a href="/?category={{ $posts[0]->category->slug }}"
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
                        <div class="w-100 position-relative">
                            <a href="/?category={{ $post->category->slug }}"
                                class="position-absolute text-decoration-none fs-6 top-0 left-0 p-1 bg-danger text-light text-truncate"
                                style="width: fit-content; max-width:200px">{{ $post->category->name }}</a>

                            @if ($post->image)
                                <img src="{{ asset('storage/' . $post->image) }}" class="img-thumb w-100 rounded"
                                    alt="thumb" style="height: 200px; object-fit:cover;" loading="lazy">
                            @else

                                <img src="/asset/Larapost.png" class="img-thumb w-100 rounded" alt="thumb"
                                    style="height: 200px; object-fit:cover;" loading="lazy">
                            @endif
                        </div>
                        <h2 class="fs-4">
                            <a href="/post/{{ $post->slug }}"
                                class="text-decoration-none text-dark ">{{ $post->title }}</a>
                        </h2>
                        <small class="text-decoration-none text-muted">By <a href="/?author={{ $post->user->username }}"
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
        @endif

        <div class="d-flex justify-content-center">
            {{ $posts->links() }}
        </div>



    </div>




@endsection
