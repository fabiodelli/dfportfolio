<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Technology;

class TechnologiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $technologies = [
            [
                'name' => 'HTML',
                'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/6/61/HTML5_image_and_wordmark.svg/800px-HTML5_image_and_wordmark.svg.png',
            ],
            [
                'name' => 'CSS',
                'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/d/d5/CSS3_image_and_wordmark.svg/1200px-CSS3_image_and_wordmark.svg.png',
            ],
            [
                'name' => 'JAVASCRIPT',
                'image' => 'https://pluralsight2.imgix.net/paths/images/javascript-542e10ea6e.png',
            ],
            [
                'name' => 'VUE JS',
                'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/9/95/Vue.js_Logo_2.svg/1200px-Vue.js_Logo_2.svg.png',
            ],
            [
                'name' => 'SASS',
                'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/9/96/Sass_Logo_Color.svg/1200px-Sass_Logo_Color.svg.png',
            ],
            [
                'name' => 'LARAVEL',
                'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/9/9a/Laravel.svg/1200px-Laravel.svg.png',
            ],
            [
                'name' => 'BOOTSTRAP',
                'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/b/b2/Bootstrap_image.svg/1200px-Bootstrap_image.svg.png',
            ],
            [
                'name' => 'VITE',
                'image' => 'https://camo.githubusercontent.com/61e102d7c605ff91efedb9d7e47c1c4a07cef59d3e1da202fd74f4772122ca4e/68747470733a2f2f766974656a732e6465762f6c6f676f2e737667',
            ],
            [
                'name' => 'PHP',
                'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/2/27/PHP-image.svg/260px-PHP-image.svg.png',
            ],
           
            
        ];

        foreach ($technologies as $technology) {
            $technology['slug'] = \Illuminate\Support\Str::slug($technology['name']);
            Technology::create($technology);
        }
    }
}
