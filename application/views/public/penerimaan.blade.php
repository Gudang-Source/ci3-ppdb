@extends('layouts.pmaster', ['kontak' => $kontak])

@section('header')
@parent
@endsection

@section('title', 'Penerimaan')

@section('header_title', 'Penerimaan Peserta Didik Baru')

@section('breadcrumb', 'Penerimaan')

@section('content')
<div class="site-section">
    <div class="container border text-black">

        <div class="row">
            <div class="col-12 justify-content-center text-center mb-5 mt-5">
                <h4>
                    <span>Pengecekan Status Penerimaan Peserta Didik Baru</span>
                </h4>
            </div>
        </div>
        <div class="row">
            <div class="col-12 justify-content-center text-center mt-5">
                <p>Silahkan masukkan nomor formulir atau nama calon peserta didik untuk mengecek status.</p>
            </div>
        </div>
        <form action="<?php echo site_url('penerimaan/hasil'); ?>" method="post">
            <div class="form-group row mb-5 justify-content-center text-center">
                <div class="form-group col-md-11 col-sm-10">
                    <input type="text" class="form-control form-control-lg" name="formid"
                        placeholder="Nomor formulir pendaftaran">
                </div>
                <div class="form-group col-md-1 col-sm-2 pt-1">
                    <button class="btn btn-primary" type="submit">Cari</button>
                </div>
            </div>
        </form>

    </div>
</div>
@endsection