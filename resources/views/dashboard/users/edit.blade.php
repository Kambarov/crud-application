@extends('dashboard.layouts.app')
@section('title', trans('admin.edit').' '.$user->name.' - ')

@push('css')
    <link rel="stylesheet" type="text/css" href="/vendor/dashboard/app-assets/vendors/css/forms/select/select2.min.css">
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
                            <form method="post" action="{{ route('dashboard.users.update', $user->id) }}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-12">

                                        <div class="controls">

                                            <div class="tab-content" id="myTabContent">
                                                <label>@lang('admin.users.name')</label>
                                                <div class="controls">
                                                    <fieldset class="form-group position-relative has-icon-left input-divider-left">
                                                        <input type="text" name="name" required class="form-control @error('name') is-invalid @enderror"
                                                               value="{{ old('name', $user->name) }}" placeholder="@lang('admin.users.name')">
                                                        <div class="form-control-position">
                                                            <i class="feather icon-user"></i>
                                                        </div>
                                                    </fieldset>
                                                    @error('name')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>

                                                <label>@lang('admin.users.email')</label>
                                                <div class="controls">
                                                    <fieldset class="form-group position-relative has-icon-left input-divider-left">
                                                        <input type="email" name="email" required class="form-control @error('email') is-invalid @enderror"
                                                               value="{{ old('email', $user->email) }}" placeholder="@lang('admin.users.email')">
                                                        <div class="form-control-position">
                                                            <i class="feather icon-mail"></i>
                                                        </div>
                                                    </fieldset>
                                                    @error('email')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>

                                                <label>@lang('admin.users.weekly_salary')</label>
                                                <div class="controls">
                                                    <fieldset class="form-group position-relative has-icon-left input-divider-left">
                                                        <input type="number" name="weekly_salary" required class="form-control @error('weekly_salary') is-invalid @enderror"
                                                               value="{{ old('weekly_salary', $user->weekly_salary) }}" placeholder="@lang('admin.users.weekly_salary')">
                                                        <div class="form-control-position">
                                                            <i class="feather icon-dollar-sign"></i>
                                                        </div>
                                                    </fieldset>
                                                    @error('weekly_salary')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>

                                                <label>@lang('admin.users.password')</label>
                                                <div class="controls">
                                                    <fieldset class="form-group position-relative has-icon-left input-divider-left">
                                                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                                                               value="{{ old('password') }}" placeholder="@lang('admin.users.password')">
                                                        <div class="form-control-position">
                                                            <i class="feather icon-lock"></i>
                                                        </div>
                                                    </fieldset>
                                                    @error('password')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <label>@lang('admin.users.role')</label>
                                        <fieldset class="form-group">
                                            <select name="role_id" class="form-control select2" required>
                                                <option disabled selected>@lang('admin.users.choose_role')</option>
                                                @foreach($roles as $role)
                                                    <option value="{{ $role->id }}" {{ $user->role_id === $role->id ? 'selected' : '' }}>{{ $role->name }}</option>
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
                                            <img id="uploadPreview" style="width: 200px; height: auto" src="{{ $user->image->url }}"/>
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
    <script src="/vendor/dashboard/app-assets/vendors/js/forms/select/select2.full.min.js"></script>
    <script src="/vendor/dashboard/app-assets/js/scripts/forms/select/form-select2.js"></script>

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
