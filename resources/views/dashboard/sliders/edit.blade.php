@extends('dashboard.layouts.app')
@section('title', trans('admin.edit').' '.$slider->name.' - ')

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
                        <a href="{{ route('dashboard.sliders.index', $lang) }}" class="btn btn-outline-primary">@lang('admin.back')</a>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form method="post" action="{{ route('dashboard.sliders.update', $slider->id) }}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-12">

                                        <div class="controls">
                                            <label>@lang('admin.name') RU</label>
                                            <div class="controls">
                                                <fieldset class="form-group position-relative has-icon-left input-divider-left">
                                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                                           value="{{ old('name', $slider->name) }}" required placeholder="@lang('admin.name')">
                                                    <div class="form-control-position">
                                                        <i class="feather icon-help-circle"></i>
                                                    </div>
                                                </fieldset>
                                                @error('name')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>

                                            <label>@lang('admin.description')</label>
                                            <div class="controls">
                                                <fieldset class="form-group position-relative">
                                                    <textarea class="form-control @error('description') is-invalid @enderror" name="description"
                                                              placeholder="@lang('admin.description')" required>{{ old('description', $slider->description) }}</textarea>
                                                </fieldset>
                                                @error('description')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <input type="hidden" name="lang" value="{{ $lang }}">

                                        <label>@lang('admin.sliders.position.title')</label>
                                        <fieldset class="form-group">
                                            <select class="select2 form-control" required name="type" id="type">
                                                <option disabled selected>@lang('admin.sliders.choose_type')</option>
                                                <option value="top" {{ $slider->type === 'top' ? 'selected' : '' }}>@lang('admin.sliders.position.top')</option>
                                                <option value="middle" {{ $slider->type === 'middle' ? 'selected' : '' }}>@lang('admin.sliders.position.middle')</option>
                                                <option value="bottom" {{ $slider->type === 'bottom' ? 'selected' : '' }}>@lang('admin.sliders.position.bottom')</option>
                                            </select>
                                        </fieldset>

                                        <label>@lang('admin.sliders.link')</label>
                                        <div class="controls">
                                            <fieldset class="form-group position-relative has-icon-left input-divider-left">
                                                <input type="text" name="link" class="form-control @error('link') is-invalid @enderror"
                                                       value="{{ old('link', $slider->link) }}" placeholder="@lang('admin.sliders.link') " required>
                                                <div class="form-control-position">
                                                    <i class="feather icon-link"></i>
                                                </div>
                                            </fieldset>
                                            @error('link')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>

                                        <div id="middle_banner_additions">
                                            <label>@lang('admin.partners.title')</label>
                                            <fieldset class="form-group">
                                                <select class="select2 form-control" name="partner_id">
                                                    <option disabled selected>@lang('admin.products.choose_partner')</option>
                                                    @foreach($partners as $partner)
                                                        <option value="{{ $partner->id }}" {{ $slider->partner_id === $partner->id ? 'selected' : '' }}>{{ $partner->name }}</option>
                                                    @endforeach
                                                </select>
                                            </fieldset>

                                            <label>@lang('admin.sliders.placement.title')</label>
                                            <fieldset class="form-group">
                                                <select class="select2 form-control" name="placement">
                                                    <option disabled selected>@lang('admin.sliders.choose_placement')</option>
                                                    <option value="right" {{ $slider->placement === 'right' ? 'selected' : '' }}>@lang('admin.sliders.placement.right')</option>
                                                    <option value="left" {{ $slider->placement === 'left' ? 'selected' : '' }}>@lang('admin.sliders.placement.left')</option>
                                                </select>
                                            </fieldset>
                                        </div>

                                        <label>@lang('admin.sliders.desktop')</label>
                                        <div class="custom-file">
                                            <input id="uploadImage" class="custom-file-input" type="file" name="desktop" onchange="PreviewImage();" />
                                            <label class="custom-file-label">@lang('admin.only_types')</label>
                                        </div>
                                        <br><br>
                                        <div class="text-center">
                                            <img id="uploadPreview" style="width: 200px; height: auto" src="{{ $slider->desktop->url ?? '' }}"/>
                                        </div>

                                        <label>@lang('admin.sliders.mobile')</label>
                                        <div class="custom-file">
                                            <input id="uploadImage1" class="custom-file-input" type="file" name="mobile" onchange="PreviewImage1();" />
                                            <label class="custom-file-label">@lang('admin.only_types')</label>
                                        </div>
                                        <br><br>
                                        <div class="text-center">
                                            <img id="uploadPreview1" style="width: 200px; height: auto" src="{{ $slider->mobile->url ?? '' }}"/>
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
        });
    </script>

    <script>
        $(document).ready(function () {
            @if($slider->type === 'bottom')
                $("#middle_banner_additions").show();
            @else
                $("#middle_banner_additions").hide();

                $('#type').change(function () {
                    var selectedCategory = $(this).children("option:selected").val();

                    if (selectedCategory === 'middle')
                        $("#middle_banner_additions").show();
                    else
                        $("#middle_banner_additions").hide();
                });
            @endif
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
