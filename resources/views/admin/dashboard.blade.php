@extends('layouts.admin')

@section('content')
    <div class="container pt-5">
        <h2 class="fs-4 text-secondary my-4">
            Welcome {{ Auth::user()->name }}

        </h2>
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <div class="row justify-content-center">
            <div class="col">

                <div class="card-group">
                    <div class="card">
                        <div class="card-header bg_secondary">Totale dei progetti</div>
                        <div class="card-body">
                            {{ $totalProjects }}
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header bg_secondary">Totale degli utenti</div>
                        <div class="card-body">

                            {{ $totalUsers }}
                        </div>
                    </div>

                </div>

            </div>
        </div>
        <div class="pt-5">Lista ultimi 10 progetti</div>
        <table class="table">
            <thead>

                <tr>
                    <th>Id</th>
                    <th>Title</th>
                    <th>Content</th>
                    <th>Image</th>
                </tr>

            </thead>
            <tbody>
                @foreach ($latestProjects as $projec)
                    <tr>
                        <td>
                            {{ $projec->id }}
                        </td>
                        <td>
                            {{ $projec->title }}
                        </td>
                        <td>
                            {{ $projec->content }}
                        </td>
                        <td>

                            @if (str_contains($projec->cover_image, 'http'))
                                <img style="width: 150px; height: 150px ;" src="{{ $projec->cover_image }}" alt="">
                            @else
                                <img style="width: 150px; height: 150px ;" src="./storage/posts_images/code-1839406_640.jpg"
                                    alt="">
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endsection
