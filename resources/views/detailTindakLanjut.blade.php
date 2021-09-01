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
        <form action="" method="">
            <div class="form-group">
                <label for="">Jumlah Tindak Lanjut</label>
                <input type="text" class="form-control" id="jumlahTindakLanjut" name="jumlahTindakLanjut" value="{{$tindakLanjuts->jumlah_tindaklanjut}}" readonly>
            </div>
            <div class="form-group">
                <label for="">Tanggal Tindak Lanjut</label>
                <input type="date" class="form-control" id="tanggalTindakLanjut" name="tanggalTindakLanjut" value="{{$tindakLanjuts->tanggal_tindaklanjut}}" readonly>
            </div>
            <div class="form-group">
                <label for="">Lampiran</label>
                <input type="file" class="form-control" id="lampiran" name="lampiran" value="{{$tindakLanjuts->file}}" readonly>
            </div>
            <div class="form-group">
                <label for="">Keterangan</label>
                <textarea class="form-control" id="keterangan" name="keterangan" rows='3' readonly>{{$tindakLanjuts->keterangan}}</textarea>
            </div>
            <a href="{{route('konfirmasi-pengiriman.index')}}" class="btn btn-primary">Kembali</a>
        </form>
    </div>
@endsection