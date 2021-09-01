@extends('layouts.app')

@section('content')
<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Home</li>
        </ol>
    </nav>
    <h4 class="mb-3">Selamat Datang, {{ Auth::user()->name }}</h4>
    <div class="card-group">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title font-weight-bold">Daftar Pengiriman Laporan</h5>
                <p class="card-text">Pada bagian ini terdapat daftar laporan yang perlu dikirim.</p>
                <a href="/daftar-pengiriman-laporan" class="stretched-link"></a>
            </div>
        </div>
        @if(Auth::user()->role == "tl")
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title font-weight-bold">Daftar Laporan Terkirim</h5>
                    <p class="card-text">Pada bagian ini terdapat daftar laporan yang sudah dikirim.</p>
                    <a href="{{route('konfirmasi-pengiriman.index')}}" class="stretched-link"></a>
                </div>
            </div>
        @endif
    </div>
</div>
@endsection
