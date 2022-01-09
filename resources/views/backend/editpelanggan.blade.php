@extends('layouts.main')
@section('maincontent')
    
    <form action="{{ route('editkanpelanggan', $editpelanggan -> id ) }}" method="post" enctype="multipart/form-data">
        @csrf
        <ul class="list-unstyled">
            <li>
                <label for="nama">Nama :</label>
                <input type="text" name="nama" id="nama" value="{{ $editpelanggan -> nama }}" class="form-control mb-2">
            </li>
            <li>
                <label for="no_hp">Nomor Hp :</label>
                <input type="number" name="no_hp" id="no_hp" value="{{ $editpelanggan -> no_hp }}" class="form-control mb-2">
            </li>
            <li>
                <label for="email">Email :</label>
                <input type="email" name="email" id="email" value="{{ $editpelanggan -> email }}" class="form-control mb-2">
            </li>
            <li>
                <label for="alamat">Alamat :</label>
                <input type="text" name="alamat" id="alamat" value="{{ $editpelanggan -> alamat }}" class="form-control mb-2">
            </li>
            <li>
                <label for="foto">Foto :</label>
                <input type="file" name="foto" id="foto" value="{{ $editpelanggan -> foto }}" class="form-control mb-2">
                <img src="/fotopelanggan/{{ $editpelanggan -> foto }}" alt="" class="mb-4" width="25%">
            </li>
            <li>
                <label for="umkm_id">Dari UMKM :</label>
                <select name="umkm_id" id="umkm_id">
                    <option value="{{ $editpelanggan -> umkm_id }}">{{ $editpelanggan -> umkm -> usaha }}</option>
                    @foreach ($dataumkm as $umkm)
                        <option value="{{ $umkm -> id }}">{{ $umkm -> usaha }}</option>
                    @endforeach
                </select>
            </li>
            <li>
                <button type="submit" class="btn btn-danger my-2">Tambah Data!</button>
            </li>
        </ul>
    </form>
@endsection
