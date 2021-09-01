<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TindakLanjut;

class TindakLanjutController extends Controller
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
    public function create($id)
    {
        //
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
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
        $tindakLanjuts = TindakLanjut::where('laporan_id', $id)->first();
        // dd($tindakLanjuts);
        return view('detailTindakLanjut', compact('tindakLanjuts'));
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
        return view('tindakLanjut', compact('id'));
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
        $tindakLanjuts = new Tindaklanjut();

        $fileName = $request->lampiran->getClientOriginalName() . '-' . time() . '.' . $request->lampiran->extension();
        
        $request->lampiran->move(public_path('lampiran'), $fileName);

        $tindakLanjuts->laporan_id = $id;
        $tindakLanjuts->jumlah_tindaklanjut = $request->input('jumlahTindakLanjut');
        $tindakLanjuts->tanggal_tindaklanjut = $request->input('tanggalTindakLanjut');
        $tindakLanjuts->file = $fileName;
        $tindakLanjuts->keterangan = $request->input('keterangan');

        $tindakLanjuts->save();

        return redirect('daftar-laporan-terkirim')->with('success', 'Tindak Lanjut Berhasil Dibuat');
       
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
