@extends('layouts.master')
@include('master.pegawai.header')
@section('konten')
<div class="content px-3">
    @include('adminlte-templates::common.errors')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Pegawai @if ($refDinasPegawai->id_user == null)<span class="badge badge-pill badge-danger">Belum Punya Akun </span> @else <span class="badge badge-pill badge-primary">Sudah Punya Akun </span> @endif</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="form-group col-sm-12">
                    <h5 class="card-title">Nama</h5>
                    <p class="card-text">{{ $refDinasPegawai->nama }}</p>
                </div>
                <div class="form-group col-sm-12">
                    <h5 class="card-title">NIP</h5>
                    <p class="card-text">{{ $refDinasPegawai->nip }}</p>
                </div>
                <div class="form-group col-sm-12">
                    <h5 class="card-title">Nama Dinas</h5>
                    <p class="card-text">{{ $refDinasPegawai->Dinas->nama_dinas }}</p>
                </div>
                <div class="form-group col-sm-12">
                    <h5 class="card-title">Jabatan</h5>
                    <p class="card-text">{{ $refDinasPegawai->Jabatan->jabatan }}</p>
                </div>
            </div>
            @if ($refDinasPegawai->id_user != null)
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Akun </h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-sm-12">
                                <h5 class="card-title">Role</h5>
                                <p class="card-text">{{ $refDinasPegawai->User->Role->role }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            
        </div>
        <div class="card-footer">
            <a href="{{ route('master.pegawai.index') }}" class="btn btn-primary">Kembali</a>
        </div>
    </div>
</div>
@endsection
