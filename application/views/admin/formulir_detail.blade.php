@extends('layouts.amaster')

@section('breadcrumb')
<li class="breadcrumb-item"><a href="<?php echo site_url('admin/formulir/detail'); ?>">Detail Peserta Didik</a></li>
@endsection

@section('content')
<div class="row">
    <div class="col-md-4 col-sm-6">
        <p>Kode Formulir : <strong>{{ $detail['id'] }}</strong></p>
    </div>
    <div class="col-md-4 col-sm-6">
        <p>Status : <strong>{{ $detail['status'] }}</strong></p>
    </div>
    <div class="col-md-4 col-sm-6">
        <p>Tanggal Masuk : <strong>{{ $detail['create_date'] }}</strong></p>
    </div>
</div>


<div class="row bg-dark">
    <div class="col-12 text-center text-light">
        <h5 class="pt-2 align-middle">INFORMASI PESERTA DIDIK</h5>
    </div>
</div>
<div class="row">
    <div class="col-md-3 col-sm-6">
        <p>Nama Lengkap :</p>
    </div>
    <div class="col">
        <p>{{ $detail['fullname1'] }}</p>
    </div>
</div>
<div class="row">
    <div class="col-md-3 col-sm-6">
        <p>Tempat, Tanggal Lahir :</p>
    </div>
    <div class="col">
        <p>{{ $detail['tempat_lahir'] }}, {{ $detail['tanggal_lahir'] }}</p>
    </div>
</div>
<div class="row">
    <div class="col-md-3 col-sm-6">
        <p>Jenis Kelamin :</p>
    </div>
    <div class="col">
        <p>{{ $detail['gender'] }}</p>
    </div>
</div>
<div class="row">
    <div class="col-md-3 col-sm-6">
        <p>Agama :</p>
    </div>
    <div class="col">
        <p>{{ $detail['agama1'] }}</p>
    </div>
</div>
<div class="row">
    <div class="col-md-3 col-sm-6">
        <p>Alamat :</p>
    </div>
    <div class="col">
        <p>{{ $detail['alamat1'] }}</p>
    </div>
</div>



<div class="row bg-dark">
    <div class="col-12 text-center text-light">
        <h5 class="pt-2 align-middle">INFORMASI ORANG TUA / WALI</h5>
    </div>
</div>
<div class="row">
    <table class="col-12">
        <thead>
            <th class="pb-3 pt-2">Orang Tua</th>
            <th class="pb-3 pt-2">Wali</th>
        </thead>
        <tbody>
            <tr>
                <td class="col-md-6 col-sm-6">
                    <div class="row">
                        <div class="col-md-4 col-sm-6">
                            <p>Nama Lengkap :</p>
                        </div>
                        <div class="col col-sm-6">
                            <p>{{ $detail['fullname2'] }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 col-sm-6">
                            <p>Pekerjaan :</p>
                        </div>
                        <div class="col col-sm-6">
                            <p>{{ $detail['pekerjaan1'] }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 col-sm-6">
                            <p>Agama :</p>
                        </div>
                        <div class="col col-sm-6">
                            <p>{{ $detail['agama2'] }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 col-sm-6">
                            <p>Alamat :</p>
                        </div>
                        <div class="col col-sm-6">
                            <p>{{ $detail['alamat2'] }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 col-sm-6">
                            <p>Telepon :</p>
                        </div>
                        <div class="col col-sm-6">
                            <p>{{ $detail['telepon1'] }}</p>
                        </div>
                    </div>
                </td>
                <td class="col-md-6 col-sm-6">
                    <div class="row">
                        <div class="col-md-4 col-sm-6">
                            <p>Nama Lengkap :</p>
                        </div>
                        <div class="col col-sm-6">
                            <p>{{ $detail['fullname3'] }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 col-sm-6">
                            <p>Pekerjaan :</p>
                        </div>
                        <div class="col col-sm-6">
                            <p>{{ $detail['pekerjaan2'] }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 col-sm-6">
                            <p>Agama :</p>
                        </div>
                        <div class="col col-sm-6">
                            <p>{{ $detail['agama3'] }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 col-sm-6">
                            <p>Alamat :</p>
                        </div>
                        <div class="col col-sm-6">
                            <p>{{ $detail['alamat3'] }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 col-sm-6">
                            <p>Telepon :</p>
                        </div>
                        <div class="col col-sm-6">
                            <p>{{ $detail['telepon2'] }}</p>
                        </div>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</div>

<div class="row">
    <div class="col-12 justify-content-center text-center mt-5">
        <a href="<?php echo site_url('admin/cetak/formulir/'); ?>{{ $detail['id'] }}" target="_blank"
           rel="noreferrer noopener" class="btn btn-primary"><i class="fas fa-print"></i> Print</a>
    </div>
</div>

@endsection