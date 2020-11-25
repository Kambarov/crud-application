@extends('dashboard.layouts.app')
@section('title', trans('admin.add'). ' - ')

@section('content')
    <section>
        <form class="form form-vertical" action="{{ route('dashboard.roles.store') }}" method="post">
        @csrf
        <!-- Account-begins -->
            <div class="settings-account">
                <!-- <h6 class="mb-1">Account</h6> -->
                <div class="card user-form">
                    <div class="card-header">
                        <h4 class="card-title">@lang('admin.add')</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="first-name-vertical">@lang('admin.name') RU</label>
                                                <input type="text" id="first-name-vertical" required class="form-control @error('name.ru') is-invalid @enderror"
                                                       name="name[ru]" value="{{ old('name.ru') }}" placeholder="@lang('admin.name') RU">
                                                @error('name.ru')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="first-name-vertical">@lang('admin.name') EN</label>
                                                <input type="text" id="first-name-vertical" required class="form-control @error('name.en') is-invalid @enderror"
                                                       name="name[en]" value="{{ old('name.en') }}" placeholder="@lang('admin.name') EN">
                                                @error('name.en')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="sub_ceo" class="controls">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="users-tab" data-toggle="tab" href="#users" role="tab"
                           aria-controls="users" aria-selected="true">@lang('admin.users.title')</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="posts-tab" data-toggle="tab" href="#posts" role="tab"
                           aria-controls="posts" aria-selected="false">@lang('admin.posts.title')</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="roles-tab" data-toggle="tab" href="#roles" role="tab"
                           aria-controls="roles" aria-selected="false">@lang('admin.roles.title')</a>
                    </li>
                </ul>
                <!-- Account-end -->
                <!-- Notification-begins -->
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="users" role="tabpanel" aria-labelledby="users-tab">
                        <div class="settings-notification mb-2">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title pb-2">@lang('admin.users.title')</h4>
                                </div>
                                <div class="card-content">
                                    <ul class="list-group notification">
                                        <li class="list-group-item d-flex pt-1 pb-1">
                                            <span>@lang('admin.permissions.view')</span>
                                            <div class="custom-control custom-switch custom-switch-primary ml-auto">
                                                <input type="checkbox" name="permissions[users][view]" value="true"
                                                       class="custom-control-input" id="customSwitch1">
                                                <label class="custom-control-label" for="customSwitch1"></label>
                                            </div>
                                        </li>
                                        <li class="list-group-item d-flex pt-1 pb-1">
                                            <span>@lang('admin.permissions.create')</span>
                                            <div class="custom-control custom-switch custom-switch-primary ml-auto">
                                                <input type="checkbox" name="permissions[users][create]" value="true"
                                                       class="custom-control-input" id="customSwitch2">
                                                <label class="custom-control-label" for="customSwitch2"></label>
                                            </div>
                                        </li>
                                        <li class="list-group-item d-flex pt-1 pb-1">
                                            <span>@lang('admin.permissions.update')</span>
                                            <div class="custom-control custom-switch custom-switch-primary ml-auto">
                                                <input type="checkbox" name="permissions[users][update]" value="true"
                                                       class="custom-control-input" id="customSwitch3">
                                                <label class="custom-control-label" for="customSwitch3"></label>
                                            </div>
                                        </li>
                                        <li class="list-group-item d-flex pt-1 pb-1">
                                            <span>@lang('admin.permissions.delete')</span>
                                            <div class="custom-control custom-switch custom-switch-primary ml-auto">
                                                <input type="checkbox" name="permissions[users][delete]" value="true"
                                                       class="custom-control-input" id="customSwitch4">
                                                <label class="custom-control-label" for="customSwitch4"></label>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Notification-end -->
                    <!-- Emails-begins -->
                    <div class="tab-pane fade" id="posts" role="tabpanel" aria-labelledby="posts-tab">
                        <div class="settings-emails mb-2">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title pb-2">@lang('admin.posts.title')</h4>
                                </div>
                                <div class="card-content">
                                    <ul class="list-group">
                                        <li class="list-group-item d-flex pt-1 pb-1">
                                            <span>@lang('admin.permissions.view')</span>
                                            <div class="custom-control custom-switch custom-switch-primary ml-auto">
                                                <input type="checkbox" name="permissions[posts][view]" value="true"
                                                       class="custom-control-input" id="customSwitch5">
                                                <label class="custom-control-label" for="customSwitch5"></label>
                                            </div>
                                        </li>
                                        <li class="list-group-item d-flex pt-1 pb-1">
                                            <span>@lang('admin.permissions.create')</span>
                                            <div class="custom-control custom-switch custom-switch-primary ml-auto">
                                                <input type="checkbox" name="permissions[posts][create]" value="true"
                                                       class="custom-control-input" id="customSwitch6">
                                                <label class="custom-control-label" for="customSwitch6"></label>
                                            </div>
                                        </li>
                                        <li class="list-group-item d-flex pt-1 pb-1">
                                            <span>@lang('admin.permissions.update')</span>
                                            <div class="custom-control custom-switch custom-switch-primary ml-auto">
                                                <input type="checkbox" name="permissions[posts][update]" value="true"
                                                       class="custom-control-input" id="customSwitch7">
                                                <label class="custom-control-label" for="customSwitch7"></label>
                                            </div>
                                        </li>
                                        <li class="list-group-item d-flex pt-1 pb-1">
                                            <span>@lang('admin.permissions.delete')</span>
                                            <div class="custom-control custom-switch custom-switch-primary ml-auto">
                                                <input type="checkbox" name="permissions[posts][delete]" value="true"
                                                       class="custom-control-input" id="customSwitch8">
                                                <label class="custom-control-label" for="customSwitch8"></label>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Emails-end -->
                    <!-- Security-begins -->
                    <div class="tab-pane fade" id="roles" role="tabpanel" aria-labelledby="roles-tab">
                        <div class="settings-emails mb-2">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title pb-2">@lang('admin.roles.title')</h4>
                                </div>
                                <div class="card-content">
                                    <ul class="list-group">
                                        <li class="list-group-item d-flex pt-1 pb-1">
                                            <span>@lang('admin.permissions.view')</span>
                                            <div class="custom-control custom-switch custom-switch-primary ml-auto">
                                                <input type="checkbox" name="permissions[roles][view]" value="true"
                                                       class="custom-control-input" id="customSwitch9">
                                                <label class="custom-control-label" for="customSwitch9"></label>
                                            </div>
                                        </li>
                                        <li class="list-group-item d-flex pt-1 pb-1">
                                            <span>@lang('admin.permissions.create')</span>
                                            <div class="custom-control custom-switch custom-switch-primary ml-auto">
                                                <input type="checkbox" name="permissions[roles][create]" value="true"
                                                       class="custom-control-input" id="customSwitch10">
                                                <label class="custom-control-label" for="customSwitch10"></label>
                                            </div>
                                        </li>
                                        <li class="list-group-item d-flex pt-1 pb-1">
                                            <span>@lang('admin.permissions.update')</span>
                                            <div class="custom-control custom-switch custom-switch-primary ml-auto">
                                                <input type="checkbox" name="permissions[roles][update]" value="true"
                                                       class="custom-control-input" id="customSwitch10">
                                                <label class="custom-control-label" for="customSwitch10"></label>
                                            </div>
                                        </li>
                                        <li class="list-group-item d-flex pt-1 pb-1">
                                            <span>@lang('admin.permissions.delete')</span>
                                            <div class="custom-control custom-switch custom-switch-primary ml-auto">
                                                <input type="checkbox" name="permissions[roles][delete]" value="true"
                                                       class="custom-control-input" id="customSwitch11">
                                                <label class="custom-control-label" for="customSwitch11"></label>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 mb-0">
                <div class="row">
                    <div class="col-3">
                        <button type="submit" class="btn btn-primary mr-1 mb-1 waves-effect waves-light btn-icon">
                            <i class="feather icon-save"></i> @lang('admin.save')
                        </button>
                    </div>

                    <div class="col-9">
                        <a href="{{ route('dashboard.roles.index') }}" class="btn btn-danger mr-1 mb-1 waves-effect waves-light btn-icon pull-right">
                            <i class="feather icon-x-circle"></i> @lang('admin.cancel')
                        </a>
                    </div>
                </div>
            </div>
        </form>
        <!-- Security-end -->
    </section>
@endsection
