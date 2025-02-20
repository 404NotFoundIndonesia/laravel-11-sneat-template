@extends('layouts.dashboard')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h5>{{ __('menu.activity_log') }}</h5>
            <div>
                <form action="{{ route('account.log.destroy.bulk') }}" method="post" class="delete-form">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger">
                        {{ __('button.delete_all') }}
                    </button>
                </form>
            </div>
        </div>
        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead>
                <tr>
                    <th>{{ __('field.timestamp') }}</th>
                    <th>{{ __('field.module') }}</th>
                    <th>{{ __('field.description') }}</th>
                    <th style="width: 50px"></th>
                </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                @foreach($items as $item)
                    <tr>
                        <td>{{ $item->created_at }}</td>
                        <td>{{ $item->module }}</td>
                        <td>{!! $item->description !!}</td>
                        <td>
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                                <div class="dropdown-menu">
                                    <form action="{{ route('account.log.destroy', $item->id) }}" method="post" class="delete-form">
                                        @csrf
                                        @method('DELETE')
                                        <button class="dropdown-item" type="submit">
                                            <i class="bx bx-trash me-1"></i>
                                            {{ __('button.delete') }}
                                        </button>
                                    </form>
                                </div>
                            </div>
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
