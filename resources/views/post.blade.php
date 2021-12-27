@extends('layouts.layout')

@section('container')
    <div class="container position-relative">
        <h1 class="fs-1">{{ $post->title }}</h1>
        <small class="fs-6 text-muted">Created by
            <a href="/category/{{ $post->user->user_id }}" class="text-decoration-none ">{{ $post->user->name }}</a>
            in <a href="/category/{{ $post->category->slug }}"
                class="text-decoration-none ">{{ $post->category->name }}</a>
            {{ $post->created_at->diffForHumans() }}
        </small>
        </p>

        <p class="mt-5">{!! $post->body !!}</p>
        {{-- <a href="/">Back to list</a> --}}
        <div class="position-fixed bottom-0 end-0 p-2">
            <button id="scroll-to-top" class="btn shadow-sm btn-primary rounded-full mb-2" onclick="topFunction()">Scroll to
                top</button>
        </div>
    </div>


@endsection

<script>
    function topFunction() {
        document.body.scrollTop = 0; // For Safari
        document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
    }


    window.onscroll = function() {
        scrollCheck()
    }

    function scrollCheck(params) {
        if (document.body.scrollTop > 20) {
            document.getElementById('scroll-to-top').style.display = "block"
        } else {
            document.getElementById('scroll-to-top').style.display = "none"
        }

    }
</script>
