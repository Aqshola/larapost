@extends('dashboard.layouts.DashboardLayout')

@section('container')

    @include('sweetalert::alert')
    <div class="pt-3 pb-2 mb-3 border-bottom">
        <h1>Categories</h1>
    </div>

    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal"> Create new category</button>
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Category</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $category->name }}</td>
                        <td>
                            <a href="/dashboard/categories/{{ $category->slug }}/edit" class="badge bg-warning"><span
                                    data-feather="edit"></span></a>
                            <form action="/dashboard/categories/{{ $category->slug }}" class="d-inline"
                                id="del-{{ $category->id }}" method="POST">
                                @method("delete")
                                @csrf
                                <button type="button" class="badge bg-danger border-0" id="delete-btn"
                                    onclick="confirmDelete(this)" data-delete="del-{{ $category->id }}"><span
                                        data-feather="x-circle"></span>
                                </button>
                            </form>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">New Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="/dashboard/categories">
                        @csrf
                        <div class="mb-3">
                            <label for="category"
                                class="form-label @error('category')
                    is-invalid
                @enderror">Category</label>
                            <input type="text" class="form-control" id="category" placeholder="New Category"
                                name="category" autofocus required>
                            @error('category')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <button class="btn btn-primary" type="submit">Create Category</button>
                        <button class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                    </form>
                </div>

            </div>
        </div>
    </div>


@endsection
<script>
    function confirmDelete(e) {

        const form = e.dataset.delete
        Swal.fire({
            title: 'Are you sure delete this category?',

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
