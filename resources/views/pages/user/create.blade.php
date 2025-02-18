@extends('layouts.dashboard')

@section('content')
    <div class="card">
        <form action="{{ route('user.store') }}" method="POST">
            @csrf
            <div class="card-header d-flex justify-content-between">
                <h5>{{ __('menu.user') }}</h5>
                <div>
                    <a href="{{ route('user.index') }}"
                       class="btn btn-outline-secondary">{{ __('button.back') }}</a>
                    <button type="submit" class="btn btn-primary">{{ __('button.submit') }}</button>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="mb-3 col-md-12">
                        <x-forms.input name="name" autofocus="autofocus" />
                    </div>
                    <div class="mb-3 col-md-12">
                        <x-forms.input name="email" type="email" />
                    </div>
                    <div class="mb-3 col-md-12">
                        <x-forms.input-select2 name="role" :options="$roles"/>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
