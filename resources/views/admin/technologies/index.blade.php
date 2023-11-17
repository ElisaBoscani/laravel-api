@extends('layouts.admin')


@section('content')
    <h2 class="p-4">Technology</h2>
    <a href="{{ route('admin.technologies.create') }}" class="btn btn-dark">Creare</a>
    <div class="container">

        <table class="table">
            <thead>

                <tr class="text-center">
                    <th>Id</th>
                    <th>Name</th>
                    <th>Action</th>
                </tr>

            </thead>
            <tbody>
                @foreach ($technologies as $technology)
                    <tr class="text-center">
                        <td>
                            {{ $technology->id }}
                        </td>
                        <td>
                            {{ $technology->name }}
                        </td>

                        <td>
                            <div class="d-flex flex-column align-items-center  gap-3">
                                <a href="{{ route('admin.technologies.show', $technology->id) }}"
                                    class="btn btn-outline-warning btn-sm w-50">Show</a>
                                <a href="{{ route('admin.technologies.edit', $technology->id) }}"
                                    class="btn btn-outline-info btn-sm w-50">Edit</a>

                                <button type="button" class="btn btn-outline-danger btn-sm w-50" data-bs-toggle="modal"
                                    data-bs-target="#modalId-{{ $technology->id }}">
                                    Delete
                                </button>
                                <div class="modal fade" id="modalId-{{ $technology->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="modalTitle-{{ $technology->id }}" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modalTitle-{{ $technology->id }}">Confirm
                                                    Deletion</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true"><i class="fa-solid fa-x"
                                                            style="color: #000000;"></i></span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Are you sure you want to delete it?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Cancel</button>
                                                <form method="POST"
                                                    action="{{ route('admin.technologies.destroy', $technology->id) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>
        {{ $technologies->links('pagination::bootstrap-5') }}
    </div>
@endsection
