@extends('layouts.main')
@section('maincontent')
    
    <form action="{{ route('editkandagangan', $editdagangan -> id ) }}" method="post">
        @csrf
        <ul class="list-unstyled">
            <li>
                <label for="nama">Nama Pemilik :</label>
                <input type="text" name="nama" id="nama" value="{{ $editdagangan -> nama }}" class="form-control mb-2">
            </li>
            <li>
                <label for="deskripsi">Deskripsi :</label>
                <input type="text" name="deskripsi" id="deskripsi" value="{{ $editdagangan -> deskripsi }}" class="form-control mb-2">
            </li>
            <li>
                <label for="harga">Harga:</label>
                <input type="number" name="harga" id="harga" value="{{ $editdagangan -> harga }}" class="form-control mb-2">
            </li>
            <li>
                <label for="umkm_id">Dari UMKM :</label>
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
