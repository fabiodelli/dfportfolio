<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Str;

class Technology extends Model
{
    use HasFactory;

    // aggiungi qui i campi che hai nella migration
    protected $fillable = ['name', 'slug', 'image'];

    public function projects(): BelongsToMany
    {
        return $this->belongsToMany(Project::class);
    }

    public static function generateSlug($name)
    {
        return Str::slug($name, '-');
    }
}
