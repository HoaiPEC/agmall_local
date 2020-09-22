<div id="kt_quick_user" class="offcanvas offcanvas-right p-10">
    <div class="offcanvas-header d-flex align-items-center justify-content-between pb-5">
        <h3 class="font-weight-bold m-0">
            @switch (Auth::user()->role)
                @case (config('roles.admin'))
                Admin
                @break;
                @case (config('roles.sale_director'))
                Sale Director
                @break;
                @case (config('roles.sale_manager'))
                Sale Manager
                @break;
                @case (config('roles.sale'))
                Sale Sale
                @break;
                @case (config('roles.product_manager'))
                Product Manager
                @break;
                @case (config('roles.store_manager'))
                Store Manager
                @break;
            @endswitch
        </h3>
        <a href="#" class="btn btn-xs btn-icon btn-light btn-hover-primary" id="kt_quick_user_close">
            <i class="ki ki-close icon-xs text-muted"></i>
        </a>
    </div>
    <div class="offcanvas-content pr-5 mr-n5">
        <div class="d-flex align-items-center mt-5">
            <div class="symbol symbol-100 mr-5">
                <div class="symbol-label">
                    <img src="{{ URL::to(@Auth::user()->avatar) }}" class="img-user">
                </div>
                <i class="symbol-badge bg-success"></i>
            </div>
            <div class="d-flex flex-column">
                <a href="#" class="font-weight-bold font-size-h5 text-dark-75 text-hover-primary">
                    {{ @Auth::user()->name }}
                </a>
                <div class="navi mt-2">
                    <a href="#" class="navi-item">
                        <span class="navi-link p-0 pb-2">
                            <span class="navi-icon mr-1">
                                <span class="svg-icon svg-icon-lg svg-icon-primary">
                                    <svg>
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <path d="M21,12.0829584 C20.6747915,12.0283988 20.3407122,12 20,12 C16.6862915,12 14,14.6862915 14,18 C14,18.3407122 14.0283988,18.6747915 14.0829584,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,8 C3,6.8954305 3.8954305,6 5,6 L19,6 C20.1045695,6 21,6.8954305 21,8 L21,12.0829584 Z M18.1444251,7.83964668 L12,11.1481833 L5.85557487,7.83964668 C5.4908718,7.6432681 5.03602525,7.77972206 4.83964668,8.14442513 C4.6432681,8.5091282 4.77972206,8.96397475 5.14442513,9.16035332 L11.6444251,12.6603533 C11.8664074,12.7798822 12.1335926,12.7798822 12.3555749,12.6603533 L18.8555749,9.16035332 C19.2202779,8.96397475 19.3567319,8.5091282 19.1603533,8.14442513 C18.9639747,7.77972206 18.5091282,7.6432681 18.1444251,7.83964668 Z" fill="#000000" />
                                            <circle fill="#000000" opacity="0.3" cx="19.5" cy="17.5" r="2.5" />
                                        </g>
                                    </svg>
                                </span>
                            </span>
                            <span class="navi-text text-muted text-hover-primary">{{ @Auth::user()->email }}</span>
                        </span>
                    </a>
                    <div class="card-toolbar">
                        <div class="dropdown dropdown-inline mr-2">
                            <button type="button" class="btn btn-light-primary font-weight-bolder dropdown-toggle"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ trans('admin.action') }}
                            </button>
                            <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right" style="">
                                <ul class="navi flex-column navi-hover py-2">
                                    <li class="navi-item">
                                        <form action="{{ route('admin.logout') }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-light-danger font-weight-bolder py-2 px-5">
                                                <span class="svg-icon svg-icon-primary svg-icon-2x">
                                                    <svg>
                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                            <polygon points="0 0 24 0 24 24 0 24"/>
                                                            <rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000) " x="11" y="5" width="2" height="14" rx="1"/>
                                                            <path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997) "/>
                                                        </g>
                                                    </svg>
                                                </span>
                                                {{ trans('admin.logout') }}
                                            </button>
                                        </form>
                                    </li>
                                    @if (isset($users))
                                        @foreach ($users as $user)
                                            @php $role = $user->role; @endphp
                                            <li class="navi-item">
                                                <a href="#" class="navi-link">
                                                    <span class="navi-icon">
                                                        <i class="la la-copy"></i>
                                                    </span>
                                                    <span class="navi-text">
                                                        @switch ($role)
                                                            @case (config('roles.admin'))
                                                                Admin
                                                                @break;
                                                            @case (config('roles.sale_director'))
                                                                Sale Director
                                                                @break;
                                                            @case (config('roles.sale_manager'))
                                                                Sale Manager
                                                                @break;
                                                            @case (config('roles.sale'))
                                                                Sale Sale
                                                                @break;
                                                            @case (config('roles.product_manager'))
                                                                Product Manager
                                                                @break;
                                                            @case (config('roles.store_manager'))
                                                                Store Manager
                                                                @break;
                                                        @endswitch
                                                    </span>
                                                </a>
                                            </li>
                                        @endforeach
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="separator separator-dashed mt-8 mb-5"></div>
        <div class="navi navi-spacer-x-0 p-0">
            <a href="#" class="navi-item">
                <div class="navi-link">
                    <div class="symbol symbol-40 bg-light mr-3">
                        <div class="symbol-label">
                            <span class="svg-icon svg-icon-md svg-icon-success">
                                <svg>
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <path d="M13.2070325,4 C13.0721672,4.47683179 13,4.97998812 13,5.5 C13,8.53756612 15.4624339,11 18.5,11 C19.0200119,11 19.5231682,10.9278328 20,10.7929675 L20,17 C20,18.6568542 18.6568542,20 17,20 L7,20 C5.34314575,20 4,18.6568542 4,17 L4,7 C4,5.34314575 5.34314575,4 7,4 L13.2070325,4 Z" fill="#000000" />
                                        <circle fill="#000000" opacity="0.3" cx="18.5" cy="5.5" r="2.5" />
                                    </g>
                                </svg>
                            </span>
                        </div>
                    </div>
                    <div class="navi-text">
                        <div class="font-weight-bold">{{ trans('admin.my_profile') }}</div>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>
