@extends('dashboard.layouts.DashboardLayout')



@push('script')
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable({
                responsive: true,
                columnDefs: [{
                        responsivePriority: 1,
                        targets: 1
                    },
                    {
                        responsivePriority: 2,
                        targets: -1
                    }
                ]
            });

        });
    </script>
@endpush
@section('container')


    <div class="pt-3 pb-2 mb-3 border-bottom">
        <h1>My Posts</h1>
    </div>


    <a href="/dashboard/posts/create" class="btn btn-primary mb-5"> Create new post</a>
    <table id="myTable" class="table table-striped  dt-responsive nowrap" style="width:100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Title</th>
                <th>Category</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->category->name }}</td>
                    <td>{{ $post->created_at }}</td>
                    <td>{{ $post->updated_at }}</td>
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
