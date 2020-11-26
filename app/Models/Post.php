<?php

namespace App\Models;

use App\Casts\TranslatableJson;
use App\Http\Traits\HasTranslatableField;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory, HasTranslatableField;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'author_id',
        'short_link',
        'bot_token',
        'chat_id'
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

    public static function generateShortLink()
    {
        do {
            $short_link = Str::random(6);
        } while(self::where('short_link', $short_link)->first());

        return $short_link;
    }
}
