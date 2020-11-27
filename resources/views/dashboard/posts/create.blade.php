@extends('dashboard.layouts.app')
@section('title', trans('admin.add').' - ')

@push('css')
    <link href="{{ asset('vendor/editor/dist/summernote.min.css') }}" rel="stylesheet">
@endpush

@section('content')
    <section class="input-validation">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-name">@lang('admin.add')</h4>
                        <a href="{{ route('dashboard.posts.index') }}" class="btn btn-outline-primary">@lang('admin.back')</a>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form method="post" action="{{ route('dashboard.posts.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">

                                        <div class="controls">

                                            <div id="sub_ceo" class="controls">
                                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                                    <li class="nav-item">
                                                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Ru</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">En</a>
                                                    </li>
                                                </ul>

                                                <div class="tab-content" id="myTabContent">
                                                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                                        <label>@lang('admin.name') RU</label>
                                                        <div class="controls">
                                                            <fieldset class="form-group position-relative has-icon-left input-divider-left">
                                                                <input type="text" name="name[ru]" class="form-control @error('name.ru') is-invalid @enderror"
                                                                       value="{{ old('name.ru') }}"  placeholder="@lang('admin.name') RU">
                                                                <div class="form-control-position">
                                                                    <i class="feather icon-help-circle"></i>
                                                                </div>
                                                            </fieldset>
                                                            @error('name.ru')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                            @enderror
                                                        </div>

                                                        <label>@lang('admin.description') RU</label>
                                                        <div class="controls">
                                                            <fieldset class="form-group position-relative">
                                                                <textarea class="form-control @error('description.ru') is-invalid @enderror" name="description[ru]"
                                                                          placeholder="@lang('admin.description') RU"  id="description_ru">{{ old('description.ru') }}</textarea>
                                                            </fieldset>
                                                            @error('description.ru')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                                        <label>@lang('admin.name') EN</label>
                                                        <div class="controls">
                                                            <fieldset class="form-group position-relative has-icon-left input-divider-left">
                                                                <input type="text" name="name[en]" class="form-control @error('name.en') is-invalid @enderror"
                                                                       value="{{ old('name.en') }}"  placeholder="@lang('admin.name') EN">
                                                                <div class="form-control-position">
                                                                    <i class="feather icon-help-circle"></i>
                                                                </div>
                                                            </fieldset>
                                                            @error('name.en')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                            @enderror
                                                        </div>

                                                        <label>@lang('admin.description') EN</label>
                                                        <div class="controls">
                                                            <fieldset class="form-group position-relative">
                                                                <textarea class="form-control @error('description.en') is-invalid @enderror" name="description[en]"
                                                                          placeholder="@lang('admin.description') EN"  id="description_en">{{ old('description.en') }}</textarea>
                                                            </fieldset>
                                                            @error('description.en')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="controls">
                                            <button id="send_to_telegram" type="button" class="btn btn-outline-primary">@lang('admin.posts.send_to_telegram')</button>
                                            <button id="remove" type="button" class="btn btn-outline-danger">@lang('admin.posts.remove')</button>

                                            <br>
                                            <br>
                                            <div id="telegram_section" class="controls">
                                                <div class="controls">
                                                    <label>@lang('admin.posts.chat_id')</label>
                                                    <fieldset class="form-group position-relative has-icon-left input-divider-left">
                                                        <input type="number" name="chat_id" class="form-control @error('chat_id') is-invalid @enderror"
                                                               value="{{ old('chat_id') }}" placeholder="@lang('admin.posts.chat_id')">
                                                        <div class="form-control-position">
                                                            <i class="feather icon-link"></i>
                                                        </div>
                                                    </fieldset>
                                                    @error('chat_id')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                                <div class="controls">
                                                    <label>@lang('admin.posts.bot_token')</label>
                                                    <fieldset class="form-group position-relative has-icon-left input-divider-left">
                                                        <input type="text" name="bot_token" class="form-control @error('bot_token') is-invalid @enderror"
                                                               value="{{ old('bot_token') }}" placeholder="@lang('admin.posts.bot_token')">
                                                        <div class="form-control-position">
                                                            <i class="feather icon-zap"></i>
                                                        </div>
                                                    </fieldset>
                                                    @error('bot_token')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>

                                                <br>
                                            </div>
                                        </div>

                                        <label>@lang('admin.image')</label>
                                        <div class="custom-file">
                                            <input id="uploadImage"  class="custom-file-input" type="file" name="image" onchange="PreviewImage();" />
                                            <label class="custom-file-label">@lang('admin.only_types')</label>
                                        </div>
                                        <br><br>
                                        <div class="text-center">
                                            <img id="uploadPreview" style="width: 200px; height: auto" />
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

@push('js')

    <script src="{{ asset('vendor/editor/dist/summernote.min.js') }}"></script>

    <script>
        $(document).ready(function () {
            $('#telegram_section').hide();
            $('#remove').hide();
            $('#send_to_telegram').show();

            $('#send_to_telegram').click(function () {
                $('#telegram_section').show();
                $('#remove').show();
                $('#send_to_telegram').hide();
            });

            $('#remove').click(function () {
                $('#telegram_section').hide();
                $('#remove').hide();
                $('#send_to_telegram').show();
            });

            $('#description_ru').summernote({
                height: 300,
            });

            $('#description_en').summernote({
                height: 300,
            });
        });
    </script>

    <script>
        function PreviewImage() {
            var oFReader = new FileReader();
            oFReader.readAsDataURL(document.getElementById("uploadImage").files[0]);

            oFReader.onload = function (oFREvent) {
                document.getElementById("uploadPreview").src = oFREvent.target.result;
            };
        }
    </script>
@endpush
