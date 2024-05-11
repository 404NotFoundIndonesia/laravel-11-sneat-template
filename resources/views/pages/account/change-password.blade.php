@extends('layouts.dashboard')

@section('content')
<h4 class="py-3 mb-4"><span class="text-muted fw-light">Akun /</span> Ganti Password</h4>

<div class="row">
    <div class="col-md-12">
        <ul class="nav nav-pills flex-column flex-md-row mb-3">
          <li class="nav-item"><a class="nav-link" href="{{ route('account.profile.edit') }}"><i class="bx bx-user me-1"></i> Profil</a></li>
          <li class="nav-item"><a class="nav-link active" href="javascript:void(0);"><i class="bx bx-lock-open-alt me-1"></i> Ganti Password</a></li>
        </ul>
        <div class="card mb-4">
            <!-- Account -->
            <form action="{{ route('password.update') }}" method="POST">
                @csrf
                @method('put')
                <div class="card-body">
                    <div class="row">
                        <div class="mb-3 form-password-toggle col-md-12">
                          <div class="d-flex justify-content-between">
                            <label class="form-label" for="current_password">Password Lama</label>
                          </div>
                          <div class="input-group input-group-merge">
                            <input
                              type="password"
                              id="current_password"
                              class="form-control @error('current_password') is-invalid @enderror"
                              name="current_password"
                              placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                              aria-describedby="new password" />
                            <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                            <span class="error invalid-feedback">{{ $errors->first('current_password') }}</span>
                          </div>
                        </div>
                        <div class="mb-3 form-password-toggle col-md-12">
                          <div class="d-flex justify-content-between">
                            <label class="form-label" for="password">Password Baru</label>
                          </div>
                          <div class="input-group input-group-merge">
                            <input
                              type="password"
                              id="password"
                              class="form-control @error('password') is-invalid @enderror"
                              name="password"
                              placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                              aria-describedby="new password" />
                            <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                            <span class="error invalid-feedback">{{ $errors->first('password') }}</span>
                          </div>
                        </div>
                        <div class="mb-3 form-password-toggle col-md-12">
                          <div class="d-flex justify-content-between">
                            <label class="form-label" for="password_confirmation">Konfirmasi Password Baru</label>
                          </div>
                          <div class="input-group input-group-merge">
                            <input
                              type="password"
                              id="password"
                              class="form-control @error('password_confirmation') is-invalid @enderror"
                              name="password_confirmation"
                              placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                              aria-describedby="confirm password" />
                            <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                            <span class="error invalid-feedback">{{ $errors->first('password_confirmation') }}</span>
                          </div>
                        </div>
                    </div>
                    <div class="mt-2">
                        <button type="submit" class="btn btn-primary me-2">Simpan</button>
                        <button type="reset" class="btn btn-outline-secondary">Batal</button>
                    </div>
                </div>
            </form>
            <!-- /Account -->
        </div>
    </div>
</div>
@endsection
