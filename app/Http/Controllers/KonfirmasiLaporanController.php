<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Laporan;
use Auth;

class KonfirmasiLaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        
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
        return view('konfirmasiPengiriman', compact('laporan'));
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
        //dd($request);
        $this->validate($request,[
            'longitude'=>'required',
            'latitude'=>'required',
            'namaPenerima'=>'required',
            'gambarLaporan'=>'required',
        ]);

        $laporan = Laporan::findOrFail($id);

        $imgName = $request->gambarLaporan->getClientOriginalName() . '-' . time() . '.' . $request->gambarLaporan->extension();
        
        $request->gambarLaporan->move(public_path('image'), $imgName);

        $laporan->pengirim_id = Auth::user()->id;
        $laporan->longitude = $request->input('longitude');
        $laporan->latitude = $request->input('latitude');
        $laporan->nama_penerima = $request->input('namaPenerima');
        $laporan->image = $imgName;
        $laporan->isTerkirim = 2;
        $laporan->keterangan = $request->input('keterangan');

        $laporan->save();

        return redirect('daftar-pengiriman-laporan')->with('success', 'Data Berhasil Dikonfirmasi');

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
    }
}
