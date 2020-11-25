<?php

namespace App\Services;

use App\Models\Image;
use App\Models\Post;
use Illuminate\Support\Str;

class PostService
{
    /**
     * @var Image
     */
    private $image;

    public function __construct()
    {
        $this->image = new Image();
    }

    public function all()
    {
        return Post::with('image')
            ->latest('id')
            ->paginate(config('app.per_page'));
    }

    public function getAuthorPost($userId)
    {
        return Post::with('image')
            ->latest('id')
            ->where('author_id', $userId)
            ->paginate(config('app.per_page'));
    }

    public function create(array $attributes, $userId)
    {
        $attributes['slug'] = Str::slug($attributes['name']['ru']);
        $attributes['user_id'] = $userId;

        $post = Post::create($attributes);

        $file = $this->image->uploadFile($attributes['image'], 'post');

        $post->image()->create([
            'url' => '/'.$file
        ]);

        return $post;
    }

    public function update(array $attributes, Post $post, $userId)
    {
        $attributes['slug'] = Str::slug($attributes['name']['ru']);
        $attributes['user_id'] = $userId;

        $post->update($attributes);

        if (array_key_exists('image', $attributes)) {
//            if ($post->image()->exists()) {
                $post->image->removeFile();
                $post->image()->delete();
//            } else
//                $post->image()->delete();

            $file = $this->image->uploadFile($attributes['image'], 'post');

            $post->image()->create([
                'url' => '/'.$file
            ]);
        }

        return $post;
    }

    public function delete(Post $post)
    {
        $post->image->removeFile();
        $post->image()->delete();

        return $post->delete();
    }
}
