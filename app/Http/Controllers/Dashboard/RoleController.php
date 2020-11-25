<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Roles\ActionRequest;
use App\Models\Role;
use App\Services\RoleService;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * @var RoleService
     */
    private $service;

    public function __construct(RoleService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $roles = $this->service->all(auth()->user()->role_id);

        return view('dashboard.roles.index', compact('roles'));
    }

    public function create()
    {
        return view('dashboard.roles.create');
    }

    public function store(ActionRequest $request)
    {
        $this->service->create($request->validated());

        $this->success(trans('admin.messages.created'));
        return redirect()->route('dashboard.roles.index');
    }

    public function edit(Role $role)
    {
        return view('dashboard.roles.edit', compact('role'));
    }

    public function update(ActionRequest $request, Role $role)
    {
        $this->service->update($request->validated(), $role);

        $this->info(trans('admin.messages.updated'));
        return redirect()->route('dashboard.roles.index');
    }

    public function destroy(Role $role)
    {
        $this->service->delete($role);

        $this->info(trans('admin.messages.deleted'));
        return redirect()->back();
    }
}
