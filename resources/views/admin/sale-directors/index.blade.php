@extends('admin.layouts.master')

@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
            <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                <div class="d-flex align-items-center flex-wrap mr-1">
                    <div class="d-flex align-items-baseline flex-wrap mr-5">
                        <h5 class="text-dark font-weight-bold my-1 mr-5">{{ trans('admin.sale_director') }}</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex flex-column-fluid">
            <div class="container">
                <div class="card card-custom">
                    <div class="card-header flex-wrap py-5">
                        <div class="card-title">
                            <h3 class="card-label">{{ trans('admin.list_sale_director') }}</h3>
                        </div>
                        <div class="card-toolbar">
                            <a href="{{ route('admin.sale-directors.create') }}" class="btn btn-primary font-weight-bolder">
                                <span class="svg-icon svg-icon-md">
                                    <svg>
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <circle fill="#000000" cx="9" cy="15" r="6" />
                                            <path d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z" fill="#000000" opacity="0.3" />
                                        </g>
                                    </svg>
                                </span>
                                {{ trans('admin.add_new') }}
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-separate table-head-custom table-checkable" id="kt_datatable">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ trans('admin.avatar') }}</th>
                                <th>{{ trans('admin.phone') }}</th>
                                <th>{{ trans('admin.email') }}</th>
                                <td>{{ trans('admin.status') }}</td>
                                <th colspan="2">{{ trans('admin.action') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $key => $user)
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td>
                                            <img src="{{ asset(isset($user->avatar) ? $user->avatar : config('path.default')) }}"
                                                alt="{{ $user->name }}" class="avatar">
                                        </td>
                                        <td>{{ $user->phone }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                            <input data-id="{{ $user->id }}" class="toggle-class" type="checkbox"
                                                data-onstyle="success" data-offstyle="danger" data-toggle="toggle"
                                                data-on="{{ trans('admin.online') }}"
                                                data-off="{{ trans('admin.block') }}" {{ !$user->blocked ? 'checked' : '' }}>
                                        </td>
                                        <td>
                                            <button class="btn btn-default">
                                                <a href="{{ route('admin.sale-directors.edit', $user->id) }}">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                            </button>
                                        </td>
                                        <td>
                                            <form class="delete-user" action="{{ route('admin.sale-directors.destroy', $user->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-default" type="submit" value="{{ $user->id }}">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {!! $users->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
