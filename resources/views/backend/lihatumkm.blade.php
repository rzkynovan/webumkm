@extends('layouts.main')
@section('maincontent')
<div class="table-responsive">
    <div class="table-wrapper">
        <div class="table-title mb-4">
            <div class="row d-flex justify-content-between">
                <div class="col-lg-8">
                    <h2>Data dari Usaha {{ $lihatumkm -> usaha }}</h2>
                </div>
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
                </tr>
            </thead>
            <tbody>
                    
                <tr>
                    <td>{{ $lihatumkm -> nama }}</td>
                    <td>{{ $lihatumkm -> usaha }}</td>
                    <td>{{ $lihatumkm -> no_hp }}</td>
                    <td>{{ $lihatumkm -> email }}</td>
                    <td>{{ date('d-m-Y', (strtotime($lihatumkm -> rintis)) ) }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
