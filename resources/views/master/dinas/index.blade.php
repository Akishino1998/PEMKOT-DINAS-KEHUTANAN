@extends('layouts.master')
@include('master.dinas.header')
@section('btn')
<a class="btn btn-primary float-right" href="{{ route('master.dinas.create') }}"> <i class="fas fa-plus    "></i> Tambah Baru </a>
@endsection
@section('konten')
    <div class="content px-3">
        @include('flash::message')
        <div class="clearfix"></div>
        <div class="card">
            <div class="card-body p-0">
                @include('master.dinas.table')
                <div class="card-footer clearfix">
                    <div class="float-right">
                        
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection

