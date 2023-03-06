@extends('layouts.master')
@include('master.jabatan.header')
@section('konten')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Ubah Jabatan</h1>
                </div>
            </div>
        </div>
    </section>
    <div class="content px-3">
        @include('adminlte-templates::common.errors')
        <div class="card">
            {!! Form::model($refJabatan, ['route' => ['master.jabatan.update', $refJabatan->id], 'method' => 'patch']) !!}
            <div class="card-body">
                <div class="row">
                    @include('master.jabatan.fieldEdit')
                </div>
            </div>

            <div class="card-footer">
                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('master.jabatan.index') }}" class="btn btn-default">Cancel</a>
            </div>

            {!! Form::close() !!}

        </div>
    </div>
@endsection
