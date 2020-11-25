@extends('dashboard.layouts.app')

@push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/dashboard/app-assets/css/pages/dashboard-analytics.css') }}">
@endpush

@section('content')
    <section id="dashboard-analytics">
        <div class="row">
            @can('view', 'users')
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="card">
                        <div class="card-header d-flex flex-column align-items-start pb-0">
                            <div class="avatar bg-rgba-primary p-50 m-0">
                                <div class="avatar-content">
                                    <i class="feather icon-users text-primary font-medium-5"></i>
                                </div>
                            </div>
                            <h2 class="text-bold-700 mt-1 mb-25">{{ $users_count }}</h2>
                            <p class="mb-0">@lang('admin.dashboard.users_count')</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-12">
                    <div class="card">
                        <div class="card-header d-flex flex-column align-items-start pb-0">
                            <div class="avatar bg-rgba-warning p-50 m-0">
                                <div class="avatar-content">
                                    <i class="feather icon-dollar-sign text-warning font-medium-5"></i>
                                </div>
                            </div>
                            <h2 class="text-bold-700 mt-1 mb-25">{{ number_format($avg_salary, 0, '.', ' ') }}</h2>
                            <p class="mb-0">@lang('admin.dashboard.avg_salary')</p>
                        </div>
                    </div>
                </div>
            @endcan

            <div class="col-lg-4 col-md-6 col-12">
                <div class="card">
                    <div class="card-header d-flex flex-column align-items-start pb-0">
                        <div class="avatar bg-rgba-black p-50 m-0">
                            <div class="avatar-content">
                                <i class="feather icon-book text-dark font-medium-5"></i>
                            </div>
                        </div>
                        <h2 class="text-bold-700 mt-1 mb-25">{{ $posts_count }}</h2>
                        <p class="mb-0">@lang('admin.dashboard.posts_count')</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('js')
    <script src="{{ asset('vendor/dashboard/src/js/scripts/pages/dashboard-analytics.js') }}"></script>
@endpush
