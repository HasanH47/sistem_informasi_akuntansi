@extends('layouts.auth.app')

@section('title', 'Login | Sistem Informasi Akuntansi')

@section('content')

    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <div
            class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
            <div class="d-flex align-items-center justify-content-center w-100">
                <div class="row justify-content-center w-100">
                    <div class="col-md-8 col-lg-6 col-xxl-3">
                        <div class="card mb-0">
                            <div class="card-body">
                                <a href="{{ route('welcome') }}"
                                    class="text-nowrap logo-img text-center d-block py-3 w-100">
                                    <h1 class="m-0 fs-4">SIA</h1>
                                </a>
                                <p class="paragraf text-center">Sistem Informasi Akuntansi</p>
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Email/Username</label>
                                        <input type="text"
                                            class="form-control @error('username') is-invalid @enderror @error('email') is-invalid @enderror"
                                            name="username" value="{{ old('username') }}" id="exampleInputEmail1"
                                            aria-describedby="emailHelp">
                                        @error('username')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="mb-4">
                                        <label for="exampleInputPassword1" class="form-label">Password</label>
                                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                                            name="password" id="exampleInputPassword1">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between mb-4">
                                        <div class="form-check">
                                            <input class="form-check-input primary" type="checkbox" value=""
                                                id="flexCheckChecked" {{ old('remember') ? 'checked' : '' }}>
                                            <label class="form-check-label text-dark" for="flexCheckChecked">
                                                {{ __('Remember Me') }}
                                            </label>
                                        </div>
                                        {{-- <a class="text-primary fw-bold" href="./index.html">Forgot Password ?</a> --}}
                                    </div>
                                    {{-- <a href="./index.html" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Sign
                                        In</a> --}}
                                    <button type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">
                                        {{ __('Sign in') }}
                                    </button>
                                    {{-- <div class="d-flex align-items-center justify-content-center">
                                        <p class="fs-4 mb-0 fw-bold">New to Modernize?</p>
                                        <a class="text-primary fw-bold ms-2" href="./authentication-register.html">Create an
                                            account</a>
                                    </div> --}}
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        .logo-img h1 {
            font-size: 32px !important;
            font-weight: bold;
            color: #343a40;
        }

        .card-body  .paragraf {
            color: #007bff !important;
            font-size: 14px;
            margin-top: -5px;
        }
    </style>
@endsection
