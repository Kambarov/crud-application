@extends('dashboard.layouts.app')

@section('title', trans('admin.news.title').' - ')

@section('content')
    <div class="row" id="table-hover-animation">
        <div class="col-12">

            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">@lang('admin.news.data_table')</h4>
                    <a href="{{ route('dashboard.news.create') }}" class="btn btn-outline-primary btn-xs btn-icon">
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
                                    <th scope="col" width="150">@lang('admin.image')</th>
                                    <th scope="col" width="200" class="text-center">@lang('admin.name')</th>
                                    <th scope="col" class="text-right">@lang('admin.actions')</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(count($news) == 0)
                                    <div class="alert alert-primary">
                                        <i class="feather icon-alert-octagon"></i> @lang('admin.no_data')
                                    </div>
                                @else
                                    @foreach($news as $item)
                                        <tr>
                                            <th scope="row">{{ $item->id }}</th>
                                            <td width="150">
                                                <img src="{{ $item->media->url }}" style="width: 150px; height: auto" alt="{{ $item->name }}">
                                            </td>
                                            <td class="text-center">
                                                {{ $item->name }}
                                            </td>
                                            <td class="text-right">
                                                <a href="{{ route('dashboard.news.edit', [$item->id]) }}" class="btn btn-icon btn-warning
                                                 btn-sm" data-toggle="tooltip" data-placement="top" title="" data-original-title="@lang('admin.edit')">
                                                    <i class="fa fa-edit"></i>
                                                </a>

                                                <a href="{{ route('dashboard.news.destroy', $item->id) }}" onclick="return confirm('@lang('admin.are_you_sure')')"
                                                   class="btn btn-icon btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title=""
                                                   data-original-title="@lang('admin.delete')">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                            {{ $news->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
