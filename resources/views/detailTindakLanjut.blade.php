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
        <form action="{{route('tindak-lanjut.update', $tindakLanjuts->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @if(Request::segment(3)==null)
            <fieldset disabled>
            @endif
                <div class="form-group">
                    <label for="">Jumlah Tindak Lanjut</label>
                    <input type="text" class="form-control" id="jumlahTindakLanjut" name="jumlahTindakLanjut" value="{{$tindakLanjuts->jumlah_tindaklanjut}}">
                </div>
                <div class="form-group">
                    <label for="">Jumlah Rekomendasi</label>
                    <input type="text" class="form-control" id="jumlahRekomendasi" name="jumlahRekomendasi" value="{{$tindakLanjuts->jumlah_rekomendasi}}">
                </div>
                <div class="form-group">
                    <label for="">Tanggal Tindak Lanjut Terakhir Diberikan</label>
                    <input type="date" class="form-control" id="tanggalTindakLanjut" name="tanggalTindakLanjut" value="{{$tindakLanjuts->tanggal_tindaklanjut}}">
                </div>
                <div class="form-group">
                    <div class="col">
                        <div class="row">
                            <p>Lampiran</p>
                        </div>
                        <div class="row">
                            <a href="{{ asset('lampiran/') }}/{{$tindakLanjuts->file}}" target="_blank">lampiran</a>
                        </div>
                    </div>
                    @if(Request::segment(3)=='edit')
                        <input type="file" class="form-control" id="lampiran" name="lampiran">
                    @endif
                </div>
                <!-- @if(Request::segment(3)=='edit')
                <div class="form-group">
                    <label for="">Lampiran</label>
                    <input type="file" class="form-control" id="lampiran" name="lampiran" required>
                </div>
                @endif -->
                <div class="form-group">
                    <label for="">Keterangan</label>
                    <textarea class="form-control" id="keterangan" name="keterangan" rows='3'>{{$tindakLanjuts->keterangan}}</textarea>
                </div>
                {{-- <div class="form-group">
                    <label for="">Rekomendasi</label>
                    <textarea class="form-control" id="rekomendasi" name="rekomendasi" rows='3'>{{$tindakLanjuts->rekomendasi}}</textarea>
                </div> --}}
            @if(Request::segment(3)==null)
            </fieldset>
            <a href="{{route('konfirmasi-pengiriman.index')}}" class="btn btn-primary">Kembali</a>
            <a href="{{route('tindak-lanjut.edit', $tindakLanjuts->id)}}" class="btn btn-warning">Edit</a>
            @else
            <button class="btn btn-success">Simpan</button>
            @endif           
        </form>
    </div>
@endsection