@extends('dashboard.layouts.DashboardLayout')

@section('container')


    <div class="pt-3 pb-2 mb-3 border-bottom">
        <h1>My Posts</h1>
    </div>


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
                            <a href="/dashboard/posts/{{ $post->slug }}/edit" class="badge bg-warning"><span
                                    data-feather="edit"></span></a>

                            <form action="/dashboard/posts/{{ $post->slug }} " class="d-inline" method="POST"
                                id="del-{{ $post->id }}">
                                @method("delete")
                                @csrf
                                <button type="button" id="delete-btn" onclick="confirmDelete(this)"
                                    data-delete="del-{{ $post->id }}" class="badge bg-danger border-0"><span
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


<script>
    const confirmDelete = (e) => {

        const form = e.dataset.delete
        Swal.fire({
            title: 'Are you sure delete this post?',

            showCancelButton: true,
            confirmButtonText: 'Delete',
            confirmButtonColor: '#d33',
            denyButtonText: `Cancel`,
        }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.value) {
                document.getElementById(form).submit()
            }
        })
    }
</script>
