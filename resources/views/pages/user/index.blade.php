@extends('layouts.dashboard')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h5>{{ __('menu.user') }}</h5>
            <div>
                @can('create_user')
                <a href="{{ route('user.create') }}" class="btn btn-primary">{{ __('button.new_feature', ['feature' => __('menu.user')]) }}</a>
                @endcan
            </div>
        </div>
        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead>
                <tr>
                    <th>{{ __('field.name') }}</th>
                    <th>{{ __('field.email') }}</th>
                    <th>{{ __('field.role') }}</th>
                    <th style="width: 50px"></th>
                </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                @foreach($items as $item)
                    <tr>
                        <td>
                            <a href="{{ route('user.show', $item->id) }}">{{ $item->name }}</a>
                        </td>
                        <td>
                            <a href="mailto:{{ $item->email }}">{{ $item->email }}</a>
                        </td>
                        <td>
                            @foreach($item->roles as $role)
                                <div class="badge rounded-pill bg-label-primary fs-tiny ms-auto">
                                    {{ $role->name }}
                                </div>
                            @endforeach
                        </td>
                        <td>
                            @canany(['edit_user', 'delete_user'])
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                                <div class="dropdown-menu">
                                    @can('edit_user')
                                    <a class="dropdown-item" href="{{ route('user.edit', $item->id) }}"><i class="bx bx-edit-alt me-1"></i>
                                        {{ __('button.edit') }}</a>
                                    @endcan
                                    @can('delete_user')
                                    <form action="{{ route('user.destroy', $item->id) }}" method="post" class="delete-form">
                                        @csrf
                                        @method('DELETE')
                                        <button class="dropdown-item" type="submit">
                                            <i class="bx bx-trash me-1"></i>
                                            {{ __('button.delete') }}
                                        </button>
                                    </form>
                                    @endcan
                                </div>
                            </div>
                            @endcanany
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <div class="card-body">
            {!! $items->links() !!}
        </div>
    </div>
@endsection
