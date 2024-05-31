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

@push('style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/select2/select2.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/select2/select2-bootstrap-5-theme.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/sweetalert2/sweetalert2.min.css') }}"/>
@endpush

@push('script')
    <script src="{{ asset('assets/vendor/libs/select2/select2.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/sweetalert2/sweetalert2.all.min.js') }}"></script>
    <script>
        $('.select2').select2({theme: 'bootstrap-5'});

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
                title: "{{ __('label.warning') }}",
                text: "{{ __('label.are_you_sure') }}",
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: "{{ __('label.yes_i_am') }}",
                cancelButtonText: "{{ __('label.cancel') }}",
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
        document.getElementById('logout-menu-button-on-nav').addEventListener('click', function () {
            document.getElementById('logout-menu-form-on-nav').submit();
        });
    </script>
@endpush
