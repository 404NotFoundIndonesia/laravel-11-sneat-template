@extends('layouts.dashboard')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h5>{{ __('menu.user') }}</h5>
            <div>
                <a href="{{ route('user.index') }}"
                   class="btn btn-outline-secondary">{{ __('button.back') }}</a>
                @can('edit_user')
                <a href="{{ route('user.edit', $item->id) }}"
                   class="btn btn-primary">{{ __('button.edit') }}</a>
                @endcan
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="mb-3 col-md-12">
                    <label for="role" class="form-label">{{ __('field.name') }}</label>
                    <input type="text" class="form-control-plaintext" readonly value="{{ $item->name }}">
                </div>
                <div class="mb-3 col-md-12">
                    <label for="role" class="form-label">{{ __('field.email') }}</label>
                    <input type="text" class="form-control-plaintext" readonly value="{{ $item->email }}">
                </div>
                <div class="mb-3 col-md-12">
                    <label for="role" class="form-label">{{ __('field.role') }}</label>
                    <input type="text" class="form-control-plaintext" readonly value="{{ $item->roles[0]?->name }}">
                </div>
            </div>
        </div>
    </div>
@endsection
