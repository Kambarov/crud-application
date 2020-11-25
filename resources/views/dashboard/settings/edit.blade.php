@extends('dashboard.layouts.app')
@section('title', trans('admin.edit'). ' '. trans('admin.settings.title') .' - ')

@section('content')
    <section class="input-validation">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">@lang('admin.edit')</h4>
                        <a href="{{ route('dashboard') }}" class="btn btn-outline-primary">@lang('admin.back')</a>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form method="post" action="{{ route('dashboard.settings.edit', $setting->id) }}">
                                @csrf
                                @method('PUT')
                                <div class="row">

                                    <div class="col-md-6">
                                        <label>@lang('admin.settings.phone') 1</label>
                                        <div class="controls">
                                            <fieldset class="form-group position-relative has-icon-left input-divider-left">
                                                <input type="text" name="phone[default]" required class="form-control @error('phone.default') is-invalid @enderror"
                                                   value="{{ old('phone.default', $setting->getPhoneDefault()) }}" placeholder="@lang('admin.settings.phone') 1">
                                                <div class="form-control-position">
                                                    <i class="feather icon-phone"></i>
                                                </div>
                                            </fieldset>
                                            @error('phone.default')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label>@lang('admin.settings.phone') 2</label>
                                        <div class="controls">
                                            <fieldset class="form-group position-relative has-icon-left input-divider-left">
                                                <input type="text" name="phone[other]" required class="form-control @error('phone.other') is-invalid @enderror"
                                                       value="{{ old('phone.other', $setting->getPhoneOther()) }}" placeholder="@lang('admin.settings.phone') 2">
                                                <div class="form-control-position">
                                                    <i class="feather icon-phone"></i>
                                                </div>
                                            </fieldset>
                                            @error('phone.other')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <label>@lang('admin.email')</label>
                                        <div class="controls">
                                            <fieldset class="form-group position-relative has-icon-left input-divider-left">
                                                <input type="text" name="socials[email]" class="form-control @error('socials.email') is-invalid @enderror"
                                                   value="{{ old('socials.email', $setting->getEmail()) }}"
                                                       placeholder="@lang('admin.email')" required>
                                                <div class="form-control-position">
                                                    <i class="feather icon-mail"></i>
                                                </div>
                                            </fieldset>
                                            @error('socials.email')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label>@lang('admin.settings.link') Telegram</label>
                                        <div class="controls">
                                            <fieldset class="form-group position-relative has-icon-left input-divider-left">
                                                <input type="text" name="socials[telegram]" class="form-control @error('socials.telegram') is-invalid @enderror"
                                                       value="{{ old('socials.telegram', $setting->getSocialsTg()) }}"
                                                       placeholder="@lang('admin.settings.link') Telegram" required>
                                                <div class="form-control-position">
                                                    <i class="feather icon-send"></i>
                                                </div>
                                            </fieldset>
                                            @error('socials.telegram')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label>@lang('admin.settings.link') Instagram</label>
                                        <div class="controls">
                                            <fieldset class="form-group position-relative has-icon-left input-divider-left">
                                                <input type="text" name="socials[instagram]" class="form-control @error('socials.instagram') is-invalid @enderror"
                                                       value="{{ old('socials.instagram', $setting->getSocialsInsta()) }}"
                                                       placeholder="@lang('admin.settings.link') Instagram" required>
                                                <div class="form-control-position">
                                                    <i class="feather icon-instagram"></i>
                                                </div>
                                            </fieldset>
                                            @error('socials.instagram')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label>@lang('admin.settings.link') LinkedIn</label>
                                        <div class="controls">
                                            <fieldset class="form-group position-relative has-icon-left input-divider-left">
                                                <input type="text" name="socials[linkedIn]" class="form-control @error('socials.linkedIn') is-invalid @enderror"
                                                       value="{{ old('socials.linkedIn', $setting->getSocialsLinkedIn()) }}"
                                                       placeholder="@lang('admin.settings.link') LinkedIn" required>
                                                <div class="form-control-position">
                                                    <i class="feather icon-linkedin"></i>
                                                </div>
                                            </fieldset>
                                            @error('socials.linkedIn')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <label>@lang('admin.settings.location')</label>
                                        <div class="controls">
                                            <fieldset class="form-group position-relative has-icon-left input-divider-left">
                                                <input type="text" name="location" class="form-control @error('location') is-invalid @enderror"
                                                       value="{{ old('location', $setting->location) }}" placeholder="@lang('admin.settings.location')" required>
                                                <div class="form-control-position">
                                                    <i class="feather icon-map"></i>
                                                </div>
                                            </fieldset>
                                            @error('location')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Ru</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="en-tab" data-toggle="tab" href="#en" role="tab" aria-controls="en" aria-selected="false">EN</a>
                                            </li>
                                        </ul>

                                        <div class="tab-content" id="myTabContent">
                                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                                <label>@lang('admin.settings.address') RU</label>
                                                <div class="controls">
                                                    <fieldset class="form-group position-relative">
                                                                <textarea class="form-control @error('address.ru') is-invalid @enderror" name="address[ru]"
                                                                          placeholder="@lang('admin.settings.address') RU" required>{{ old('address.ru', $setting->getTranslation('address', 'ru')) }}</textarea>
                                                    </fieldset>
                                                    @error('address.ru')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="tab-pane fade" id="en" role="tabpanel" aria-labelledby="en-tab">
                                                <label>@lang('admin.settings.address') EN</label>
                                                <div class="controls">
                                                    <fieldset class="form-group position-relative">
                                                                <textarea class="form-control @error('address.uz') is-invalid @enderror" name="address[en]"
                                                                          placeholder="@lang('admin.settings.address') EN" required>{{ old('address.en', $setting->getTranslation('address', 'en')) }}</textarea>
                                                    </fieldset>
                                                    @error('address.en')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>

                                        </div>
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
