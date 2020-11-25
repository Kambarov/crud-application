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
                        <a href="{{ route('dashboard.vacancies.index') }}" class="btn btn-outline-primary">@lang('admin.back')</a>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form method="post" action="{{ route('dashboard.vacancies.store') }}">
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
                                                        <a class="nav-link" id="en-tab" data-toggle="tab" href="#en" role="tab" aria-controls="en" aria-selected="false">EN</a>
                                                    </li>
                                                </ul>

                                                <div class="tab-content" id="myTabContent">
                                                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                                        <label>@lang('admin.name') RU</label>
                                                        <div class="controls">
                                                            <fieldset class="form-group position-relative has-icon-left input-divider-left">
                                                                <input type="text" name="name[ru]" class="form-control @error('name.ru') is-invalid @enderror"
                                                                       value="{{ old('name.ru') }}" required placeholder="@lang('admin.name') RU">
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
                                                                          placeholder="@lang('admin.description') RU" required id="description_ru">{{ old('description.ru') }}</textarea>
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
                                                                       value="{{ old('name.en') }}" placeholder="@lang('admin.name') EN" required>
                                                                <div class="form-control-position">
                                                                    <i class="feather icon-user"></i>
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
                                                                      placeholder="@lang('admin.description') EN" id="description_en" required>{{ old('description.en') }}</textarea>
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
                                            <fieldset>
                                                <div class="vs-checkbox-con vs-checkbox-primary">
                                                    <input type="checkbox" name="status" value="1">
                                                    <span class="vs-checkbox">
                                                            <span class="vs-checkbox--check">
                                                                <i class="vs-icon feather icon-check"></i>
                                                            </span>
                                                        </span>
                                                    <span class="">@lang('admin.publish')</span>
                                                </div>
                                            </fieldset>
                                            <br>
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

            {{--function sendFile(file, that) {--}}
            {{--    // console.log(that);--}}
            {{--    // console.log(welEditable);--}}
            {{--    // console.log(1);--}}

            {{--    let data = new FormData();--}}
            {{--    data.append('file', file);--}}

            {{--    $.ajax({--}}
            {{--        url: "{{ route('dashboard.pages.image_upload') }}",--}}
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
@endpush
