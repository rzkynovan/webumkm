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
                                <a href="{{ route('tambahumkm') }}" class="btn btn-primary">Tambah Data!</a>
                            </div>
                            @endif
                        </div>
                    </div>
                    <table class="table table-bordered text-center">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Nama Usaha</th>
                                <th>Nomor Hp</th>
                                <th>Email</th>
                                <th>Tanggal Rintis</th>
                                @if (auth() -> user() -> role == 'admin')
                                <th>Action</th>
                            @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dataumkm as $umkm)
                                
                            <tr>
                                <td>{{ $umkm -> nama }}</td>
                                <td>{{ $umkm -> usaha }}</td>
                                <td>{{ $umkm -> no_hp }}</td>
                                <td>{{ $umkm -> email }}</td>
                                <td>{{ date('d-m-Y', strtotime($umkm -> rintis)) }}</td>
                                @if (auth() -> user() -> role == 'admin')
                                <td class="d-flex gap-3 justify-content-center">
                                    <a href="/editumkm/{{ $umkm -> id }}" class="icon" title="Edit"><i class="ri-pencil-fill"></i></a>
                                    <a href="/lihatumkm/{{ $umkm -> id }}" class="icon" title="Lihat Detail"><i class="ri-eye-fill"></i></i></a>
                                    <a href="/hapusumkm/{{ $umkm -> id }}" class="icon" title="Hapus"><i class="ri-delete-bin-fill"></i></i></a>
                                </td>
                            @endif
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    {{ $dataumkm -> links() }}
                </div>
            </div>
            @endsection