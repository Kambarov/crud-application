@extends('dashboard.layouts.app')

@section('title', trans('admin.sliders.title').' - ')

@section('content')
    <div class="row" id="table-hover-animation">
        <div class="col-12">

            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">@lang('admin.sliders.data_table')</h4>
                    <a href="{{ route('dashboard.sliders.create', $lang) }}" class="btn btn-outline-primary btn-xs btn-icon">
                        <i class="feather icon-plus"></i> @lang('admin.add')
                    </a>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover-animation mb-0">
                                <thead>
                                <tr>
                                    <th scope="col" width="50">ID</th>
                                    <th scope="col" width="150" class="text-center">@lang('admin.image')</th>
                                    <th scope="col" width="200" class="text-center">@lang('admin.name')</th>
                                    <th scope="col" width="200" class="text-center">@lang('admin.sliders.position.title')</th>
                                    <th scope="col" width="200" class="text-center">@lang('admin.status')</th>
                                    <th scope="col" class="text-right">@lang('admin.actions')</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($sliders as $item)
                                    <tr>
                                        <th scope="row">{{ $item->id }}</th>
                                        <td class="text-center">
                                            <img src="{{ $item->desktop->url ?? '' }}" width="150" height="auto" alt="{{ $item->name }}">
                                        </td>
                                        <td class="text-center">
                                            {{ $item->name }}
                                        </td>
                                        <td class="text-center">
                                            @lang('admin.sliders.position.'.$item->type)
                                        </td>
                                        <td class="text-center">
                                            @if($item->status)
                                                <button type="button" class="btn btn-primary mr-1 mb-1">@lang('admin.activated')</button>
                                            @else
                                                <button type="button" class="btn btn-warning mr-1 mb-1">@lang('admin.deactivated')</button>
                                            @endif
                                        </td>
                                        <td class="text-right">
                                            <a href="{{ route('dashboard.sliders.edit', [$lang, $item->id]) }}" class="btn btn-icon btn-warning
                                                 btn-sm" data-toggle="tooltip" data-placement="top" title="" data-original-title="@lang('admin.edit')">
                                                <i class="fa fa-edit"></i>
                                            </a>

                                            <a href="{{ route('dashboard.sliders.destroy', $item->id) }}" onclick="return confirm('@lang('admin.are_you_sure')')"
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
                            {{ $sliders->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
