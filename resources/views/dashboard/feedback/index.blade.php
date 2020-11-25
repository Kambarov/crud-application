@extends('dashboard.layouts.app')

@section('title', trans("admin.$type.title").' - ')

@section('content')
    <div class="row" id="table-hover-animation">
        <div class="col-12">

            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">@lang("admin.$type.data_table")</h4>
{{--                    <a href="{{ route('dashboard.feedback.create') }}" class="btn btn-outline-primary btn-xs btn-icon">--}}
{{--                        <i class="feather icon-plus"></i> @lang('admin.add')--}}
{{--                    </a>--}}
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover-animation mb-0">
                                <thead>
                                <tr>
                                    <th scope="col" width="50">ID</th>
                                    {{--                                    <th scope="col" width="50">@lang('admin.image')</th>--}}
                                    <th scope="col" class="text-center">@lang('admin.name')</th>
                                    <th scope="col" class="text-center">@lang('admin.settings.phone')</th>
                                    <th scope="col" class="text-center">@lang('admin.email')</th>
                                    <th scope="col" class="text-center">@lang('admin.status')</th>
                                    <th scope="col" class="text-right">@lang('admin.actions')</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($feedback as $item)
                                    <tr>
                                        <th scope="row">{{ $item->id }}</th>
                                        <td class="text-center">
                                            {{ $item->name ?? 'Резюме' }}
                                        </td>
                                        <td class="text-center">
                                            {{ $item->phone ?? 'Резюме' }}
                                        </td>
                                        <td class="text-center">
                                            {{ $item->email ?? trans('admin.feedback.no_email') }}
                                        </td>
                                        <td class="text-center">
                                            @switch($item->status)
                                                @case('new')
                                                    <button type="button" class="btn btn-info mr-1 mb-1">
                                                        <i class="fa fa-star"></i>
                                                        @lang('admin.feedback.new')
                                                    </button>
                                                @break
                                                @case('viewed')
                                                    <button type="button" class="btn btn-warning mr-1 mb-1">
                                                        <i class="fa fa-eye-slash"></i>
                                                        @lang('admin.feedback.viewed')
                                                    </button>
                                                @break
                                                @case('closed')
                                                    <button type="button" class="btn btn-success mr-1 mb-1">
                                                        <i class="fa fa-check-circle"></i>
                                                        @lang('admin.feedback.closed')
                                                    </button>
                                                @break
                                            @endswitch
                                        </td>
                                        <td class="text-right">
                                            <a href="{{ route('dashboard.feedback.edit', [$item->id]) }}" class="btn btn-icon btn-warning
                                                 btn-sm" data-toggle="tooltip" data-placement="top" title="" data-original-title="@lang('admin.edit')">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <a href="{{ route('dashboard.feedback.destroy', $item->id) }}" onclick="return confirm('@lang('admin.are_you_sure')')"
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

                                {{ $feedback->links() }}
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
