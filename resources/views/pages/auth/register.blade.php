@extends('layouts.app')

@section('body')
<div class="container-xxl">
    <div class="authentication-wrapper authentication-basic container-p-y">
      <div class="authentication-inner">
        <!-- Register Card -->
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
            <h4 class="mb-2">{{ __('label.adventure_start_here') }} </h4>
            <p class="mb-4">{{ __('label.lets_create_an_account') }}</p>

            <form id="formAuthentication" class="mb-3" action="{{ route('register') }}" method="POST">
              @csrf
              <div class="mb-3">
                <label for="name" class="form-label">{{ __('field.name') }}</label>
                <input
                  type="text"
                  class="form-control @error('name') is-invalid @enderror"
                  id="name"
                  name="name"
                  placeholder="{{ __('label.enter_field', ['field' => __('field.name')]) }}"
                  value="{{ old('name') }}"
                  autofocus />
                  <span class="error invalid-feedback">{{ $errors->first('name') }}</span>
              </div>
              <div class="mb-3">
                <label for="email" class="form-label">{{ __('field.email') }}</label>
                <input type="text" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" id="email" name="email" placeholder="{{ __('label.enter_field', ['field' => __('field.email')]) }}" />
                <span class="error invalid-feedback">{{ $errors->first('email') }}</span>
              </div>
              <div class="mb-3 form-password-toggle">
                <label class="form-label" for="password">{{ __('field.password') }}</label>
                <div class="input-group input-group-merge">
                  <input
                    type="password"
                    id="password"
                    class="form-control @error('password') is-invalid @enderror"
                    name="password"
                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                    aria-describedby="password" />
                  <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                  <span class="error invalid-feedback">{{ $errors->first('password') }}</span>
                </div>
              </div>
              <div class="mb-3 form-password-toggle">
                <label class="form-label" for="password_confirmation">{{ __('field.password_confirmation') }}</label>
                <div class="input-group input-group-merge">
                  <input
                    type="password"
                    id="password_confirmation"
                    class="form-control @error('password_confirmation') is-invalid @enderror"
                    name="password_confirmation"
                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                    aria-describedby="password_confirmation" />
                  <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                  <span class="error invalid-feedback">{{ $errors->first('password_confirmation') }}</span>
                </div>
              </div>

              <button class="btn mt-4 btn-primary d-grid w-100" type="submit">{{ __('button.register') }}</button>
            </form>

            <p class="text-center">
              <span>{{ __('label.already_have_an_account') }}</span>
              <a href="{{ route('login') }}">
                <span>{{ __('label.login') }}</span>
              </a>
            </p>
          </div>
        </div>
        <!-- Register Card -->
      </div>
    </div>
</div>
@endsection

@push('style')
<link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/page-auth.css') }}" />
@endpush
