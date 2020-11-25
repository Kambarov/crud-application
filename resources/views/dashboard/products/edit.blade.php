@extends('dashboard.layouts.app')
@section('title', trans('admin.edit').' '.$product->name.' - ')

@push('css')
    <link href="{{ asset('vendor/editor/dist/summernote.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/vendor/dashboard/app-assets/vendors/css/forms/select/select2.min.css">
@endpush

@section('content')
    <section class="input-validation">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-name">@lang('admin.edit')</h4>
                        <a href="{{ route('dashboard.products.index') }}" class="btn btn-outline-primary">@lang('admin.back')</a>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form method="post" action="{{ route('dashboard.products.update', $product->id) }}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-12">

                                        <div class="controls">

                                            <div id="sub_ceo" class="controls">
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
                                                                       value="{{ old('name.ru', $product->getTranslation('name', 'ru')) }}" required placeholder="@lang('admin.name') RU">
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
                                                                          placeholder="@lang('admin.description') RU" required>{{ old('description.ru', $product->getTranslation('description', 'ru')) }}</textarea>
                                                            </fieldset>
                                                            @error('description.ru')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                            @enderror
                                                        </div>

                                                        <label>@lang('admin.products.brief_description') RU</label>
                                                        <div class="controls">
                                                            <fieldset class="form-group position-relative">
                                                                <textarea class="form-control @error('brief_description.ru') is-invalid @enderror" name="brief_description[ru]"
                                                                          placeholder="@lang('admin.products.brief_description') RU" required id="settings_ru">{{ old('brief_description.ru', $product->getTranslation('brief_description', 'ru')) }}</textarea>
                                                            </fieldset>
                                                            @error('brief_description.ru')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                            @enderror
                                                        </div>

                                                        <label>@lang('admin.products.characteristics') RU</label>
                                                        <div class="controls">
                                                            <fieldset class="form-group position-relative">
                                                                <textarea class="form-control @error('characteristics.ru') is-invalid @enderror" name="characteristics[ru]"
                                                                          placeholder="@lang('admin.products.characteristics') RU" required id="characteristics_ru">{{ old('characteristics.ru', $product->getTranslation('characteristics', 'ru')) }}</textarea>
                                                            </fieldset>
                                                            @error('characteristics.ru')
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
                                                                       value="{{ old('name.en', $product->getTranslation('name', 'en')) }}" required placeholder="@lang('admin.name') EN">
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
                                                                          placeholder="@lang('admin.description') EN" required>{{ old('description.en', $product->getTranslation('description', 'en')) }}</textarea>
                                                            </fieldset>
                                                            @error('description.en')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                            @enderror
                                                        </div>

                                                        <label>@lang('admin.products.brief_description') EN</label>
                                                        <div class="controls">
                                                            <fieldset class="form-group position-relative">
                                                                <textarea class="form-control @error('brief_description.en') is-invalid @enderror" name="brief_description[en]"
                                                                          placeholder="@lang('admin.products.brief_description') EN" required id="settings_en">{{ old('brief_description.en', $product->getTranslation('brief_description', 'en')) }}</textarea>
                                                            </fieldset>
                                                            @error('brief_description.en')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                            @enderror
                                                        </div>

                                                        <label>@lang('admin.products.characteristics') EN</label>
                                                        <div class="controls">
                                                            <fieldset class="form-group position-relative">
                                                                <textarea class="form-control @error('characteristics.uz') is-invalid @enderror" name="characteristics[en]"
                                                                          placeholder="@lang('admin.products.characteristics') EN" required id="characteristics_en">{{ old('characteristics.en', $product->getTranslation('characteristics', 'en')) }}</textarea>
                                                            </fieldset>
                                                            @error('characteristics.en')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <label>@lang('admin.products.video_link')</label>
                                        <div class="controls">
                                            <fieldset class="form-group position-relative has-icon-left input-divider-left">
                                                <input type="text" name="video_link" class="form-control @error('video_link') is-invalid @enderror"
                                                       value="{{ old('video_link', $product->video_link) }}" placeholder="@lang('admin.products.video_link')">
                                                <div class="form-control-position">
                                                    <i class="feather icon-video"></i>
                                                </div>
                                            </fieldset>
                                            @error('video_link')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                        <label>@lang('admin.partners.title')</label>
                                        <fieldset class="form-group">
                                            <select class="select2 form-control" required name="partner_id">
                                                <option disabled selected>@lang('admin.products.choose_partner')</option>
                                                @foreach($partners as $partner)
                                                    <option value="{{ $partner->id }}" {{ $product->partner_id == $partner->id ? 'selected' : '' }}>{{ $partner->name }}</option>
                                                @endforeach
                                            </select>
                                        </fieldset>

                                        <label>@lang('admin.image')</label>
                                        <div class="custom-file">
                                            <input id="uploadImage" class="custom-file-input" type="file" name="image" onchange="PreviewImage();" />
                                            <label class="custom-file-label">@lang('admin.only_types')</label>
                                        </div>
                                        <br><br>
                                        <div class="text-center">
                                            <img id="uploadPreview" style="width: 200px; height: auto" src="{{ $product->media->url ?? '' }}" />
                                        </div>

                                        <label>@lang('admin.icon')</label>
                                        <div class="custom-file">
                                            <input id="uploadImage1" class="custom-file-input" type="file" name="icon" onchange="PreviewImage1();" />
                                            <label class="custom-file-label">@lang('admin.only_types')</label>
                                        </div>
                                        <br><br>
                                        <div class="text-center">
                                            <img id="uploadPreview1" style="width: 200px; height: auto" src="{{ $product->icon->url ?? '' }}" />
                                        </div>

                                        <label>@lang('admin.products.gallery')</label>
                                        <div class="form-group">
                                            <input type="file" class="form-control" multiple name="images[]">
                                        </div>

                                        <br>
                                        <div class="row">
                                            @foreach($product->images as $gallery)
                                                <div class="col-lg-4 col-md-6 col-sm-12">
                                                    <div class="card border-primary text-center bg-transparent">
                                                        <div class="card-content">
                                                            <div class="card-title">
                                                                <img src="{{ $gallery->url }}" width="200" class="mt-3 pl-2">
                                                            </div>
                                                            <div class="card-body">
                                                                <a href="{{ route('dashboard.products.gallery.delete', $gallery->id) }}" data-method="delete" class="btn btn-icon btn-danger">
                                                                    <i class="feather icon-trash-2"></i> Удалить
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
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

    <script src="/vendor/dashboard/app-assets/vendors/js/forms/select/select2.full.min.js"></script>
    <script src="/vendor/dashboard/app-assets/js/scripts/forms/select/form-select2.js"></script>
    <script>
        $(document).ready(function () {

            $('#settings_ru').summernote({
                height: 300,
            });

            $('#settings_en').summernote({
                height: 300,
            });

            $('#characteristics_ru').summernote({
                height: 300,
            });

            $('#characteristics_en').summernote({
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

    <script>
        function PreviewImage1() {
            var oFReader = new FileReader();
            oFReader.readAsDataURL(document.getElementById("uploadImage1").files[0]);

            oFReader.onload = function (oFREvent) {
                document.getElementById("uploadPreview1").src = oFREvent.target.result;
            };
        }
    </script>
@endpush
