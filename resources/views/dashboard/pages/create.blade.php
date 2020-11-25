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
                        <h4 class="card-title">@lang('admin.add')</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form method="post" action="{{ route('dashboard.pages.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">

                                        <div class="controls">

                                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Ru</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Uz</a>
                                                </li>
                                            </ul>

                                            <div class="tab-content" id="myTabContent">
                                                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                                    <label>@lang('admin.pages.title') RU</label>
                                                    <div class="controls">
                                                        <fieldset class="form-group position-relative has-icon-left input-divider-left">
                                                            <input type="text" name="title[ru]" class="form-control @error('title.ru') is-invalid @enderror"
                                                                   value="{{ old('title.ru') }}" placeholder="@lang('admin.pages.title') RU">
                                                            <div class="form-control-position">
                                                                <i class="feather icon-help-circle"></i>
                                                            </div>
                                                        </fieldset>
                                                        @error('title.ru')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                        @enderror
                                                    </div>

                                                    <label>@lang('admin.name') RU</label>
                                                    <div class="controls">
                                                        <fieldset class="form-group position-relative has-icon-left input-divider-left">
                                                            <input type="text" name="name[ru]" class="form-control @error('name.ru') is-invalid @enderror"
                                                                   value="{{ old('name.ru') }}" placeholder="@lang('admin.name') RU">
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
                                                                      placeholder="@lang('admin.description') RU">{{ old('description.ru') }}</textarea>
                                                        </fieldset>
                                                        @error('description.ru')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                        @enderror
                                                    </div>

                                                    <label>@lang('admin.body') RU</label>
                                                    <div class="controls">
                                                        <fieldset class="form-group position-relative">
                                                            <textarea class="form-control @error('body.ru') is-invalid @enderror" name="body[ru]"
                                                                      placeholder="@lang('admin.body') RU" id="body_ru">{{ old('body.ru') }}</textarea>
                                                        </fieldset>
                                                        @error('body.ru')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                                    <label>@lang('admin.pages.title') UZ</label>
                                                    <div class="controls">
                                                        <fieldset class="form-group position-relative has-icon-left input-divider-left">
                                                            <input type="text" name="title[uz]" class="form-control @error('title.uz') is-invalid @enderror"
                                                                   value="{{ old('title.uz') }}" placeholder="@lang('admin.pages.title') UZ">
                                                            <div class="form-control-position">
                                                                <i class="feather icon-help-circle"></i>
                                                            </div>
                                                        </fieldset>
                                                        @error('title.uz')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                        @enderror
                                                    </div>

                                                    <label>@lang('admin.name') UZ</label>
                                                    <div class="controls">
                                                        <fieldset class="form-group position-relative has-icon-left input-divider-left">
                                                            <input type="text" name="name[uz]" class="form-control @error('name.uz') is-invalid @enderror"
                                                                   value="{{ old('name.uz') }}" placeholder="@lang('admin.name') UZ">
                                                            <div class="form-control-position">
                                                                <i class="feather icon-help-circle"></i>
                                                            </div>
                                                        </fieldset>
                                                        @error('name.uz')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                        @enderror
                                                    </div>

                                                    <label>@lang('admin.description') UZ</label>
                                                    <div class="controls">
                                                        <fieldset class="form-group position-relative">
                                                            <textarea class="form-control @error('description.uz') is-invalid @enderror" name="description[uz]"
                                                                      placeholder="@lang('admin.description') UZ">{{ old('description.uz') }}</textarea>
                                                        </fieldset>
                                                        @error('description.uz')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                        @enderror
                                                    </div>

                                                    <label>@lang('admin.body') UZ</label>
                                                    <div class="controls">
                                                        <fieldset class="form-group position-relative">
                                                            <textarea class="form-control @error('body.uz') is-invalid @enderror" name="body[uz]"
                                                                      placeholder="@lang('admin.body') UZ" id="body_uz">{{ old('body.uz') }}</textarea>
                                                        </fieldset>
                                                        @error('body.uz')
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
                                                <img id="uploadPreview" style="width: 200px; height: auto" />
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

            $('#body_ru').summernote({
                height: 300,
                callbacks: {
                    onImageUpload: function (files) {
                        var that = $(this);

                        sendFile(files[0], that);
                    }
                }
            });

            $('#body_uz').summernote({
                height: 300,
                callbacks: {
                    onImageUpload: function (files) {
                        var that = $(this);

                        sendFile(files[0], that);
                    }
                }
            });

            function sendFile(file, that) {
                // console.log(that);
                // console.log(welEditable);
                // console.log(1);

                let data = new FormData();
                data.append('file', file);

                $.ajax({
                    url: "{{ route('dashboard.pages.image_upload') }}",
                    data: data,
                    cache: false,
                    contentType: false,
                    processData: false,
                    type: 'POST',
                    success: function (data) {
                        $(that).summernote('insertImage', location.origin+'/'+data.image, '')
                    },

                    error: function (data) {

                    }
                })

            }
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
