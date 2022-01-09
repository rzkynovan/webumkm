@extends('layouts.main')
@section('maincontent')
    
    <form action="{{ route('tambahkanpelanggan') }}" method="post" enctype="multipart/form-data">
        @csrf
        <ul class="list-unstyled">
            <li>
                <label for="nama">Nama Pelanggan :</label>
                <input type="text" name="nama" id="nama" value="" class="form-control mb-2">
            </li>
            <li>
                <label for="no_hp">Nomor Hp :</label>
                <input type="number" name="no_hp" id="no_hp" value="" class="form-control mb-2">
            </li>
            <li>
                <label for="email">Email :</label>
                <input type="email" name="email" id="email" value="" class="form-control mb-2">
            </li>
            <li>
                <label for="alamat">Alamat :</label>
                <input type="text" name="alamat" id="alamat" value="" class="form-control mb-2">
            </li>
            <li>
                <label for="foto">Foto :</label>
                <input type="file" name="foto" id="foto" value="" class="form-control mb-2">
            </li>
            <li>
                <label for="umkm_id">Dari Usaha :</label>
                <select name="umkm_id" id="umkm_id">
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
