<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Users\CreateUserRequest;
use App\Http\Requests\Users\UpdateUserRequest;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * @var UserService
     */
    private $service;

    public function __construct(UserService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $this->authorize('view', 'users');

        $users = $this->service->all(auth()->user()->role_id);

        return view('dashboard.users.index', compact('users'));
    }

    public function create()
    {
        $this->authorize('create', 'users');
        return view('dashboard.users.create');
    }

    public function store(CreateUserRequest $request)
    {
        $this->service->create($request->validated());

        $this->success(trans('admin.messages.created'));
        return redirect()->route('dashboard.users.index');
    }

    public function edit(User $user)
    {
        $this->authorize('update', 'users');
        return view('dashboard.users.edit', compact('user'));
    }

    public function update(UpdateUserRequest $request, User $user)
    {
         $this->service->update($request->validated(), $user);

        $this->info(trans('admin.messages.updated'));
        return redirect()->route('dashboard.users.index');
    }

    public function destroy(User $user)
    {
        $this->authorize('delete', 'users');
        $this->service->delete($user);

        $this->info(trans('admin.messages.deleted'));
        return redirect()->back();
    }
}
