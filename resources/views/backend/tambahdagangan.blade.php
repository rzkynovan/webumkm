@extends('layouts.main')
@section('maincontent')
    
    <form action="{{ route('tambahkandagangan') }}" method="post">
        @csrf
        <ul class="list-unstyled">
            <li>
                <label for="nama">Nama Dagangan :</label>
                <input type="text" name="nama" id="nama" value="" class="form-control mb-2">
            </li>
            <li>
                <label for="deskripsi">Deskripsi :</label>
                <input type="text" name="deskripsi" id="deskripsi" value="" class="form-control mb-2">
            </li>
            <li>
                <label for="harga">Harga</label>
                <input type="number" name="harga" id="harga" value="Rp." class="form-control mb-2">
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
