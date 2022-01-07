{{-- @extends('errors::minimal') --}}

{{-- @section('title', __('Not Found'))
@section('code', '404')
@section('message', __('Not Found')) --}}


@extends('layouts.layout')

@section('container')



    <div class="container d-flex flex-column align-items-center">
        <h2 class="fs-1 text-center mt-5 ">Oooopss. nothing here </h2>
        <a href="/" class="btn btn-danger mt-4 mx-auto">Back to Home</a>
    </div>

@endsection
