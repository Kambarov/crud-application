@extends('dashboard.layouts.app')
@section('title', trans('admin.edit').' '.$page->getTranslation('name', 'ru').' - ')

@push('css')
    <link href="{{ asset('vendor/editor/dist/summernote.min.css') }}" rel="stylesheet">
@endpush

@section('content')
    <section class="input-validation">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">@lang('admin.edit')</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form method="post" action="{{ route('dashboard.pages.edit', $page->id) }}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-12">

                                        <div class="controls">

                                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Ru</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="en-tab" data-toggle="tab" href="#en" role="tab" aria-controls="en" aria-selected="false">En</a>
                                                </li>
                                            </ul>

                                            <div class="tab-content" id="myTabContent">
                                                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                                    <label>@lang('admin.name') RU</label>
                                                    <div class="controls">
                                                        <fieldset class="form-group position-relative has-icon-left input-divider-left">
                                                            <input type="text" name="name[ru]" class="form-control @error('name.ru') is-invalid @enderror"
                                                                   value="{{ old('name.ru', $page->getTranslation('name', 'ru')) }}" required placeholder="@lang('admin.name') RU">
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
                                                                      placeholder="@lang('admin.description') RU" required id="description_ru">{{ old('description.ru', $page->getTranslation('description', 'ru')) }}</textarea>
                                                        </fieldset>
                                                        @error('description.ru')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="tab-pane fade" id="en" role="tabpanel" aria-labelledby="en-tab">
                                                    <label>@lang('admin.name') EN</label>
                                                    <div class="controls">
                                                        <fieldset class="form-group position-relative has-icon-left input-divider-left">
                                                            <input type="text" name="name[en]" class="form-control @error('name.en') is-invalid @enderror"
                                                                   value="{{ old('name.en', $page->getTranslation('name', 'en')) }}" required placeholder="@lang('admin.name') EN">
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
                                                                      placeholder="@lang('admin.description') EN" required id="description_en">{{ old('description.en', $page->getTranslation('description', 'en')) }}</textarea>
                                                        </fieldset>
                                                        @error('description.en')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <label>@lang('admin.image')</label>
                                            <div class="custom-file">
                                                <input id="uploadImage" class="custom-file-input" type="file" name="image" onchange="PreviewImage();" />
                                                <label class="custom-file-label">@lang('admin.only_types')</label>
                                            </div>
                                            <br><br>
                                            <div class="text-center">
                                                <img id="uploadPreview" style="width: 200px; height: auto" src="{{ $page->media->url }}" />
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
@push('js')

    <script src="{{ asset('vendor/editor/dist/summernote.min.js') }}"></script>

    <script>
        $(document).ready(function () {

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
