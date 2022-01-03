@extends('dashboard.layouts.DashboardLayout')

@section('container')
    <div class="pt-3 pb-2 mb-3 border-bottom">
        <h1>My Posts</h1>
    </div>

    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <a href="/dashboard/posts/create" class="btn btn-primary mb-3"> Create new post</a>
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Category</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->category->name }}</td>
                        <td>
                            <a href="/dashboard/posts/{{ $post->slug }}" class="badge bg-primary"><span
                                    data-feather="eye"></span></a>
                            <a href="#" class="badge bg-warning"><span data-feather="edit"></span></a>

                            <form action="/dashboard/posts/{{ $post->slug }} " class="d-inline" method="POST">
                                @method("delete")
                                @csrf
                                <button class="badge bg-danger border-0" onclick="return confirm('are you sure?')"><span
                                        data-feather="x-circle"></span>
                                </button>
                            </form>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection
