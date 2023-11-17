@extends('layouts.admin')


@section('content')
    <h1>Progetto {{ $project->id }}</h1>
    <div class="container pt-5">
        <div class="d-flex justify-content-center">
            <div class="card mb-3 border border-black p-3" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-4 d-flex align-items-center">

                        @if ($project->cover_image)
                            @if (str_contains($project->cover_image, 'http'))
                                <img class="w-100" src="{{ $project->cover_image }}" alt="">
                            @else
                                <img class="w-100" src="{{ asset('storage/' . $project->cover_image) }}" alt="">
                            @endif
                        @else
                            <div style="width: 200px;">
                                N/A

                            </div>
                        @endif

                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h3 class="text-center">{{ $project->title }}</h3>
                            <div class="d-flex pt-4 pb-2 gap-3 ">
                                <h5>Content: </h5>
                                <p class="card-text">{{ $project->content }}</p>
                            </div>

                            <div class="d-flex pb-2 gap-3 ">
                                <h5>Link: </h5>
                                @if ($project->url_git)
                                    <a href="{{ $project->url_git }}" class="btn btn-dark btn-sm "><i
                                            class="fa-brands fa-github fa-xl" style="color: #ffffff;"></i></a>
                                @else
                                    N/A
                                @endif
                                @if ($project->url_view)
                                    <a href="{{ $project->url_view }}" class="btn btn-dark btn-sm "><i
                                            class="fa-solid fa-eye fa-xl" style="color: #ffffff;"></i></a>
                                @else
                                    N/A
                                @endif
                            </div>
                            {{-- Type --}}
                            <div class="d-flex gap-2 pb-2">
                                <h5>Type: </h5>
                                <span>
                                    {{ $project->type ? $project->type->name : 'Unspecified type' }}
                                </span>
                            </div>

                            {{-- tech --}}
                            <div class="d-flex align-items-baseline gap-2">
                                <h5>Technologies: </h5>
                                <ul class="d-flex gap-1 list-unstyled ">
                                    @forelse ($project->technologies as $index => $technology)
                                        <li>
                                            {{ $technology->name }}
                                            @if ($index < count($project->technologies) - 1)
                                                ,
                                            @endif
                                        </li>
                                    @empty
                                        <li class="">Unspecified technology</li>
                                    @endforelse
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
