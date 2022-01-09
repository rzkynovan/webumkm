<?php

namespace App\Http\Controllers;

use App\Models\Dagangan;
use App\Models\Umkm;
use Illuminate\Http\Request;

use function PHPUnit\Framework\returnSelf;

class DaganganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datadagangan = Dagangan::with('umkm')->paginate(5);
        return view('dagangan', compact('datadagangan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dataumkm = Umkm::all();
        return view('tambahdagangan', compact('dataumkm'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Dagangan::create([
            "nama" => $request->nama,
            "deskripsi" => $request->deskripsi,
            "harga" => $request->harga,
            "umkm_id" => $request->umkm_id,
        ]);
        return redirect('dagangan');
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
        $editdagangan = Dagangan::findorfail($id);
        return view('editdagangan', compact('editdagangan', 'dataumkm'));
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
        $editdagangan = Dagangan::findorfail($id);
        $editdagangan->update($request->all());
        return redirect('dagangan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hapusdagangan = Dagangan::findorfail($id);
        $hapusdagangan->delete();
        return back();
    }
}
