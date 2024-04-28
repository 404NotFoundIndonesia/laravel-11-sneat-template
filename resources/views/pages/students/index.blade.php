@extends('layouts.dashboard')

@section('content')
<h4 class="py-3 mb-4">Siswa</h4>

<div class="card">
    <div class="card-body">
        <form action="">
            <div class="row">
                <div class="col-12 col-md-8 col-lg-10 col-xl-11">
                    <div class="input-group input-group-merge ">
                        <span class="input-group-text" id="basic-addon-search31"><i class="bx bx-search"></i></span>
                        <input value="{{ request()->query('q') ?? '' }}" type="text" class="form-control" placeholder="Cari..." aria-label="Cari..." name="q" aria-describedby="basic-addon-search31">
                    </div>
                </div>
                <div class=" col-12 col-md-4 col-lg-2 col-xl-1 d-grid gap-2">
                    <button type="submit" class="btn btn-primary">Cari</button>
                </div>
            </div>
        </form>
    </div>

    <div class="table-responsive text-nowrap">
      <table class="table table-hover">
        <thead>
          <tr>
            <th>Nama</th>
            <th>Materi Terakhir</th>
            <th style="min-width: 250px">Progres</th>
            <th width="75px">Aksi</th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
            @foreach ($items as $item)
            <tr>
                <td>
                    <b>{{ $item->name }}</b>
                    <div><small>NIS. {{ $item->nis }}</small></div>
                </td>
                <td><i>Last Progress</i></td>
                <td>
                    <div class="progress" style="height: 20px">
                        <div class="progress-bar progress-bar-striped progress-bar-animated bg-primary" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">20%</div>
                    </div>
                </td>
                <td>
                <div class="dropdown">
                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                        <i class="bx bx-dots-vertical-rounded"></i>
                    </button>
                    <div class="dropdown-menu">
                        <form action="{{ route('students.reset-password', $item->nis) }}" method="post" onsubmit="return confirmSubmit(event, this)">
                            @csrf
                            @method('PATCH')
                            <button class="dropdown-item" type="submit"><i class="bx bx-reset me-1"></i> Reset Password</button>
                        </form>
                        <form action="{{ route('students.destroy', $item->nis) }}" method="post" onsubmit="return confirmSubmit(event, this)">
                            @csrf
                            @method('DELETE')
                            <button class="dropdown-item" type="submit"><i class="bx bx-trash me-1"></i> Hapus</button>
                        </form>
                    </div>
                </div>
                </td>
            </tr>
            @endforeach
        </tbody>
      </table>
    </div>
    <div class="card-footer pb-0">
        {!! $items->links() !!}
    </div>
</div>

@endsection
