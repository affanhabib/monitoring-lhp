@extends('layouts.app')

@section('content')
<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/home">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Laporan Terkirim</li>
        </ol>
    </nav>
    <h4 class="mb-3">Daftar Laporan Terkirim</h4>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nama Laporan</th>
                <th scope="col">Instansi Penerima</th>
                <th scope="col">Alamat</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($laporans as $laporan)
            @if($laporan->isTerkirim == 1)
                <tr>
                    <td>{{ $laporan->id }}</td>
                    <td>{{ $laporan->nama_laporan }}</td>
                    <td>{{ $laporan->instansi_penerima }}</td>
                    <td>{{ $laporan->alamat_instansi }}</td>
                    <td>
                        <a href="#" class="btn btn-primary">Detail</a>
                        <a href="/tindak-lanjut" class="btn btn-success">Tindak Lanjut</a>
                    </td>
                </tr>
            @endif
            @endforeach
        </tbody>
    </table>
</div>
@endsection