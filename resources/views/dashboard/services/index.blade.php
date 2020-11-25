@extends('dashboard.layouts.app')

@section('title', trans('admin.services.title').' - ')

@section('content')
    <div class="row" id="table-hover-animation">
        <div class="col-12">

            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">@lang('admin.services.data_table')</h4>
                    <a href="{{ route('dashboard.services.create') }}" class="btn btn-outline-primary btn-xs btn-icon">
                        <i class="feather icon-plus"></i> @lang('admin.add')
                    </a>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">@lang('admin.services.service')</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">@lang('admin.services.utility')</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <div class="table-responsive">
                                    <table class="table table-hover-animation mb-0">
                                        <thead>
                                        <tr>
                                            <th scope="col" width="50">ID</th>
                                            <th scope="col" width="150">@lang('admin.image')</th>
                                            <th scope="col" width="700" class="text-center">@lang('admin.name')</th>
                                            <th scope="col" class="text-right">@lang('admin.actions')</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($services as $service)
                                                <tr>
                                                    <th scope="row">{{ $service->id }}</th>
                                                    <td width="50">
                                                        <img src="{{ $service->media->url ?? '' }}" style="width: 150px; height: auto" alt="{{ $service->name }}">
                                                    </td>
                                                    <td class="text-center">
                                                        {{ $service->name }}
                                                    </td>
                                                    <td class="text-right">
                                                        <a href="{{ route('dashboard.services.edit', [$service->id]) }}" class="btn btn-icon btn-warning
                                                         btn-sm" data-toggle="tooltip" data-placement="top" title="" data-original-title="@lang('admin.edit')">
                                                            <i class="fa fa-edit"></i>
                                                        </a>

                                                        <a href="{{ route('dashboard.services.destroy', $service->id) }}" onclick="return confirm('@lang('admin.are_you_sure')')"
                                                           class="btn btn-icon btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title=""
                                                           data-original-title="@lang('admin.delete')">
                                                            <i class="fa fa-trash"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @empty
                                                <div class="alert alert-primary">
                                                    <i class="feather icon-alert-octagon"></i> @lang('admin.no_data')
                                                </div>
                                            @endforelse
                                        </tbody>
                                    </table>
                                    {{ $services->links() }}
                                </div>
                            </div>
                            <div class="tab-pane fade show" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <div class="table-responsive">
                                    <table class="table table-hover-animation mb-0">
                                        <thead>
                                        <tr>
                                            <th scope="col" width="50">ID</th>
                                            <th scope="col" width="150">@lang('admin.image')</th>
                                            <th scope="col" width="700" class="text-center">@lang('admin.name')</th>
                                            <th scope="col" class="text-right">@lang('admin.actions')</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($utilities as $utility)
                                                <tr>
                                                    <th scope="row">{{ $utility->id }}</th>
                                                    <td width="50">
                                                        <img src="{{ $utility->media->url ?? '' }}" style="width: 150px; height: auto" alt="{{ $utility->name }}">
                                                    </td>
                                                    <td class="text-center">
                                                        {{ $utility->name }}
                                                    </td>
                                                    <td class="text-right">
                                                        <a href="{{ route('dashboard.services.edit', [$utility->id]) }}" class="btn btn-icon btn-warning
                                                         btn-sm" data-toggle="tooltip" data-placement="top" title="" data-original-title="@lang('admin.edit')">
                                                            <i class="fa fa-edit"></i>
                                                        </a>

                                                        <a href="{{ route('dashboard.services.destroy', $utility->id) }}" onclick="return confirm('@lang('admin.are_you_sure')')"
                                                           class="btn btn-icon btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title=""
                                                           data-original-title="@lang('admin.delete')">
                                                            <i class="fa fa-trash"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @empty
                                                <div class="alert alert-primary">
                                                    <i class="feather icon-alert-octagon"></i> @lang('admin.no_data')
                                                </div>
                                            @endforelse
                                        </tbody>
                                    </table>
                                    {{ $utilities->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
