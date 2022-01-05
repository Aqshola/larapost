@extends("dashboard.layouts.DashboardLayout")


@section('container')
    <form method="post" action="/dashboard/categories/{{ $category->slug }}">
        @method("put")
        @csrf
        <div class="mb-3">
            <label for="category"
                class="form-label @error('category')
                    is-invalid
                @enderror">Category</label>
            <input type="text" class="form-control" id="category" placeholder="New Category" name="category" autofocus
                required value="{{ $category->name }}">
            @error('category')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button class="btn btn-primary" type="submit">Create Category</button>
        <a href="/dashboard/categories" class="btn btn-danger">Cancel</a>
    </form>

@endsection
