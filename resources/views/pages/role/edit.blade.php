@extends('layouts.dashboard')

@section('content')
    <div class="card">
        <form action="{{ route('role.update', $item->id) }}" method="POST">
            @csrf
            @method('PATCH')
            <div class="card-header d-flex justify-content-between">
                <h5>{{ __('menu.role') }}</h5>
                <div>
                    <a href="{{ route('role.index') }}"
                       class="btn btn-outline-secondary">{{ __('button.back') }}</a>
                    <button type="submit" class="btn btn-primary">{{ __('button.submit') }}</button>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="mb-3 col-md-12">
                        <x-forms.input name="role" autofocus="autofocus" :value="$item->name" />
                    </div>
                    <div class="mb-3 col-md-12">
                        <label for="permission" class="form-label">{{ __('field.permission') }}</label>
                        <div class="table-responsive text-nowrap">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>{{ __('label.module') }}</th>
                                    @foreach($actions as $action)
                                        <th>{{ __('label.action_' . $action->value) }}</th>
                                    @endforeach
                                </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">
                                @foreach($resources as $resource)
                                    <tr>
                                        <td>{{ __('label.resource_' . $resource->value) }}</td>
                                        @foreach($actions as $action)
                                            <td>
                                                <input
                                                    name="permission[]"
                                                    class="form-check-input" type="checkbox"
                                                    @checked(isset($permissions[$action->value . '_' . $resource->value]))
                                                    value="{{ $action }}_{{ $resource }}" id="{{ $action }}_{{ $resource }}">
                                            </td>
                                        @endforeach
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
