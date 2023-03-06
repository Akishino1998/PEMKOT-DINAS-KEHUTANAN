@extends('layouts.master')
@include('master.dinas.header')
@section('konten')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Ubah Dinas</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">

            {!! Form::model($refDinas, ['route' => ['master.dinas.update', $refDinas->id], 'method' => 'patch']) !!}

            <div class="card-body">
                <div class="row">
                    @include('master.dinas.fieldEdit')
                </div>
            </div>

            <div class="card-footer">
                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('master.dinas.index') }}" class="btn btn-default">Cancel</a>
            </div>

            {!! Form::close() !!}

        </div>
    </div>
@endsection
