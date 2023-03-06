@extends('layouts.master')
@include('master.pegawai.header')
@section('konten')
    <div class="content px-3">
        @include('adminlte-templates::common.errors')
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Pegawai @if ($refDinasPegawai->id_user == null)<span class="badge badge-pill badge-danger mt-2">Belum Punya Akun </span> @else <span class="badge badge-pill badge-primary mt-2">Sudah Punya Akun </span> @endif</h3>
            </div>
            {!! Form::model($refDinasPegawai, ['route' => ['master.pegawai.update', $refDinasPegawai->id], 'method' => 'patch']) !!}
            <div class="card-body">
                <div class="row">
                    <div class="form-group col-sm-12">
                        {!! Form::label('nama', 'Nama') !!}
                        {!! Form::text('nama', null, ['class' => 'form-control','maxlength' => 100,'maxlength' => 100]) !!}
                    </div>
                    <div class="form-group col-sm-12">
                        {!! Form::label('nip', 'NIP') !!}
                        {!! Form::text('nip', null, ['class' => 'form-control','maxlength' => 100,'maxlength' => 100]) !!}
                    </div>
                    <div class="form-group col-sm-12">
                        {!! Form::label('dinas', 'Pilih Dinas') !!}
                        <select name="dinas" class="form-control">
                            @foreach ($dinas as $item)
                                <option value="{{ $item->id }}" {{ ($item->id==$refDinasPegawai->id_dinas)?"selected":"" }}>{{ $item->nama_dinas }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-sm-12">
                        {!! Form::label('jenis_dinas', 'Jabatan') !!}
                        <select name="jabatan" class="form-control">
                            @foreach ($jabatan as $item)
                                <option value="{{ $item->id }}" {{ ($item->id==$refDinasPegawai->id_jabatan)?"selected":"" }}>{{ $item->jabatan }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                @if ($refDinasPegawai->id_user == null)
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Akun <span class="badge badge-pill badge-info mt-2">Diisi jika pegawai diperbolehkan mengakses aplikasi</span></h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-sm-12">
                                    {!! Form::label('email', 'Email:') !!}
                                    {!! Form::email('email', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
                                </div>
                                <div class="form-group col-sm-12">
                                    {!! Form::label('password', 'Password:') !!}
                                    {!! Form::password('password', ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
                                </div>
                                <div class="form-group col-sm-12">
                                    {!! Form::label('role', 'Role') !!}
                                    <select name="role" class="form-control">
                                        <option value="">--- Pilih Role ---</option>
                                        @foreach ($role as $item)
                                            <option value="{{ $item->id }}">{{ $item->role }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Ubah Akun</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-sm-12">
                                    {!! Form::label('role', 'Role') !!}
                                    <select name="role" class="form-control">
                                        <option value="">--- Pilih Role ---</option>
                                        @foreach ($role as $item)
                                            <option value="{{ $item->id }}" {{ ($item->id==$refDinasPegawai->User->role)?"selected":"" }}>{{ $item->role }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-12">
                                    <li class="list-group-item">
                                        Nonaktifkan Penggunaan Aplikasi
                                        <div class="material-switch pull-right">
                                            <input id="non_aktif" name="non_aktif" type="checkbox" {{ ($refDinasPegawai->User->non_aktif == null)?"":"checked" }}>
                                            <label for="non_aktif" class="label-danger"></label>
                                        </div>
                                    </li>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                
            </div>
            <div class="card-footer">
                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('master.pegawai.index') }}" class="btn btn-default">Cancel</a>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
