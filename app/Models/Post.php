<?php

namespace App\Models;

use App\Casts\TranslatableJson;
use App\Http\Traits\HasTranslatableField;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
    use HasFactory, HasTranslatableField;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'user_id'
    ];

    protected $casts = [
        'name' => TranslatableJson::class,
        'description' => TranslatableJson::class
    ];

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id', 'id');
    }

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }
}
