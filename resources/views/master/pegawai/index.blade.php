@extends('layouts.master')
@include('master.pegawai.header')
@section('btn')
<a class="btn btn-primary float-right" href="{{ route('master.pegawai.create') }}"> <i class="fas fa-user-plus    "></i> Tambah Pegawai </a>
@endsection
@section('konten')
    <div class="content">
        @include('flash::message')
        <div class="clearfix"></div>
        <div class="card">
            <div class="card-body p-0">
                @include('master.pegawai.table')
                <div class="card-footer clearfix">
                    <div class="float-right">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

