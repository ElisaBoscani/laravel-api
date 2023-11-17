@extends('layouts.admin')


@section('content')

<h1>Dati</h1>
<a href="{{route('admin.projects.create')}}" class="btn btn-dark">Creare</a>
<div class="container">

  <table class="table">
    <thead>

      <tr>
        <th>Id</th>
        <th>Title</th>
        <th>Content</th>
        <th>Image</th>
        <th>Type</th>
        <th>Url Git</th>
        <th>Url View</th>
        <th>Action</th>
      </tr>

    </thead>
    <tbody>
      @foreach($projecs as $projec)
      <tr>
        <td>
          {{$projec->id}}
        </td>
        <td>
          {{$projec->title}}
        </td>

        <td>
          {{$projec->content}}
        </td>
        <td>
          @if ($projec->cover_image)
          @if (str_contains($projec->cover_image, 'http'))
          <img class="w-100" src="{{ $projec->cover_image }}" alt="">

          @else
          <img class="w-100" src="{{ asset('storage/' . $projec->cover_image) }}" alt="">
          @endif
          @else
          N/A
          @endif
        </td>
        <td>
          @if($projec->type)
         <p> {{ $projec->type->name }}</p>
         @else
         N/A
          @endif

        </td>
        <td>
          @if($projec->url_git)
          <a href=" {{$projec->url_git}}">Link to the code</a>

          @else
          N/A
          @endif
        </td>
        <td>
          @if($projec->url_view)
          <a href="{{$projec->url_view}}">Link to the page</a>

          @else
          N/A
          @endif
        </td>
        <td>
          <div class="d-flex flex-column gap-3">
            <a href="{{route('admin.projects.show', $projec->id)}}" class="btn btn-outline-warning btn-sm">Show</a>
            <a href="{{route('admin.projects.edit', $projec->id)}}" class="btn btn-outline-info btn-sm">Edit</a>

            <button type="button" class="btn btn-outline-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modalId-{{$projec->id}}">
              Delete
            </button>
            <div class="modal fade" id="modalId-{{$projec->id}}" tabindex="-1" role="dialog" aria-labelledby="modalTitle-{{$projec->id}}" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="modalTitle-{{$projec->id}}">Confirm Deletion</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true"><i class="fa-solid fa-x" style="color: #000000;"></i></span>
                    </button>
                  </div>
                  <div class="modal-body">
                    Are you sure you want to delete it?
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <form method="POST" action="{{route('admin.projects.destroy', $projec->id)}}">
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
  {{$projecs->links('pagination::bootstrap-5')}}
</div>

@endsection