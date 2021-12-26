@extends('layouts.layout')

@section('container')
    <h1>{{ $post->title }}</h1>
    <p>{!! $post->body !!}</p>


    <p>Created by Author, in <a href="/category/{{ $post->category->slug }}">{{ $post->category->name }}</a> </p>
    <a href="/">Back to list</a>
@endsection
