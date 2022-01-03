@extends("dashboard.layouts.DashboardLayout")

@section('container')
    <div class="col-9">

        <div class="pt-5 mb-2">
            <div>
                <a href="/dashboard/posts" class="btn btn-success"> <i data-feather="arrow-left"></i> Back to my post</a>
                <a href="#" class="btn btn-warning"> <i data-feather="edit"></i> Update</a>
                <a href="#" class="btn btn-danger"> <i data-feather="x-circle" class="mr-1"></i>Delete</a>
            </div>
            <h1 class="mt-2">{{ $post->title }}</h1>
        </div>

        <span>
            Category in
            <a href="/category/{{ $post->category->slug }}">{{ $post->category->name }}</a>
        </span>


        @if ($post->image)
            <div style="max-height: 300px" class="overflow-hidden">
                <img src="{{ asset('storage/' . $post->image) }}" class="img-fluid mt-3 mb-2 w-100" alt="post illust"
                    style="object-fit: cover">
            </div>
        @endif



        <p class="mt-2">
            {!! $post->body !!}
        </p>
    </div>


@endsection
