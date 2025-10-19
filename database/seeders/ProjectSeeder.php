<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
       for($i = 0; $i < 10; $i++) {
            $project = new Project();
            $project->title = $faker->sentence(3);
            $project->slug = Str::slug($project->title, '-'); // 👈  Use me to generate a slug
            $project->content = $faker->paragraphs(asText: true); 
            $project->cover_image = $faker->imageUrl(category: 'Project', format: 'jpg');
            $project->full_image = $faker->imageUrl(category: 'Project', format: 'jpg');
            $project->git = $faker->sentence(3);
            $project->save();
       }
    }
}
