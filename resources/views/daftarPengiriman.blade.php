@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif

    @if(\Session::has('success'))
        <div class="alert alert-success">
            <p>{{\Session::get('success')}}</p>
        </div>
    @endif

    @if(Auth::user()->role == "tl")
        <div>
            <!-- Button trigger modal -->
            <a type="button" class="btn btn-primary" href="{{route('daftar-pengiriman-laporan.create')}}">
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
                <th scope='col'>Keterangan</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($laporans as $key=>$laporan)
            @if($laporan->isTerkirim != 1)
                <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $laporan->nama_laporan }}</td>
                    <td>{{ $laporan->instansi_penerima }}</td>
                    <td>{{ $laporan->alamat_instansi }}</td>
                    <td>{{ $laporan->keterangan}}</td>
                    <td>
                        <form action="{{route('daftar-pengiriman-laporan.destroy', $laporan->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                            <a href="/konfirmasi-pengiriman" class="btn btn-success">Konfirmasi</a>
                            @if(Auth::user()->role == "tl")
                                <a href="{{route('daftar-pengiriman-laporan.edit', $laporan->id)}}" class="btn btn-warning">Edit</a>
                                <button class="btn btn-danger" type='submit'><i class="fa fa-trash"></i>Hapus</button>
                            @endif
                        </form>
                    </td>
                </tr>
            @endif
            @endforeach
        </tbody>
    </table>
</div>
@endsection