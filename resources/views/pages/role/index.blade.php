@extends('layouts.dashboard')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h5>{{ __('menu.role') }}</h5>
            <div>
                @can('create_role')
                <a href="{{ route('role.create') }}" class="btn btn-primary">{{ __('button.new_feature', ['feature' => __('menu.role')]) }}</a>
                @endcan
            </div>
        </div>
        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead>
                <tr>
                    <th>{{ __('field.role') }}</th>
                    <th style="width: 50px"></th>
                </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                @foreach($items as $item)
                    <tr>
                        <td>
                            <a href="{{ route('role.show', $item->id) }}">{{ $item->name }}</a>
                        </td>
                        <td>
                            @canany(['edit_role', 'delete_role'])
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                                <div class="dropdown-menu">
                                    @can('edit_role')
                                    <a class="dropdown-item" href="{{ route('role.edit', $item->id) }}"><i class="bx bx-edit-alt me-1"></i>
                                        {{ __('button.edit') }}</a>
                                    @endcan
                                    @can('delete_role')
                                    <form action="{{ route('role.destroy', $item->id) }}" method="post" class="delete-form">
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
