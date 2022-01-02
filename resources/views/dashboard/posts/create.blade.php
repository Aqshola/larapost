@extends('dashboard.layouts.DashboardLayout')

@section('container')
    <div class="pt-3 pb-2 mb-3 border-bottom">
        <h1>Create new post</h1>
    </div>

    <div class="col-md-7">
        <form method="post" action="/dashboard/posts">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" placeholder="title of your post" name="title">
            </div>
            <div class="mb-3">
                <label for="slug" class="form-label">Slug</label>
                <input type="text" class="form-control" id="slug" placeholder="slug of your post" name="slug" readonly>
            </div>
            <div class="mb-3">
                <label for="category" class="form-label">Category</label>
                <select type="text" class="form-select" id="slug" name="category_id">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>


            <div class="mb-3">
                <label for="x" class="form-label">Content</label>
                <input id="body" type="hidden" name="body">
                <trix-editor input="body"></trix-editor>
            </div>

            <button class="btn btn-primary" type="submit">Create post</button>
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
