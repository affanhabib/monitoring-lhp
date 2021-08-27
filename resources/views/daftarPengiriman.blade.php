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
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                Tambah Laporan
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Tambah Laporan</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                                <form action="" method="">
                                    <div class="form-group">
                                        <label for="">Nama Laporan</label>
                                        <input type="text" class="form-control" id="addNamaLaporan" name="addNamaLaporan">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Instansi Penerima</label>
                                        <input type="text" class="form-control" id="addInstansiPenerima" name="addInstansiPenerima">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Tambah Laporan</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection