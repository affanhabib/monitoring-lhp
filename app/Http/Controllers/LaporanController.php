<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Laporan;
use App\Models\TindakLanjut;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // //
        $laporans = Laporan::all();
        return view('daftarPengiriman', compact('laporans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('tambahLaporan');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        //dd($request);
        $this->validate($request,[
            'namaLaporan'=>'required',
            'instansiPenerima'=>'required',
            'alamatInstansi'=>'required',
        ]);

        $laporan = new Laporan();

        $laporan->nama_laporan = $request->input('namaLaporan');
        $laporan->instansi_penerima = $request->input('instansiPenerima');
        $laporan->alamat_instansi = $request->input('alamatInstansi');
        $laporan->keterangan = $request->input('keterangan');

        $laporan->save();

        return redirect()->route('daftar-pengiriman-laporan.index')->with('success', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $laporan = Laporan::findOrFail($id);
        return view('editLaporan', compact('laporan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate($request,[
            'namaLaporan'=>'required',
            'instansiPenerima'=>'required',
            'alamatInstansi'=>'required',
        ]);

        $laporan = Laporan::findOrFail($id);

        $laporan->nama_laporan = $request->input('namaLaporan');
        $laporan->instansi_penerima = $request->input('instansiPenerima');
        $laporan->alamat_instansi = $request->input('alamatInstansi');
        $laporan->keterangan = $request->input('keterangan');

        $laporan->save();
        return redirect('daftar-pengiriman-laporan')->with('success', 'Data Berhasil Diperbarui');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $laporan = Laporan::findOrFail($id);
        $laporan->delete();
        return redirect('daftar-pengiriman-laporan')->with('success', 'Data Berhasil Dihapus');
    }

    //funtion for daftarLaporanTerkirm view
    public function terkirim()
    {
        // //
        $data['laporans'] = Laporan::all();
        $data['tindakLanjuts'] = TindakLanjut::all();
        // return view('daftarTerkirim', compact('laporans'));
        return view('daftarTerkirim', ['data'=>$data]);
    }

}
