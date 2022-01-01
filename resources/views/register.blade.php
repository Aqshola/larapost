@extends('layouts.layout')



<style>
    .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
    }



    .form-signin .checkbox {
        font-weight: 400;
    }

    .form-signin .form-floating:focus-within {
        z-index: 2;
    }

    .form-signin input[type="email"] {
        margin-bottom: -1px;
        border-bottom-right-radius: 0;
        border-bottom-left-radius: 0;
    }

    .form-signin input[type="password"] {
        margin-bottom: 10px;
        border-top-left-radius: 0;
        border-top-right-radius: 0;
    }


    @media (min-width: 768px) {
        .bd-placeholder-img-lg {
            font-size: 3.5rem;
        }
    }

</style>
@section('container')


    <div class="row">
        <main class="form-signin col-md-5 mx-auto">
            <form method="POST" action="/register">
                @csrf
                <h1 class="text-danger mb-1 text-center">Larapost</h1>
                <h2 class="h3 mb-5 fw-normal text-center">Please register</h2>
                <div class="form-floating">

                    <input type="text"
                        class="form-control @error('name')
                    is-invalid
                    @enderror"
                        value="{{ old('name') }}" id="name" placeholder="Your name" name="name">
                    <label for="name">Name</label>
                    @error('name')

                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-floating">
                    <input type="text"
                        class="form-control @error('username')
                    is-invalid
                    @enderror"
                        value="{{ old('username') }}" id="username" placeholder="Username" name="username">
                    <label for="username">Username</label>
                    @error('username')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-floating">
                    <input type="email"
                        class="form-control @error('email')
                    is-invalid
                    @enderror"
                        value="{{ old('email') }}" id="email" placeholder="name@example.com" name="email">
                    <label for="email">Email address</label>
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-floating">
                    <input type="password"
                        class="form-control mb-0 @error('password')
                    is-invalid
                    @enderror"
                        id="password" placeholder="password" name="password">
                    <label for="password" class="mb-0">Password</label>
                    @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>







                <button class="w-100 btn btn-lg btn-primary" type="submit">Register</button>
                <p class="mt-1">Already have account? <a href="/login">login</a></p>

            </form>
        </main>

    </div>


@endsection
