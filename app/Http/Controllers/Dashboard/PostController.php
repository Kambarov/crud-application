<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Posts\CreatePostRequest;
use App\Http\Requests\Posts\UpdatePostRequest;
use App\Models\Post;
use App\Services\PostService;
use Illuminate\Http\Request;

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
        if (auth()->user()->role_id === 1 || auth()->user()->role_id === 2)
            $posts = $this->service->all();
        else
            $posts = $this->service->getAuthorPost(auth()->user()->id);

        return view('dashboard.posts.index', compact('posts'));
    }

    public function create()
    {
        return view('dashboard.posts.create');
    }

    public function store(CreatePostRequest $request)
    {
        $this->service->create($request->validated(), auth()->user()->id);

        $this->success(trans('admin.messages.created'));
        return redirect()->route('dashboard.posts.index');
    }

    public function edit(Post $post)
    {
        return view('dashboard.posts.edit', compact('post'));
    }

    public function update(UpdatePostRequest $request, Post $post)
    {
        $this->service->update($request->validated(), $post, auth()->user()->id);

        $this->info(trans('admin.messages.updated'));
        return redirect()->route('dashboard.posts.index');
    }

    public function destroy(Post $post)
    {
        $this->service->delete($post);

        $this->info(trans('admin.messages.deleted'));
        return redirect()->back();
    }
}
