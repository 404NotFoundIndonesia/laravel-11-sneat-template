@extends('layouts.dashboard')

@section('content')
    <h4 class="py-3 mb-4">
        <span class="text-muted fw-light">{{ __('menu.account') }} /</span> {{ __('menu.profile') }}
    </h4>

    <div class="row">
        <div class="col-md-12">
            <ul class="nav nav-pills flex-column flex-md-row mb-3">
                <li class="nav-item">
                    <a class="nav-link active" href="javascript:void(0);">
                        <i class="bx bx-user me-1"></i> {{ __('menu.profile') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('account.password.edit') }}">
                        <i class="bx bx-lock-open-alt me-1"></i> {{ __('menu.change_password') }}
                    </a>
                </li>
            </ul>
            <div class="card mb-4">
                <h5 class="card-header">{{ __('label.profile_information') }}</h5>
                <!-- Account -->
                <div class="card-body">
                    <form id="formAccountSettings" action="{{ route('account.profile.update') }}" method="POST">
                        @csrf
                        @method('patch')
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <x-forms.input name="name" :value="$user->name"/>
                            </div>
                            <div class="mb-3 col-md-6">
                                <x-forms.input name="email" type="email" :value="$user->email"/>
                            </div>
                        </div>
                        <div class="mt-2">
                            <button type="submit" class="btn btn-primary me-2">{{ __('button.submit') }}</button>
                            <button type="reset" class="btn btn-outline-secondary">{{ __('button.reset') }}</button>
                        </div>
                    </form>
                </div>
                <!-- /Account -->
            </div>
            <div class="card">
                <h5 class="card-header">{{ __('label.delete_account') }}</h5>
                <div class="card-body">
                    <div class="mb-3 col-12 mb-0">
                        <div class="alert alert-warning">
                            <h6 class="alert-heading fw-medium mb-1">{{ __('label.are_you_sure_delete_account') }}</h6>
                            <p class="mb-0">{{ __('label.once_your_account_deleted') }}</p>
                        </div>
                    </div>
                    <form id="formAccountDeactivation" method="post" action="{{ route('account.profile.destroy') }}">
                        @csrf
                        @method('delete')
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <x-forms.input-password name="password"/>
                            </div>
                        </div>
                        <div class="form-check mb-3">
                            <input class="form-check-input" disabled type="checkbox" name="accountActivation"
                                   id="accountActivation"/>
                            <label class="form-check-label"
                                   for="accountActivation">{{ __('label.im_sure_delete_account') }}</label>
                        </div>
                        <button type="submit" disabled class="btn btn-danger deactivate-account"
                                id="accountActivationButton">{{ __('button.delete_permanently') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        const checkBox = $('#accountActivation');
        const accountActivationButton = $('#accountActivationButton');

        $('#password').on('keyup', function (e) {
            checkBox.attr("disabled", e.target.value.length === 0);
        });

        checkBox.on('change', function (e) {
            accountActivationButton.attr('disabled', !checkBox.prop('checked'));
        })

        console.log($('#accountActivation'));
    </script>
@endpush
