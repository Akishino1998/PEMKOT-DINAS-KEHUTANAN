@extends('layouts.master')
@include('master.surat.header')
@section('btn')
{{-- <a class="btn btn-primary float-right" href="{{ route('master.surat.create') }}"> <i class="fas fa-user-plus    "></i> Tambah Jenis Surat </a> --}}
@endsection
@section('konten')
    <div class="content px-3">
        @include('flash::message')
        <div class="clearfix"></div>
        <div class="card">
            <div class="card-body p-0">
                @include('master.surat.table')
                <div class="card-footer clearfix">
                    <div class="float-right">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

