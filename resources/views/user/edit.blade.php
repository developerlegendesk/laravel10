@extends('layouts.app')

@section('content')
<div class="container-fluid py-4">

    <!-- Page Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="fw-bold mb-0">Edit Profile</h4>
            <small class="text-muted">Manage your account information and password</small>
        </div>
    </div>



    <div class="row g-4">

        <!-- Profile Information Card -->
        <div class="col-lg-6">
            <div class="card border-0 shadow-sm rounded-3 h-100">
                <div class="card-header bg-white border-0">
                    <h6 class="mb-0 fw-semibold">Profile Information</h6>
                </div>
                <div class="card-body">

                    <form method="POST" action="{{ route('user.update', $user->id) }}">
                        @csrf
                        @method('PUT')

                        <!-- Name -->
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Full Name</label>
                            <input type="text" name="name"
                                   class="form-control @error('name') is-invalid @enderror"
                                   value="{{ old('name', $user->name) }}">
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Email Address</label>
                            <input type="email" name="email"
                                   class="form-control @error('email') is-invalid @enderror"
                                   value="{{ old('email', $user->email) }}">
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Submit -->
                        <div class="text-end">
                            <button class="btn btn-primary px-4">
                                <i class="fas fa-save me-1"></i> Save Changes
                            </button>
                        </div>

                    </form>

                </div>
            </div>
        </div>

        <!-- Change Password Card -->
        <div class="col-lg-6">
            <div class="card border-0 shadow-sm rounded-3 h-100">
                <div class="card-header bg-white border-0">
                    <h6 class="mb-0 fw-semibold">Change Password</h6>
                </div>
                <div class="card-body">

                    <form method="POST" action="{{ route('user.change-password', $user->id) }}">
                        @csrf

                        <!-- Old Password -->
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Old Password</label>
                            <input type="password" name="old_password"
                                   class="form-control @error('old_password') is-invalid @enderror">
                            @error('old_password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- New Password -->
                        <div class="mb-3">
                            <label class="form-label fw-semibold">New Password</label>
                            <input type="password" name="new_password"
                                   class="form-control @error('new_password') is-invalid @enderror">
                            @error('new_password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Confirm Password -->
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Confirm Password</label>
                            <input type="password" name="new_password_confirmation"
                                   class="form-control">
                        </div>

                        <!-- Submit -->
                        <div class="text-end">
                            <button class="btn btn-success px-4">
                                <i class="fas fa-lock me-1"></i> Update Password
                            </button>
                        </div>

                    </form>

                </div>
            </div>
        </div>

    </div>
</div>
@endsection
