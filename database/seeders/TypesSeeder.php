<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Type;

class TypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = ['Frontend', 'Backend', 'Full Stack', 'Programming', 'DevOps'];

        foreach ($types as $type) {
            $newType = new Type();
            $newType->type = $type;
            $newType->slug = Str::slug($newType->type);
            $newType->save();
        }
    }

}