@extends('layouts.master')
@include('master.pegawai.header')
@section('konten')
 
    <div class="content px-3">
        @include('adminlte-templates::common.errors')
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Buat akun untuk pegawai</h3>
            </div>
            {!! Form::open(['route' => ['master.pegawai.createAkun',$refDinasPegawai->id]]) !!}
            <div class="card-body">
                <div class="card">
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
                                <p class="card-text">{{ $refDinasPegawai->Dinas->JenisDinas->jenis_dinas }} {{ $refDinasPegawai->Dinas->nama_dinas }}</p>
                            </div>
                            <div class="form-group col-sm-12">
                                <h5 class="card-title">Jabatan</h5>
                                <p class="card-text">{{ $refDinasPegawai->Jabatan->jabatan }}</p>
                            </div>
                        </div>
                    </div>
                </div>
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

            <div class="card-footer">
                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('master.pegawai.index') }}" class="btn btn-default">Cancel</a>
            </div>

            {!! Form::close() !!}

        </div>
    </div>
@endsection
