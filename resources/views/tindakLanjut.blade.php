@extends('layouts.app')

@section('content')
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/home">Home</a></li>
                <li class="breadcrumb-item"><a href="/daftar-laporan-terkirim">Laporan Terkirim</a></li>
                <li class="breadcrumb-item active" aria-current="page">Tindak Lanjut Laporan</li>
            </ol>
        </nav>
        <h4 class="mb-3">Tindak Lanjut Laporan</h4>
        <form action="" method="POST">
            @csrf
            <div class="form-group">
                <label for="">Jumlah Tindak Lanjut</label>
                <input type="text" class="form-control" id="jumlahTindakLanjut" name="jumlahTindakLanjut" required>
            </div>
            <div class="form-group">
                <label for="">Tanggal Tindak Lanjut</label>
                <input type="date" class="form-control" id="tanggalTindakLanjut" name="tanggalTindakLanjut" required>
            </div>
            <div class="form-group">
                <label for="">Lampiran</label>
                <input type="file" class="form-control" id="lampiran" name="lampiran" required>
            </div>
            <div class="form-group">
                <label for="">Keterangan</label>
                <textarea class="form-control" id="keterangan" name="keterangan" rows='3' required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Tambah Tindak Lanjut</button>
        </form>
    </div>
@endsection