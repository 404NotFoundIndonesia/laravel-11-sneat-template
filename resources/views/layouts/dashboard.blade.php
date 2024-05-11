@extends('layouts.app')

@section('body')
<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
      <!-- Menu -->
      @include('components.sidebar')
      <!-- / Menu -->

      <!-- Layout container -->
      <div class="layout-page">
        <!-- Navbar -->
        @include('components.navbar')
        <!-- / Navbar -->

        <!-- Content wrapper -->
        <div class="content-wrapper">
          <!-- Content -->

          <div class="container-xxl flex-grow-1 container-p-y">
              @yield('content')
          </div>
          <!-- / Content -->

          <!-- Footer -->
          @include('components.footer')
          <!-- / Footer -->

          <div class="content-backdrop fade"></div>
        </div>
        <!-- Content wrapper -->
      </div>
      <!-- / Layout page -->
    </div>

    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>
</div>
@endsection

@push('script')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    const Toast = Swal.mixin({
        toast: true,
        position: "bottom-end",
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.onmouseenter = Swal.stopTimer;
            toast.onmouseleave = Swal.resumeTimer;
        }
    });

    function confirmSubmit(e, form) {
        e.preventDefault();
        Swal.fire({
            title: 'Perhatian',
            text: 'Apakah Anda yakin?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: 'Iya, saya yakin!',
            cancelButtonText: 'Batalkan'
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            }
        });

        return false;
    }
</script>

@session('notification')
<script>
    Toast.fire({
        icon: "{{ $value['icon'] }}",
        title: "{{ $value['title'] ?? '' }}",
        text: "{{ $value['message'] ?? '' }}",
    });
</script>
@endsession

<script>
    document.getElementById('logout-menu-button-on-nav').addEventListener('click', function() {
        document.getElementById('logout-menu-form-on-nav').submit();
    });
</script>
@endpush
