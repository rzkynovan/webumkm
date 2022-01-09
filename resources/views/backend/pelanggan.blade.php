@extends('layouts.main')
            @section('maincontent')
            <div class="table-responsive">
                <div class="table-wrapper">
                    <div class="table-title mb-4">
                        <div class="row d-flex justify-content-between">
                            <div class="col-lg-8">
                                <h2>Data Umkm</h2>
                            </div>
                            @if (auth() -> user() -> role == 'admin')
                            <div class="col-lg-2 float-right">
                                <a href="{{ route('tambahpelanggan') }}" class="btn btn-primary">Tambah Data!</a>
                            </div>
                            @endif
                        </div>
                    </div>
                    <table class="table table-bordered text-center">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Nomor Hp</th>
                                <th>Email</th>
                                <th>Alamat</th>
                                <th>Pelanggan Dari</th>
                                <th>Foto</th>
                                @if (auth() -> user() -> role == 'admin')
                                <th>Action</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($datapelanggan as $pelanggan)
                                
                            <tr>
                                <td>{{ $pelanggan -> nama }}</td>
                                <td>{{ $pelanggan -> no_hp }}</td>
                                <td>{{ $pelanggan -> email }}</td>
                                <td>{{ $pelanggan -> alamat }}</td>
                                <td>{{ $pelanggan -> umkm -> usaha }}</td>
                                <td><a href="/fotopelanggan/{{ $pelanggan -> foto }}" target="_blank">Lihat Foto</a></td>
                                @if (auth() -> user() -> role == 'admin')
                                <td class="d-flex gap-3 justify-content-center">
                                    <a href="/editpelanggan/{{ $pelanggan -> id }}" class="icon" title="Edit"><i class="ri-pencil-fill"></i></a>
                                    <a href="" class="icon" title="Lihat Detail"><i class="ri-eye-fill"></i></i></a>
                                    <a href="/hapuspelanggan/{{ $pelanggan -> id }}" class="icon" title="Hapus"><i class="ri-delete-bin-fill"></i></i></a>
                                </td>
                            @endif
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    {{ $datapelanggan-> links() }}
                </div>
            </div>
            @endsection