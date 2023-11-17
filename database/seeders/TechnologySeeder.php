<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $technologies = ['php', 'laravel', 'msql', 'javascript', 'html', 'css', 'bootstrap', 'vue', 'db', 'debugging', 'programming'];
        foreach ($technologies as $technology) {
            $new_tech = new Technology();
            $new_tech->name = $technology;
            $new_tech->slug = Str::slug($new_tech->name, '-');
            $new_tech->save();
        }
    }
}
