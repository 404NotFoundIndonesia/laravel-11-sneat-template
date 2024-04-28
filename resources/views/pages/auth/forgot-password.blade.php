@extends('layouts.app')

@section('body')
<div class="container-xxl">
    <div class="authentication-wrapper authentication-basic container-p-y">
      <div class="authentication-inner py-4">

        <!-- Forgot Password -->
        <div class="card">
          <div class="card-body">
            <!-- Logo -->
            <div class="app-brand justify-content-center">
              <a href="{{ route('welcome') }}" class="app-brand-link gap-2">
                <span class="app-brand-logo demo"><img src="{{ asset('404_Black.jpg') }}" alt="404 Not Found Indonesia" width="30" style="border-radius: 150px" srcset=""></span>
                <span class="app-brand-text text-body fw-bold fs-3">{{ config('app.name') }}</span>
              </a>
            </div>
            <!-- /Logo -->
            <h4 class="mb-2">Lupa Password? 🔒</h4>
            <p class="mb-4">Masukkan email kamu dan akan kami kirimkan link buat reset password kamu</p>

            @session('status')
            <div class="alert alert-success alert-dismissible" role="alert">
                {{ $value }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                </button>
            </div>
            @endsession

            <form id="formAuthentication" method="POST" class="mb-3" action="{{ route('password.email') }}">
              @csrf
              <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input
                    type="text" class="form-control @error('email') is-invalid @enderror"
                    id="email" name="email"
                    placeholder="Masukkan email" autofocus>
                <span class="error invalid-feedback">{{ $errors->first('email') }}</span>
              </div>
              <button class="btn btn-primary d-grid w-100">Kirim Link Reset</button>
            </form>
            <div class="text-center">
              <a href="{{ route('login') }}" class="d-flex align-items-center justify-content-center">
                <i class="bx bx-chevron-left scaleX-n1-rtl bx-sm"></i>
                Masuk
              </a>
            </div>
          </div>
        </div>
        <!-- /Forgot Password -->
      </div>
    </div>
  </div>
@endsection

@push('style')
<link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/page-auth.css') }}" />
@endpush
