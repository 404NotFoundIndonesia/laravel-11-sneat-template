@extends('layouts.dashboard')

@section('content')
<h4 class="py-3 mb-4"><span class="text-muted fw-light">Profil /</span> Akun</h4>

<div class="row">
    <div class="col-md-12">
        <div class="card mb-4">
            <h5 class="card-header">Detail Akun</h5>
            <!-- Account -->
            <form action="{{ route('profile.account-update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="d-flex align-items-start align-items-sm-center gap-4">
                        <img
                            src="{{ $account->avatar_url }}"
                            alt="user-avatar"
                            class="d-block rounded"
                            height="100"
                            width="100"
                            id="uploadedAvatar" />
                        <div class="button-wrapper">
                            <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                                <span class="d-none d-sm-block">Upload foto baru</span>
                                <i class="bx bx-upload d-block d-sm-none"></i>
                                <input
                                    type="file"
                                    id="upload"
                                    class="account-file-input"
                                    hidden
                                    name="avatar"
                                    accept="image/png, image/jpeg" />
                            </label>
                            <button type="button" class="btn btn-outline-secondary account-image-reset mb-4">
                                <i class="bx bx-reset d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Reset</span>
                            </button>

                            <p class="text-muted mb-0">Hanya boleh JPG atau PNG. Ukuran maks. 800Kb</p>
                        </div>
                    </div>
                </div>
                <hr class="my-0" />
                <div class="card-body">
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label for="fullName" class="form-label">Nama Lengkap</label>
                            <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" id="fullName" value="{{ old('name', $account->name) }}" autofocus />
                            <span class="error invalid-feedback">{{ $errors->first('name') }}</span>
                        </div>
                        @if($account->isStudent())
                        <div class="mb-3 col-md-6">
                            <label for="nis" class="form-label">NIS</label>
                            <input class="form-control @error('nis') is-invalid @enderror" type="text" name="nis" id="nis" value="{{ old('nis', $account->nis) }}" />
                            <span class="error invalid-feedback">{{ $errors->first('nis') }}</span>
                        </div>
                        @endif
                        <div class="mb-3 col-md-6">
                            <label for="email" class="form-label">Email</label>
                            <input class="form-control @error('email') is-invalid @enderror" type="email" name="email" id="email" value="{{ old('email', $account->email) }}" />
                            <span class="error invalid-feedback">{{ $errors->first('email') }}</span>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="username" class="form-label">Username</label>
                            <input class="form-control @error('username') is-invalid @enderror" type="text" name="username" id="username" value="{{ old('username', $account->username) }}" />
                            <span class="error invalid-feedback">{{ $errors->first('username') }}</span>
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

        <div class="card">
            <h5 class="card-header">Penghapusan Akun</h5>
            <div class="card-body">
            <div class="mb-3 col-12 mb-0">
                <div class="alert alert-warning">
                <h6 class="alert-heading mb-1">Anda yakin ingin menghapus akun Anda?</h6>
                <p class="mb-0">Sekali akun sudah terhapus, semua data dan progres belajar Anda tidak akan bisa kembali. Mohon pertimbangkan kembali.</p>
                </div>
            </div>
            <form id="formAccountDeactivation" method="POST" action="{{ route('profile.account-destroy') }}" onsubmit="return confirmSubmit(event, this)">
                @csrf
                @method('DELETE')
                <div class="form-check mb-3">
                    <input
                        class="form-check-input"
                        type="checkbox"
                        name="deleteAccountConfirmation"
                        id="deleteAccountConfirmation" />
                    <label class="form-check-label" for="deleteAccountConfirmation">
                        Saya mengonfirmasi ingin menghapus akun.
                    </label>
                </div>
                <button type="submit" class="btn btn-danger deactivate-account">Hapus Akun</button>
            </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('script')
    <script src="{{ asset('assets/js/pages-account-settings-account.js') }}"></script>
@endpush
