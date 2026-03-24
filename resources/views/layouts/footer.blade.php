<footer class="main-footer d-flex justify-content-between align-items-center flex-wrap">
    <div class="version text-muted">
        <b>Version:</b> 3.0.5
    </div>
    <div class="copyright text-muted">
        <strong>&copy; {{ date('Y') }}
            <a href="{{ route('dashboard') }}">
                {{ $setting->app_name ?? config('app.name') }}
            </a>.
        </strong> All rights reserved.
    </div>
</footer>
