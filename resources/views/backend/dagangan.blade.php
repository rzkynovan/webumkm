@extends('layouts.main')
            @section('maincontent')
            <div class="table-responsive">
                <div class="table-wrapper">
                    <div class="table-title mb-4">
                        <div class="row d-flex justify-content-between">
                            <div class="col-lg-8">
                                <h2>Data Dagangan</h2>
                            </div>
                            @if (auth() -> user() -> role == 'admin')
                            <div class="col-lg-2 float-right">
                                <a href="{{ route('tambahdagangan') }}" class="btn btn-primary">Tambah Data!</a>
                            </div>
                            @endif
                        </div>
                    </div>
                    <table class="table table-bordered text-center">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Deskripsi</th>
                                <th>Harga</th>
                                <th>Dari Umkm</th>
                                @if (auth() -> user() -> role == 'admin')
                                <th>Action</th>
                            @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($datadagangan as $dagangan)
                                
                            <tr>
                                <td>{{ $dagangan -> nama }}</td>
                                <td>{{ $dagangan -> deskripsi }}</td>
                                <td>Rp. {{ $dagangan -> harga }}</td>
                                <td>{{ $dagangan -> umkm -> usaha }}</td>
                                @if (auth() -> user() -> role == 'admin')
                                <td class="d-flex gap-3 justify-content-center">
                                    <a href="/editdagangan/{{ $dagangan -> id }}" class="icon" title="Edit"><i class="ri-pencil-fill"></i></a>
                                    <a href="/hapusdagangan/{{ $dagangan -> id }}" class="icon" title="Hapus"><i class="ri-delete-bin-fill"></i></i></a>
                                </td>
                            @endif
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    {{ $datadagangan -> links() }}
                </div>
            </div>
            @endsection