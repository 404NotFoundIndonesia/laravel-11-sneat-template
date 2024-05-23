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
                                <span class="app-brand-logo demo">
                                    <img src="{{ asset('404_Black.jpg') }}" alt="404 Not Found Indonesia" width="30"
                                         style="border-radius: 150px" srcset="">
                                </span>
                                <span class="app-brand-text text-body fw-bold fs-3">{{ config('app.name') }}</span>
                            </a>
                        </div>
                        <!-- /Logo -->
                        
                        <h4 class="mb-2">{{ __('label.adventure_start_here') }} </h4>
                        <p class="mb-4">{{ __('label.lets_create_an_account') }}</p>

                        <form id="formAuthentication" class="mb-3" action="{{ route('register') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <x-forms.input name="name" :value="null"/>
                            </div>
                            <div class="mb-3">
                                <x-forms.input name="email" :value="null" type="email"/>
                            </div>
                            <div class="mb-3">
                                <x-forms.input-password name="password"/>
                            </div>
                            <div class="mb-3">
                                <x-forms.input-password name="password_confirmation"/>
                            </div>

                            <button class="btn mt-4 btn-primary d-grid w-100" type="submit">
                                {{ __('button.register') }}
                            </button>
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
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/page-auth.css') }}"/>
@endpush
