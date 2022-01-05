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
                            <a href="#" class="badge bg-warning"><span data-feather="edit"></span></a>
                            <form action="#" class="d-inline" method="POST">
                                {{-- @method("delete") --}}
                                @csrf
                                <button class="badge bg-danger border-0" onclick="return confirm('are you sure?')"><span
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
                {{-- <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div> --}}
            </div>
        </div>
    </div>


@endsection
