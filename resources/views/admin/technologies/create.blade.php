@extends('layouts.admin')


@section('content')
    <h1>Create</h1>

    <div class="container">
        <form action="{{ route('admin.technologies.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div>
                <label for="name" class="form-label pt-4 fw-semibold fs-3 ">Title</label>
                <input type="text" class="form-control" name=" name" id="name" aria-describedby="helpId"
                    placeholder="Title" value="{{ old('name') }}">
                <small id="nameHelper" class="form-text text-muted">Type the name here</small>

            </div>
            <button type="submit" class="btn btn-primary">
                Save
            </button>
        </form>
    </div>
@endsection
