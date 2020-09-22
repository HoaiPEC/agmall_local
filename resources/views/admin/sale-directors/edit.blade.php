@extends('admin.layouts.master')

@section('content')

    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
            <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                <div class="d-flex align-items-center flex-wrap mr-2">
                    <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">{{ trans('admin.edit_contact') }}</h5>
                    <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-5 bg-gray-200"></div>
                    <div class="d-flex align-items-center" id="kt_subheader_search">
                        <span class="text-dark-50 font-weight-bold" id="kt_subheader_total">{{ $user->name }}</span>
                    </div>
                </div>
                <div class="d-flex align-items-center">
                    <a href="{{ route('admin.sale-directors.index') }}" class="btn btn-default font-weight-bold">
                        {{ trans('admin.back') }}
                    </a>
                    <div class="btn-group ml-2">
                        <button type="submit" class="btn btn-primary font-weight-bold" form="form-user">
                            {{ trans('admin.save_change') }}
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex flex-column-fluid">
            <div class="container">
                <div class="card card-custom">
                    <div class="card-header card-header-tabs-line">
                        <div class="card-toolbar">
                            <ul class="nav nav-tabs nav-tabs-space-lg nav-tabs-line nav-tabs-bold nav-tabs-line-3x" role="tablist">
                                <li class="nav-item mr-3">
                                    <a class="nav-link active" data-toggle="tab" href="#kt_apps_contacts_view_tab_2">
                                        <span class="nav-text font-weight-bold">{{ trans('admin.personal') }}</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    @include('admin.layouts.common.error')
                    <div class="card-body">
                        <div class="tab-content pt-5">
                            <div class="tab-pane active" id="kt_apps_contacts_view_tab_2" role="tabpanel">
                                <form class="form" action="{{ route('admin.sale-directors.update', $user->id) }}"
                                    method="POST" id="form-user" enctype="multipart/form-data">
                                    @csrf
                                    @method('PATCH')
                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 text-right col-form-label">
                                            {{ trans('admin.avatar') }}
                                        </label>
                                        <div class="col-lg-9 col-xl-9">
                                            <div class="image-input image-input-outline" id="kt_contacts_edit_avatar">
                                                <div class="image-input-wrapper"
                                                    style="background-image: url({{ asset(isset($user->avatar) ? $user->avatar : config('path.default')) }})">
                                                </div>
                                                <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary
                                                    btn-shadow" data-action="change" data-toggle="tooltip">
                                                    <i class="fa fa-pen icon-sm text-muted"></i>
                                                    <input type="file" name="avatar" accept=".png, .jpg, .jpeg"
                                                        value="{{ $user->avatar }}" />
                                                </label>
                                                <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                                    data-action="cancel" data-toggle="tooltip" title="{{ trans('cancel_avatar') }}">
                                                    <i class="ki ki-bold-close icon-xs text-muted"></i>
                                                </span>
                                                <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                                    data-action="remove" data-toggle="tooltip" title="{{ trans('remove_avatar') }}">
                                                    <i class="ki ki-bold-close icon-xs text-muted"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="separator separator-dashed my-10"></div>
                                    <div class="row">
                                        <div class="col-lg-9 col-xl-6 offset-xl-3">
                                            <h3 class="font-size-h6 mb-5">{{ trans('admin.contact_info') }}:</h3>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 text-right col-form-label">
                                            {{ trans('admin.email_address') }}
                                        </label>
                                        <div class="col-lg-9 col-xl-6">
                                            <div class="input-group input-group-lg input-group-solid">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="la la-at"></i>
                                                    </span>
                                                </div>
                                                <input type="email" class="form-control form-control-lg form-control-solid"
                                                    value="{{ $user->email }}" placeholder="{{ trans('admin.email') }}" name="email" />
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
