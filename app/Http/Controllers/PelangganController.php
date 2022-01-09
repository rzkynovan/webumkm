<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Models\Umkm;
use Illuminate\Http\Request;
use PHPUnit\Framework\Constraint\FileExists;

use function PHPUnit\Framework\fileExists;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datapelanggan = Pelanggan::with('umkm')->paginate(5);
        return view('pelanggan', compact('datapelanggan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dataumkm = Umkm::all();
        return view('tambahpelanggan', compact('dataumkm'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nama = $request->foto;
        $namaFile = time() . rand(100, 999) . "." . $nama->getClientOriginalExtension();
        $nama->move(public_path() . '/fotopelanggan', $namaFile);

        Pelanggan::create([
            "nama" => $request->nama,
            "no_hp" => $request->no_hp,
            "email" => $request->email,
            "alamat" => $request->alamat,
            "umkm_id" => $request->umkm_id,
            "foto" => $namaFile,
        ]);
        return redirect('pelanggan');
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
        $dataumkm = Umkm::all();
        $editpelanggan = Pelanggan::with('umkm')->findorfail($id);
        return view('editpelanggan', compact('dataumkm', 'editpelanggan'));
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
        $editpelanggan = Pelanggan::findorfail($id);
        $foto = $editpelanggan->foto;

        $data = [
            "nama" => $request->nama,
            "no_hp" => $request->no_hp,
            "email" => $request->email,
            "alamat" => $request->alamat,
            "umkm_id" => $request->umkm_id,
            "foto" => $foto,
        ];
        $request->foto->move(public_path() . '/fotopelanggan', $foto);
        $editpelanggan->update($data);
        return redirect('pelanggan');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hapuspelanggan = Pelanggan::findorfail($id);
        $foto = public_path('/fotopelanggan/') . $hapuspelanggan->foto;
        if (FileExists($foto)) {
            @unlink($foto);
        }
        $hapuspelanggan->delete();
        return back();
    }
}
