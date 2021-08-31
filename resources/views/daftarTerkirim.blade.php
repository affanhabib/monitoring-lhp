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
                        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop">Detail</a>
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
        <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Modal body</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Understood</button>
      </div>
    </div>
  </div>
</div>

@endsection