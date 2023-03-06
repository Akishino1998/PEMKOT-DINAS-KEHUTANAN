@extends('layouts.master')
@include('master.jenis-dinas.header')
@section('konten')
    <div class="content px-3">
        @include('adminlte-templates::common.errors')
        <div class="card">
            {!! Form::open(['route' => 'master.jenis-dinas.store']) !!}
            <div class="card-body">
                <div class="row">
                    @include('master.jenis-dinas.fields')
                </div>
            </div>
            <div class="card-footer">
                {!! Form::submit('Simpan', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('master.jenis-dinas.index') }}" class="btn btn-light">Kembali</a>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection

