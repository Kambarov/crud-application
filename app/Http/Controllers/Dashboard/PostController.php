<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Posts\CreatePostRequest;
use App\Http\Requests\Posts\UpdatePostRequest;
use App\Models\Post;
use App\Notifications\SendPost;
use App\Services\PostService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class PostController extends Controller
{
    /**
     * @var PostService
     */
    private $service;

    public function __construct(PostService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $this->authorize('view', 'posts');

        if (auth()->user()->role_id === 1 || auth()->user()->role_id === 2)
            $posts = $this->service->all();
        else
            $posts = $this->service->getAuthorPost(auth()->user()->id);

        return view('dashboard.posts.index', compact('posts'));
    }

    public function create()
    {
        $this->authorize('create', 'posts');
        return view('dashboard.posts.create');
    }

    public function store(CreatePostRequest $request)
    {
        $post = $this->service->create($request->validated(), auth()->user()->id);

        if ($post->chat_id)
            Notification::route('telegram', $post->chat_id)
                ->notify(new SendPost($post));

//        return $post;
        $this->success(trans('admin.messages.created'));
        return redirect()->route('dashboard.posts.index');
    }

    public function edit(Post $post)
    {
        $this->authorize('update', 'posts');
        return view('dashboard.posts.edit', compact('post'));
    }

    public function update(UpdatePostRequest $request, Post $post)
    {
        $post = $this->service->update($request->validated(), $post, auth()->user()->id);

        if ($post->chat_id)
            Notification::route('telegram', $post->chat_id)
                ->notify(new SendPost($post));

        $this->info(trans('admin.messages.updated'));
        return redirect()->route('dashboard.posts.index');
    }

    public function destroy(Post $post)
    {
        $this->authorize('delete', 'posts');
        $this->service->delete($post);

        $this->info(trans('admin.messages.deleted'));
        return redirect()->back();
    }
}
