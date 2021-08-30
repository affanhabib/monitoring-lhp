@extends('layouts.app')

@section('content')
<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/home">Home</a></li>
            <li class="breadcrumb-item"><a href="/daftar-pengiriman-laporan">Pengiriman Laporan</a></li>
            <li class="breadcrumb-item active" aria-current="page">Tambah Pengiriman Laporan</li>
        </ol>
    </nav>
    <h4 class="mb-3">Tambah Pengiriman Laporan</h4>
    <form action="" method="">
        <div class="form-group">
            <label for="">Nama Laporan</label>
            <input type="text" class="form-control" id="addNamaLaporan" name="addNamaLaporan">
        </div>
        <div class="form-group">
            <label for="">Instansi Penerima</label>
            <input type="text" class="form-control" id="addInstansiPenerima" name="addInstansiPenerima">
        </div>
        <div class="form-group">
            <label for="">Alamat Instansi Penerima</label>
            <input type="text" class="form-control" id="addAlamatInstansi" name="addAlamatInstansi">
        </div>
        <div class="form-group">
            <label for="">Keterangan</label>
            <input type="text" class="form-control" id="addKeterangan" name="addKeterangan">
        </div>
        <button type="submit" class="btn btn-primary">Tambah Laporan</button>
    </form>
</div>
@endsection