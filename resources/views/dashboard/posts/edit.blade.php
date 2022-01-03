@extends('dashboard.layouts.DashboardLayout')

@section('container')
    <div class="pt-3 pb-2 mb-3 border-bottom">
        <h1>Edit post</h1>
    </div>

    <div class="col-md-7">
        <form method="post" action="/dashboard/posts/{{ $post->slug }}">
            @method("put")
            @csrf
            <div class="mb-3">
                <label for="title"
                    class="form-label @error('title')
                    is-invalid
                @enderror">Title</label>
                <input type="text" class="form-control" id="title" placeholder="title of your post" name="title"
                    value="{{ old('title', $post->title) }}">
                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="slug"
                    class="form-label @error('slug')
                    is-invalid
                @enderror">Slug</label>
                <input type="text" class="form-control" id="slug" placeholder="slug of your post" name="slug" readonly
                    value="{{ old('slug', $post->slug) }}">
                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>


            <div class="mb-3">
                <label for="category" class="form-label">Category</label>
                <select type="text"
                    class="form-label @error('category_id')
                    is-invalid
                @enderror"
                    id="slug" name="category_id">
                    @foreach ($categories as $category)
                        @if (old('category_id', $post->category->id) == $category->id)
                            <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                        @else
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endif

                    @endforeach
                </select>

                @error('category_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="body" class="form-label">Content</label>
                <input id="body" type="hidden" name="body" for="slug" value="{{ old('body', $post->body) }}"
                    class="form-label @error('body')
                    is-invalid
                @enderror">

                <trix-editor input="body"></trix-editor>


                @error('body')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button class="btn btn-primary" type="submit">Update post</button>
        </form>
    </div>


@endsection


<script>
    window.onload = () => {

        const title = document.getElementById("title")
        const slug = document.getElementById("slug")

        title.addEventListener('change', function() {
            fetch('/dashboard/posts/checkSlug?title=' + title.value).then(res => res.json()).then(data =>
                slug.value = data.slug)
        })

        document.addEventListener('trix-file-accept', function(e) {
            e.preventDefault()
        })
    }
</script>
