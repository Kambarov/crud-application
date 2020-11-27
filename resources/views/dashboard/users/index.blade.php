@extends('dashboard.layouts.app')

@section('title', trans('admin.users.title').' - ')

@section('content')
    <div class="row" id="table-hover-animation">
        <div class="col-12">

            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">@lang('admin.users.data_table')</h4>
                    @can('create', 'users')
                        <a href="{{ route('dashboard.users.create') }}" class="btn btn-outline-primary btn-xs btn-icon">
                            <i class="feather icon-plus"></i> @lang('admin.add')
                        </a>
                    @endcan
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover-animation mb-0">
                                <thead>
                                <tr>
                                    <th scope="col" width="50">ID</th>
                                    <th scope="col" width="150" class="text-center">@lang('admin.image')</th>
                                    <th scope="col" width="200" class="text-center">@lang('admin.users.name')</th>
                                    <th scope="col" class="text-center">@lang('admin.users.email')</th>
                                    <th scope="col" class="text-center">@lang('admin.users.weekly_salary')</th>
                                    <th scope="col" class="text-center">@lang('admin.users.role')</th>
                                    <th scope="col" class="text-right">@lang('admin.actions')</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @forelse($users as $item)
                                        <tr>
                                            <th scope="row">{{ $item->id }}</th>
                                            <td class="text-center">
                                                <img src="{{ $item->image->url }}" alt="{{ $item->name }}" style="width: 150px; height: auto">
                                            </td>
                                            <td class="text-center">
                                                {{ $item->name }}
                                            </td>
                                            <td class="text-center">
                                                {{ $item->email }}
                                            </td>
                                            <td class="text-center">
                                                {{ $item->getWeeklySalary() }}
                                            </td>
                                            <td class="text-center">
                                                {{ $item->role->name }}
                                            </td>
                                            <td class="text-right">
                                                @can('update', 'users')
                                                    <a href="{{ route('dashboard.users.edit', $item->id) }}" class="btn btn-icon btn-warning
                                                     btn-sm" data-toggle="tooltip" data-placement="top" title="" data-original-title="@lang('admin.edit')">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                @endcan

                                                @can('delete', 'users')
                                                    <a href="{{ route('dashboard.users.destroy', $item->id) }}" onclick="return confirm('@lang('admin.are_you_sure')')"
                                                       class="btn btn-icon btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title=""
                                                       data-original-title="@lang('admin.delete')">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                @endcan
                                            </td>
                                        </tr>
                                    @empty
                                        <div class="alert alert-primary">
                                            <i class="feather icon-alert-octagon"></i> @lang('admin.no_data')
                                        </div>
                                    @endforelse
                                </tbody>
                            </table>
                            {{ $users->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
