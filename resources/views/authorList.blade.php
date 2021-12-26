@extends('layouts.layout')

@section('container')

    <div class="container">
        <h1>List Author</h1>

        <ul class="list-group">
            @foreach ($authors as $author)
                <li class="list-group-item">
                    <a href="/category/{{ $author->username }}">{{ $author->name }}</a>
                </li>
            @endforeach
        </ul>

    </div>




@endsection
