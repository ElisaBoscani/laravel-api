@extends('layouts.admin')


@section('content')
    <h1>Create</h1>
    @if ($errors->any())
        <div class="alert alert-danger" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="container">
        <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div>
                <label for="title" class="form-label pt-4 fw-semibold fs-3 ">Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" name=" title" id="title"
                    aria-describedby="helpId" placeholder="Title" value="{{ old('title') }}">
                <small id="nameHelper" class="form-text text-muted">Type the name here</small>
                @error('title')
                    <div class="alert alert-danger d-flex align-items-center" role="alert">
                        <i class="fa-solid fa-triangle-exclamation fa-xl" style="color: #ff0f0f;"></i>
                        <span>
                            Name, Error: {{ $message }}
                        </span>
                    </div>
                @enderror
            </div>
            {{-- type --}}
            <label for="type_id" class="form-label pt-4 fw-semibold fs-3">Type</label>
            <select class="form-select form-select-lg mb-3 @error('type_id') is-invalid @enderror" name="type_id"
                id="type_id" aria-label="Large select example" value="{{ old('type_id') }}">
                <option selected disabled>Select Type</option>
                <option value="">None of these</option>
                @foreach ($types as $type)
                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                @endforeach
            </select>
            @error('type_id')
                <div class="alert alert-danger d-flex align-items-center" role="alert">
                    <i class="fa-solid fa-triangle-exclamation fa-xl" style="color: #ff0f0f;"></i>
                    <span>
                        Name, Error: {{ $message }}
                    </span>
                </div>
            @enderror
            {{-- tech --}}


            <label for="technologies" class="pt-4 fw-semibold fs-3">Select technologies:</label>
            <div class="row pb-3">
                @foreach ($technologies as $index => $technology)
                    <div class="col-md-4 pt-3">

                        <input type="checkbox" name="technologies[]" value="{{ $technology->id }}"
                            class="@error('technologies') is-invalid @enderror" id="{{ $technology->id }}"
                            {{ in_array($technology->id, old('technologies', [])) ? 'checked' : '' }}>
                        <label for="{{ $technology->id }}">{{ $technology->name }}</label>

                    </div>
                    @if (($index + 1) % 3 == 0)
                        <div class="row"></div>
                    @endif
                @endforeach
            </div>
            @error('technologies')
                <div class="alert alert-danger d-flex align-items-center" role="alert">
                    <i class="fa-solid fa-triangle-exclamation fa-xl" style="color: #ff0f0f;"></i>
                    <span>
                        Name, Error: {{ $message }}
                    </span>
                </div>
            @enderror

            <!-- url git -->
            <div class="pt-5">
                <label for="url_git" class="form-label pt-4 fw-semibold fs-3">Url Git</label>
                <input type="text" class="form-control @error('url_git') is-invalid @enderror" name=" url_git"
                    id="url_git" aria-describedby="helpId" placeholder="Title" value="{{ old('url_git') }}">
                <small id="nameHelper" class="form-text text-muted">Type the Url Git here</small>
                @error('url_git')
                    <div class="alert alert-danger d-flex align-items-center" role="alert">
                        <i class="fa-solid fa-triangle-exclamation fa-xl" style="color: #ff0f0f;"></i>
                        <span>
                            Name, Error: {{ $message }}
                        </span>
                    </div>
                @enderror
            </div>
            <!-- url view -->
            <div>
                <label for="url_view" class="form-label pt-4 fw-semibold fs-3">Url Vuew</label>
                <input type="text" class="form-control" name=" url_view" id="url_view" aria-describedby="helpId"
                    placeholder="Title" value="{{ old('url_view') }}">
                <small id="nameHelper" class="form-text text-muted">Type the Url vuew here</small>

            </div>
            <!-- content -->
            <div>
                <label for="content" class="form-label pt-4 fw-semibold fs-3">Content</label>
                <textarea class="form-control @error('content') is-invalid @enderror" name="content" id="content" rows="3"
                    value="{{ old('content') }}"></textarea>
                <small id="nameHelper" class="form-text text-muted">Type the content here</small>
                @error('content')
                    <div class="alert alert-danger d-flex align-items-center" role="alert">
                        <i class="fa-solid fa-triangle-exclamation fa-xl" style="color: #ff0f0f;"></i>
                        <span>
                            Name, Error: {{ $message }}
                        </span>
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="cover_image" class="form-label pt-4 fw-semibold fs-3">Choose file</label>
                <input type="file" class="form-control" name="cover_image" id="cover_image" placeholder=""
                    aria-describedby="cover_image_helper">
                <div id="cover_image_helper" class="form-text">Upload an image for the current product</div>
            </div>
            <button type="submit" class="btn btn-primary">
                Save
            </button>
        </form>
    </div>
@endsection
