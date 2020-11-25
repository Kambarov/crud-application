@extends('dashboard.layouts.app')

@section('title', trans('admin.view').' '.$feedback->name.' - ')

@section('content')
    <section class="input-validation">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-name">@lang('admin.edit')</h4>
                        <a href="{{ route('dashboard.feedback.index', $feedback->type) }}" class="btn btn-outline-primary">@lang('admin.back')</a>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form method="post" action="{{ route('dashboard.feedback.update', $feedback->id) }}">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-12">

                                        @if($feedback->vacancy()->exists())
                                            <a href="{{ $feedback->media->url }}" target="_blank">
                                                Посмотреть файл
                                            </a>
                                            <br>
                                        @else
                                            <label>@lang('admin.feedback.name')</label>
                                            <div class="controls">
                                                <fieldset class="form-group position-relative has-icon-left input-divider-left">
                                                    <input type="text" class="form-control"
                                                           value="{{ $feedback->name }}" disabled>
                                                    <div class="form-control-position">
                                                        <i class="feather icon-help-circle"></i>
                                                    </div>
                                                </fieldset>
                                            </div>

                                            <label>@lang('admin.settings.phone')</label>
                                            <div class="controls">
                                                <fieldset class="form-group position-relative has-icon-left input-divider-left">
                                                    <input type="text" class="form-control" disabled
                                                           value="{{ $feedback->phone }}">
                                                    <div class="form-control-position">
                                                        <i class="feather icon-phone-call"></i>
                                                    </div>
                                                </fieldset>
                                            </div>

                                            @if($feedback->email)
                                                <label>@lang('admin.email')</label>
                                                <div class="controls">
                                                    <fieldset class="form-group position-relative has-icon-left input-divider-left">
                                                        <input type="text" class="form-control" disabled
                                                               value="{{ $feedback->email }}">
                                                        <div class="form-control-position">
                                                            <i class="feather icon-mail"></i>
                                                        </div>
                                                    </fieldset>
                                                </div>
                                            @endif

                                            <label>@lang('admin.feedback.message')</label>
                                            <div class="controls">
                                                <fieldset class="form-group position-relative">
                                                    <textarea class="form-control" id="description_ru" disabled>{{ $feedback->message }}</textarea>
                                                </fieldset>
                                            </div>
                                        @endif

                                        @if($feedback->product()->exists())
                                            <label>@lang('admin.products.title')</label>
                                            <a href="{{ route('site.products.view', [$feedback->product->partner->slug, $feedback->product->id, $feedback->product->slug]) }}"
                                                target="_blank">{{ $feedback->product->name }}</a>
                                            <br>
                                        @endif

                                        <label>@lang('admin.feedback.comment')</label>
                                        <div class="controls">
                                            <fieldset class="form-group position-relative">
                                                <textarea class="form-control" name="comment">{{ old('comment', $feedback->comment) }}</textarea>
                                            </fieldset>
                                        </div>

                                        <fieldset>
                                            <div class="vs-checkbox-con vs-checkbox-primary">
                                                <input type="checkbox" name="status" value="closed">
                                                <span class="vs-checkbox">
                                                    <span class="vs-checkbox--check">
                                                        <i class="vs-icon feather icon-check"></i>
                                                    </span>
                                                </span>
                                                <span class="">@lang('admin.feedback.closed')</span>
                                            </div>
                                        </fieldset>
                                        <br>

                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">@lang('admin.save')</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
