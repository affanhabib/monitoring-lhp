@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
@endpush

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
            @if($laporan->isTerkirim != 1)
                <tr>
                    <td>{{ $laporan->id }}</td>
                    <td>{{ $laporan->nama_laporan }}</td>
                    <td>{{ $laporan->instansi_penerima }}</td>
                    <td>{{ $laporan->alamat_instansi }}</td>
                    <td>
                        <a href="{{ route('laporans.show','$laporan->id') }}" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop">Detail</a>
                    </td>
                </tr>
            @endif
            @endforeach
        </tbody>
    </table>
</div>
<!-- Detail Modal -->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Detail Laporan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body">
            <fieldset disabled>
                <div class="form-group">
                    <label for="disabledTextInput">Nama Laporan</label>
                    <input type="text" id="disabledTextInput" class="form-control" value="Disabled input">
                </div>
            </fieldset>
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Understood</button>
      </div>
    </div>
  </div>
</div>
@endsection