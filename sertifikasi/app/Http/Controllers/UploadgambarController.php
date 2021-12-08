<?php

namespace App\Http\Controllers;

use App\Models\Uploadgambar;
use Illuminate\Http\Request;

class UploadgambarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dtgambar = Uploadgambar::latest()->get();
        return view('Uploadgambar.Data-gambar', compact('dtgambar'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Uploadgambar.Create-gambar');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nm = $request->gambar;
        $namaFile = time().rand(100,999).".".$nm->getClientOriginalExtension();

        $dtUpload = new Uploadgambar;
        $dtUpload->nama = $request->nama;
        $dtUpload->gambar = $namaFile;

        $nm->move(public_path().'/img',$namaFile);
        $dtUpload->save();
        return redirect('data-gambar');  
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
        $dt = Uploadgambar::findorfail($id);
        return view('Uploadgambar.Edit-gambar',compact('dt'));
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
        $ubah = Uploadgambar::findorfail($id) ;
        $awal=$ubah->gambar;
        $dt = [
            'nama'=>$request['nama'],
            'gambar'=> $awal
        ];
        $request->gambar->move(public_path().'/img', $awal);
        $ubah->update($dt);
        return redirect('data-gambar');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hapus = Uploadgambar::findorfail($id);

        $file = public_path('/img/').$hapus->gambar;
        //Cek jika ada gambar
        if (file_exists($file)){
            //maka hapus file di folder Publicing
            @unlink($file);
        }
        //hapus data di database
        $hapus->delete();
        return back();
    }
}
