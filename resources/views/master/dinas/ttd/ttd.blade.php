@extends('layouts.master')
@include('master.dinas.header')

@section('konten')
    <div class="content px-3">
        @include('flash::message')
        <div class="clearfix"></div>
        <livewire:dinas.t-t-d :dinas=$refDinas>
    </div>
@endsection

