@extends('layouts.anggota_layout')
@section('title', 'Edit Profile')
@section('content')
    <div class="container-fluid">
        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0">Edit Profile</h4>
            </div>

            <div class="text-end">
                <ol class="breadcrumb m-0 py-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Profil</a></li>
                    <li class="breadcrumb-item active">Edit Profile</li>
                </ol>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <form action="{{ url('anggota/profile/edit') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <input type="hidden" name="id_anggota" value="{{ $user->anggota->id_anggota }}">
                    <input type="hidden" name="id_user" value="{{ $user->id_user }}">

                    {{-- Pesan Error --}}
                    <div class="row">
                        {{-- Nama Lengkap --}}
                        <div class="mb-3 col-md-6">
                            <label for="nama" class="form-label m-0">Nama Lengkap</label>
                            <p class="text-muted mb-1" style="font-size: 0.775rem;">Nama Lengkap dengan gelar.
                                Pastikan
                                tidak ada kesalahan untuk di cetak di KTA</p>
                            <input type="text" class="form-control" id="nama" name="nama_anggota"
                                placeholder="Masukkan nama lengkap Anda" value="{{ $user->anggota->nama_anggota }}">
                        </div>

                        {{-- Email --}}
                        <div class="mb-3 col-md-6">
                            <label for="email" class="form-label m-0">Email</label>
                            <p class="text-muted mb-1" style="font-size: 0.775rem;">Email yang valid untuk
                                pengiriman KTA digital</p>
                            <input type="email" class="form-control" id="email" name="email"
                                placeholder="Masukkan email Anda" value="{{ $user->email }}">
                        </div>
                    </div>

                    <div class="row">
                        {{-- NIP/NIPPPK --}}
                        <div class="mb-3 col-md-6">
                            <label for="nip_nippk" class="form-label mb-1">NIP/NIPPPK</label>
                            <input type="tel" class="form-control" id="nip_nippk" name="nip_nipppk"
                                placeholder="Masukkan NIP/NIPPPK Anda" value="{{ $user->anggota->nip_nipppk }}">
                        </div>

                        {{-- Nomor HP / WA --}}
                        <div class="mb-3 col-md-6">
                            <label for="no_hp" class="form-label mb-1">Nomor HP / WA</label>
                            <input type="tel" class="form-control" id="no_hp" name="no_hp"
                                placeholder="Masukkan nomor HP/WA Anda" value="{{ $user->anggota->no_hp }}">
                        </div>
                    </div>

                    <div class="row">
                        {{-- Status Dosen --}}
                        <div class="mb-3 col-md-6">
                            <label for="status_dosen" class="form-label mb-1">Status Dosen</label>
                            <select class="form-select" id="status_dosen" name="status_dosen">
                                <option value="" disabled
                                    {{ old('status_dosen', $user->anggota->status_dosen) ? '' : 'selected' }}>Pilih status
                                    dosen Anda</option>
                                <option value="ASN"
                                    {{ old('status_dosen', $user->anggota->status_dosen) == 'ASN' ? 'selected' : '' }}>ASN
                                </option>
                                <option value="DPK"
                                    {{ old('status_dosen', $user->anggota->status_dosen) == 'DPK' ? 'selected' : '' }}>DPK
                                </option>
                                <option value="Lainnya"
                                    {{ old('status_dosen', $user->anggota->status_dosen) == 'Lainnya' ? 'selected' : '' }}>
                                    Lainnya</option>
                            </select>
                        </div>

                        {{-- Homebase PT --}}
                        <div class="mb-3 col-md-6">
                            <label for="homebase_pt" class="form-label mb-1">Homebase PT</label>
                            <input type="text" class="form-control" id="homebase_pt" name="homebase_pt"
                                placeholder="Masukkan nama PT Anda" value="{{ $user->anggota->homebase_pt }}">
                        </div>
                    </div>

                    <div class="row">
                        {{-- Provinsi --}}
                        <div class="mb-3 col-md-6">
                            <label for="provinsi" class="form-label mb-1">Provinsi</label>
                            <input type="text" class="form-control" id="provinsi" name="provinsi"
                                placeholder="Masukkan provinsi Anda" value="{{ $user->anggota->provinsi }}">
                        </div>

                        {{-- Ganti Foto --}}
                        <div class="mb-3 col-md-6">
                            <label for="foto" class="form-label mb-1">Pas Foto</label>
                            <input type="file" class="form-control" id="foto" name="foto">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="{{ url('/anggota/profile') }}" class="btn btn-light">Kembali</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
