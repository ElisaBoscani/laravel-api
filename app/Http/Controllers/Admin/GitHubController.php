<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Http;

use Illuminate\Support\Str;
use App\Helpers\SlugHelper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;

class GitHubController extends Controller
{
    public function getGitHubData()
    {
        $token = env('GITHUB_TOKEN');
        $gitUser = env('GITHUB_USERNAME');
        /*  dd($token, $gitUser); */
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . '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',
        ])->withOptions([
            'verify' => true,
            'curl'   => [

                CURLOPT_CAINFO => base_path('storage/app/cacert.pem'),

            ],
        ])->get("https://api.github.com/users/elisaboscani/repos");



        if ($response->failed()) {
            $errorMessage = $response->json()['message'] ?? 'Errore non specificato';
            return response()->json(['error' => $errorMessage]);
        }

        $data = $response->json();

        foreach ($data as $repository) {

            $projecs  = Project::updateOrCreate(
                [
                    'title' => $repository['name']
                ],
                [

                    'title' => $repository['name'],
                    'slug' => Str::slug($repository['name']),
                    'content' => $repository['description'],
                    'cover_image' => asset('storage/posts_image/code-1839406_640.jpg'),
                    'url_git' => $repository['url']
                ]
            );
            /*   dd($projecs, $projecs->id); */
            $projecs = Project::where('title', $repository['name'])->first();
        }

        /* dd($projecs); */
        return view('admin.projecs.index')->with('projecs ', $projecs);
    }
}
