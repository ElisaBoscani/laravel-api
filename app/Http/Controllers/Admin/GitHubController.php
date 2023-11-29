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
        var_dump($token);
        /* \Log::info('GitHub Token from env:', ['token' => $token]); */
        $gitUser = env('GITHUB_USERNAME');
        /*   var_dump($token, $gitUser); */
        $page = 1;
        $perPage = 100;


        do {
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $token,
            ])->withOptions([
                'verify' => true,
                'curl'   => [
                    CURLOPT_CAINFO => base_path('storage/app/cacert.pem'),
                ],
            ])->get("https://api.github.com/users/elisaboscani/repos", [
                'page' => $page,
                'per_page' => $perPage,
            ]);

            if ($response->failed()) {
                $errorMessage = $response->json()['message'] ?? 'Errore non specificato';
                return response()->json(['error' => $errorMessage]);
            }

            $data = $response->json();

            foreach ($data as $repository) {
                $project = Project::updateOrCreate(
                    [
                        'title' => $repository['name']
                    ],
                    [
                        'title' => $repository['name'],
                        'slug' => Str::slug($repository['name']),
                        'content' => $repository['description'],
                        'cover_image' => asset('storage/posts_images/code-1839406_640.jpg'),
                        'url_git' => $repository['html_url']
                    ]
                );
            }

            $page++;
        } while (count($data) == $perPage);

        $projecs = Project::whereIn('title', collect($data)->pluck('name'))->get();
        dd($projecs);
        return view('admin.projecs.index')->with('projecs ', $projecs);
    }
}
