@extends('layouts.app')

@section('content')
<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/home">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Pengiriman Laporan</li>
        </ol>
    </nav>
    <h4 class="mb-3">Daftar Pengiriman Laporan</h4>
    @if(Auth::user()->role == "tl")
        <div>
            <!-- Button trigger modal -->
            <a type="button" class="btn btn-primary" href="/tambah-pengiriman-laporan">
                Tambah Laporan
            </a>
        </div>
    @endif
@endsection