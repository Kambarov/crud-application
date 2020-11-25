@extends('dashboard.layouts.app')
@section('title', trans('admin.edit').' '.$partner->name.' - ')

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
                        <a href="{{ route('dashboard.partners.index') }}" class="btn btn-outline-primary">@lang('admin.back')</a>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form method="post" action="{{ route('dashboard.partners.update', $partner->id) }}" enctype="multipart/form-data">
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
                                                                       value="{{ old('name.ru', $partner->getTranslation('name', 'ru')) }}" required placeholder="@lang('admin.name') RU">
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
                                                                          placeholder="@lang('admin.description') RU" required id="description_ru">{{ old('description.ru', $partner->getTranslation('description', 'ru')) }}</textarea>
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
                                                                       value="{{ old('name.en', $partner->getTranslation('name', 'en')) }}" required placeholder="@lang('admin.name') EN">
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
                                                                          placeholder="@lang('admin.description') EN" required id="description_en">{{ old('description.en', $partner->getTranslation('description', 'en')) }}</textarea>
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

                                        <label>@lang('admin.image')</label>
                                        <div class="custom-file">
                                            <input id="uploadImage" class="custom-file-input" type="file" name="icon" onchange="PreviewImage();" />
                                            <label class="custom-file-label">@lang('admin.only_types')</label>
                                        </div>
                                        <br><br>
                                        <div class="text-center">
                                            <img id="uploadPreview" style="width: 200px; height: auto" src="{{ $partner->media->url ?? '' }}" />
                                        </div>

                                        <label>@lang('admin.partners.catalog')</label>
                                        <div class="custom-file">
                                            <input id="uploadImage1" class="custom-file-input" type="file" name="catalog" onchange="PreviewImage1();" />
                                            <label class="custom-file-label">@lang('admin.catalog_only_types')</label>
                                        </div>
                                        <br><br>
                                        <div class="text-center">
                                            <img id="uploadPreview1" style="width: 200px; height: auto" />
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
                callbacks: {
                    onImageUpload: function (files) {
                        var that = $(this);

                        // sendFile(files[0], that);
                    }
                }
            });

            $('#description_en').summernote({
                height: 300,
                callbacks: {
                    onImageUpload: function (files) {
                        var that = $(this);

                        // sendFile(files[0], that);
                    }
                }
            });


            {{--function sendFile(file, that) {--}}
            {{--    // console.log(that);--}}
            {{--    // console.log(welEditable);--}}
            {{--    // console.log(1);--}}

            {{--    let data = new FormData();--}}
            {{--    data.append('file', file);--}}

            {{--    $.ajax({--}}
            {{--        url: "{{ route('dashboard.partners.image_upload') }}",--}}
            {{--        data: data,--}}
            {{--        cache: false,--}}
            {{--        contentType: false,--}}
            {{--        processData: false,--}}
            {{--        type: 'POST',--}}
            {{--        success: function (data) {--}}
            {{--            $(that).summernote('insertImage', location.origin+'/'+data.image, '')--}}
            {{--        },--}}

            {{--        error: function (data) {--}}

            {{--        }--}}
            {{--    })--}}

            {{--}--}}
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


        function PreviewImage1() {
            var oFReader = new FileReader();
            oFReader.readAsDataURL(document.getElementById("uploadImage1").files[0]);

            oFReader.onload = function (oFREvent) {
                document.getElementById("uploadPreview1").src = oFREvent.target.result;
            };
        }
    </script>
@endpush
