@extends('layouts.app')

@section('content')
<div class="container-fluid py-4">

    <!-- Page Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold text-dark">Dashboard</h2>
        <span class="text-muted">Welcome back, {{ auth()->user()->name ?? 'User' }}</span>
    </div>

    <!-- Cards Row -->
    <div class="row">

        <!-- Card 1 -->
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm border-0 rounded-3">
                <div class="card-body">
                    <h5 class="card-title text-primary">Profile</h5>
                    <p class="card-text text-muted">
                        Manage your personal information and update your details.
                    </p>
                    <a href="#" class="btn btn-outline-primary btn-sm">Edit Profile</a>
                </div>
            </div>
        </div>

        <!-- Card 2 -->
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm border-0 rounded-3">
                <div class="card-body">
                    <h5 class="card-title text-success">Security</h5>
                    <p class="card-text text-muted">
                        Change your password and secure your account.
                    </p>
                    <a href="#" class="btn btn-outline-success btn-sm">Change Password</a>
                </div>
            </div>
        </div>

        <!-- Card 3 -->
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm border-0 rounded-3">
                <div class="card-body">
                    <h5 class="card-title text-warning">Activity</h5>
                    <p class="card-text text-muted">
                        View your recent activity and account logs.
                    </p>
                    <a href="#" class="btn btn-outline-warning btn-sm">View Activity</a>
                </div>
            </div>
        </div>

    </div>

    <!-- Info Section -->
    <div class="card shadow-sm border-0 rounded-3 mt-4">
        <div class="card-body">
            <h5 class="fw-bold mb-3">Account Overview</h5>

            <div class="row">
                <div class="col-md-6">
                    <p><strong>Name:</strong> {{ auth()->user()->name }}</p>
                    <p><strong>Email:</strong> {{ auth()->user()->email }}</p>
                </div>

                <div class="col-md-6">
                    <p><strong>Joined At:</strong> {{ auth()->user()->created_at->format('d M Y') }}</p>
                    <p><strong>Status:</strong> <span class="badge bg-success">Active</span></p>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
