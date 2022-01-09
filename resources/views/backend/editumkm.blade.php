@extends('layouts.main')
@section('maincontent')
    
    <form action="{{ route('editkanumkm', $editumkm -> id ) }}" method="post">
        @csrf
        <ul class="list-unstyled">
            <li>
                <label for="nama">Nama Pemilik :</label>
                <input type="text" name="nama" id="nama" value="{{ $editumkm -> nama }}" class="form-control mb-2">
            </li>
            <li>
                <label for="usaha">Nama Usaha :</label>
                <input type="text" name="usaha" id="usaha" value="{{ $editumkm -> usaha }}" class="form-control mb-2">
            </li>
            <li>
                <label for="no_hp">Nomor Hp :</label>
                <input type="number" name="no_hp" id="no_hp" value="{{ $editumkm -> no_hp }}" class="form-control mb-2">
            </li>
            <li>
                <label for="email">Email :</label>
                <input type="email" name="email" id="email" value="{{ $editumkm -> email }}" class="form-control mb-2">
            </li>
            <li>
                <label for="rintis">Tanggal Rintis :</label>
                <input type="date" name="rintis" id="rintis" value="{{ $editumkm -> rintis }}" class="form-control mb-2">
            </li>
            <li>
                <button type="submit" class="btn btn-danger my-2">Tambah Data!</button>
            </li>
        </ul>
    </form>
@endsection
