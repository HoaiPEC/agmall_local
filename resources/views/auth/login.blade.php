<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.layouts.common.head')
</head>

<body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">
<div class="d-flex flex-column flex-root">
    <div class="login login-1 login-signin-on d-flex flex-column flex-lg-row flex-column-fluid bg-white" id="kt_login">
        <div class="login-aside d-flex flex-row-auto bgi-size-cover bgi-no-repeat p-10 p-lg-10" style="background-image: url(assets/media/bg/bg-4.jpg);">
            <div class="d-flex flex-row-fluid flex-column justify-content-between">
                <a href="#" class="flex-column-auto mt-5 pb-lg-0 pb-10">
                    <img src="{{ asset('assets/media/logos/logo-letter-1.png') }}" class="max-h-70px" alt="" />
                </a>
                <div class="flex-column-fluid d-flex flex-column justify-content-center">
                    <h3 class="font-size-h1 mb-5 text-white">Welcome to Agmall!</h3>
                    <p class="font-weight-lighter text-white opacity-80">The ultimate Bootstrap, Angular 8, React &amp; VueJS admin theme framework for next generation web apps.</p>
                </div>
                <div class="d-none flex-column-auto d-lg-flex justify-content-between mt-10">
                    <div class="opacity-70 font-weight-bold text-white">© 2020 Metronic</div>
                    <div class="d-flex">
                        <a href="#" class="text-white">Privacy</a>
                        <a href="#" class="text-white ml-10">Legal</a>
                        <a href="#" class="text-white ml-10">Contact</a>
                    </div>
                </div>
            </div>
        </div>
    <div class="login login-1 login-signin-on d-flex flex-column flex-lg-row flex-column-fluid bg-white" id="kt_login">
        <div class="d-flex flex-column flex-row-fluid position-relative p-7 overflow-hidden">
            <div class="d-flex flex-column-fluid flex-center mt-30 mt-lg-0">
                <div class="login-form login-signin">
                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    <div class="text-center mb-10 mb-lg-20">
                        <h3 class="font-size-h1">Login Admin</h3>
                        <p class="text-muted font-weight-bold">Enter your username and password</p>
                    </div>
                    @if (session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif

                    @include('admin.layouts.common.error')
                    <form class="form" method="POST" action="{{ route('admin.post_login') }}" novalidate="novalidate" id="kt_login_signin_form">
                        @csrf
                        <div class="form-group">
                            <input class="form-control form-control-solid h-auto py-5 px-6" type="text"
                                placeholder="{{ trans('admin.phone') }}" name="phone" autocomplete="off" />
                        </div>
                        <div class="form-group">
                            <input class="form-control form-control-solid h-auto py-5 px-6" type="password"
                                placeholder="Password" name="password" autocomplete="off" />
                        </div>
                        <div class="form-group d-flex flex-wrap justify-content-between align-items-center mt-3">
                            <div class="checkbox-inline">
                                <label class="checkbox checkbox-outline m-0 text-muted">
                                    <input type="checkbox" name="remember">
                                    <span></span>Remember me</label>
                            </div>
                        </div>
                        <div class="form-group d-flex flex-wrap justify-content-between align-items-center">
                            <a href="javascript:;" class="text-dark-50 text-hover-primary my-3 mr-2" id="kt_login_forgot">
                                Forgot Password ?
                            </a>
                            <button type="submit" id="kt_login_signin_submit" class="btn btn-primary font-weight-bold px-9 py-4 my-3">
                                Sign In
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="d-flex d-lg-none flex-column-auto flex-column flex-sm-row justify-content-between align-items-center mt-5 p-5">
                <div class="text-dark-50 font-weight-bold order-2 order-sm-1 my-2">© 2020 Metronic</div>
            </div>
        </div>
    </div>
</div>
</div>
    @include('admin.layouts.common.foot')
</body>
</html>
