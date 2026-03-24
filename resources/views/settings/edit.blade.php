@extends('layouts.app')

@section('content')
<div class="container-fluid py-4">

    <!-- Page Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="fw-bold mb-0">App Settings</h4>
            <small class="text-muted">Update your app information, email settings, and social media links</small>
        </div>
    </div>

    <!-- Alerts -->

    <div class="row g-4">

        <!-- General Settings Card -->
        <div class="col-lg-6">
            <div class="card border-0 shadow-sm rounded-3 h-100">
                <div class="card-header bg-white border-0">
                    <h6 class="mb-0 fw-semibold">General Settings</h6>
                </div>
                <div class="card-body">

                    <form action="{{ route('settings.updateGeneral') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- App Name -->
                        <div class="mb-3">
                            <label class="form-label fw-semibold">App Name</label>
                            <input type="text" name="app_name"
                                   class="form-control @error('app_name') is-invalid @enderror"
                                   value="{{ old('app_name', $setting->app_name) }}">
                            @error('app_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- App Email -->
                        <div class="mb-3">
                            <label class="form-label fw-semibold">App Email</label>
                            <input type="email" name="app_email"
                                   class="form-control @error('app_email') is-invalid @enderror"
                                   value="{{ old('app_email', $setting->app_email) }}">
                            @error('app_email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- App Phone -->
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Phone</label>
                            <input type="text" name="app_phone"
                                   class="form-control @error('app_phone') is-invalid @enderror"
                                   value="{{ old('app_phone', $setting->app_phone) }}">
                            @error('app_phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Logo -->
                        <div class="mb-3">
                            <label class="form-label fw-semibold">App Logo</label>
                            <input type="file" name="app_logo" class="form-control @error('app_logo') is-invalid @enderror">
                            @error('app_logo')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            @if($setting->app_logo)
                                <img src="{{ asset(Storage::url($setting->app_logo)) }}" alt="Logo" class="mt-2" width="100">
                            @endif
                        </div>

                        <!-- Favicon -->
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Favicon</label>
                            <input type="file" name="app_favicon" class="form-control @error('app_favicon') is-invalid @enderror">
                            @error('app_favicon')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            @if($setting->app_favicon)
                                <img src="{{ asset(Storage::url($setting->app_favicon) )}}" alt="Favicon" class="mt-2" width="50">
                            @endif
                        </div>

                        <div class="text-end">
                            <button class="btn btn-primary px-4">
                                <i class="fas fa-save me-1"></i> Update General
                            </button>
                        </div>

                    </form>

                </div>
            </div>
        </div>

        <!-- Email & Social Card -->
        <div class="col-lg-6">
            <div class="card border-0 shadow-sm rounded-3 h-100">
                <div class="card-header bg-white border-0">
                    <h6 class="mb-0 fw-semibold">Email & Social Media</h6>
                </div>
                <div class="card-body">

                    <form action="{{ route('settings.updateEmailSocial') }}" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- Email Settings -->
                        <div class="mb-3">
                            <label class="form-label fw-semibold">From Email</label>
                            <input type="email" name="email_from" class="form-control @error('email_from') is-invalid @enderror" value="{{ old('email_from', $setting->email_from) }}">
                            @error('email_from')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold">SMTP Host</label>
                            <input type="text" name="email_host" class="form-control" value="{{ old('email_host', $setting->email_host) }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold">SMTP Port</label>
                            <input type="text" name="email_port" class="form-control" value="{{ old('email_port', $setting->email_port) }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Username</label>
                            <input type="text" name="email_username" class="form-control" value="{{ old('email_username', $setting->email_username) }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Password</label>
                            <input type="password" name="email_password" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Encryption</label>
                            <input type="text" name="email_encryption" class="form-control" value="{{ old('email_encryption', $setting->email_encryption) }}">
                        </div>

                        <!-- Social Media Links -->
                        @foreach(['facebook','tiktok','instagram','twitter','linkedin'] as $social)
                            <div class="mb-3">
                                <label class="form-label fw-semibold text-capitalize">{{ $social }}</label>
                                <input type="url" name="{{ $social }}" class="form-control" value="{{ old($social, $setting->$social) }}">
                            </div>
                        @endforeach

                        <div class="text-end">
                            <button class="btn btn-success px-4">
                                <i class="fas fa-save me-1"></i> Update Email & Social
                            </button>
                        </div>

                    </form>

                </div>
            </div>
        </div>

    </div>
</div>
@endsection
