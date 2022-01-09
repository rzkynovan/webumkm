<?php

namespace App\Http\Controllers;

use App\Models\Dagangan;
use App\Models\Umkm;
use Illuminate\Http\Request;

class UmkmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataumkm = Umkm::paginate(3);
        return view('umkm', compact('dataumkm'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tambahumkm');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Umkm::create([
            'nama' => $request->nama,
            'usaha' => $request->usaha,
            'no_hp' => $request->no_hp,
            'email' => $request->email,
            'rintis' => $request->rintis,
        ]);
        return redirect('umkm');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $lihatumkm = Umkm::findorfail($id);
        return view('lihatumkm', compact('lihatumkm'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $editumkm = Umkm::findorfail($id);
        return view('editumkm', compact('editumkm'));
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
        $editumkm = Umkm::findorfail($id);
        $editumkm->update($request->all());
        return redirect('umkm');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hapusumkm = Umkm::findorfail($id);
        $hapusumkm->delete();
        return back();
    }
}
