@extends('layouts.master')
@include('master.jenis-dinas.header')
@section('konten')
<div class="row">
    <div class="col-sm-12">
        @include('flash::message')
        <div class="clearfix"></div>
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Jenis Dinas</h3>
                <div class="card-options">
                    <a class="btn btn-primary float-right" href="{{ route('master.jenis-dinas.create') }}" style="float: right">
                        <i class="fa fa-plus" aria-hidden="true"></i> Tambah Baru
                    </a>  
                </div>
            </div>
            @include('master.jenis-dinas.table')
        </div>
    </div>
</div>
@endsection

