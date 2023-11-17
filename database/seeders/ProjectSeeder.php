<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project;
use Faker\Generator as Faker;
use Illuminate\Support\Str;


class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        for ($i = 0; $i < 10; $i++) {
            $project = new Project();
            $project->title = $faker->realText(50);
            $project->content = $faker->realText();
            $project->cover_image = $faker->imageUrl();
            $project->slug = Str::slug($project->title, '-');
            $project->url_git = $faker->url();
            $project->url_view = $faker->url();
            $project->save();
        }
    }
}
