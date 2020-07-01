@extends('layouts.pmaster')

@section('header')
@parent
@endsection

@section('title', 'Hasil Penerimaan')

@section('header_title', 'Hasil Penerimaan Peserta Didik Baru')

@section('breadcrumb', 'Hasil Penerimaan')

@section('content')
<div class="site-section">
    <div class="container text-dark">
        <table class="table">
            <thead class="thead-dark">
                <th>Kode Formulir</th>
                <th>Nama Siswa</th>
                <th>Alamat</th>
                <th>Status</th>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $data['formulir_id'] }}</td>
                    <td>{{ $data['nama_lengkap'] }}</td>
                    <td>{{ $data['alamat']}}</td>
                    <td>{{ $data['status'] }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection