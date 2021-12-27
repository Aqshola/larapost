@extends('layouts.layout')

@section('container')

    <div class="container">
        <h1>List Author</h1>

        <ul class="list-group mt-5">
            @foreach ($authors as $author)
                <li class="list-group-item p-3 mb-3  shadow-sm border-0 ">
                    <a href="/category/{{ $author->username }}"
                        class="text-decoration-none  text-dark">{{ $author->name }}</a>
                </li>
            @endforeach
        </ul>

    </div>




@endsection
