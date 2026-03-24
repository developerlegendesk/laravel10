
<script src="{{ asset('admin/' . mix('js/app.js')) }}" defer></script>
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/js/adminlte.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@yield('third_party_scripts')

@stack('custum_scripts')

<script>
document.addEventListener('DOMContentLoaded', function() {
    @if(session('success'))
        Swal.fire({
            icon: 'success',
            title: 'Updated!',
            text: @json(session('success')), // dynamic text from session
            timer: 2500,
            showConfirmButton: false
        });
    @endif
    @if(session('error'))
        Swal.fire({
            icon: 'error',
            title: 'Error!',
            text: @json(session('error')), // dynamic text from session
            timer: 2500,
            showConfirmButton: false
        });
    @endif
});
</script>
