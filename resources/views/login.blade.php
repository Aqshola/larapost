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
            <form method="POST" action="/login">
                @csrf
                <h1 class="text-danger mb-1 text-center">Larapost</h1>
                <h2 class="h3 mb-5 fw-normal text-center">Please sign in</h2>

                <div class="form-floating mb-2">
                    <input type="email"
                        class="form-control @error('email')
                        is-invalid
                    @enderror "
                        id="email" placeholder="name@example.com" name="email" autofocus required
                        value="{{ old('email') }}">
                    <label for="email">Email address</label>
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control" id="password" placeholder="Password" name="password"
                        required>
                    <label for="password">Password</label>
                    @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="checkbox mb-3 text-left">
                    <label>
                        <input type="checkbox" value="remember-me"> Remember me
                    </label>
                </div>
                <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
                <p class="mt-1">Didnt have account? <a href="/register">Register</a></p>

            </form>
        </main>

    </div>


@endsection
