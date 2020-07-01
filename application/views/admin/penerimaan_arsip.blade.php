@extends('layouts.amaster')

@section('title', 'Arsip Penerimaan')

@section('breadcrumb')
<li class="breadcrumb-item"><a href="<?php echo site_url('admin/arsip/penerimaan'); ?>">Arsip Formulir Penerimaan</a></li>
@endsection

@push('scripts_header')
<link href="<?php echo base_url('assets/admin/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css'); ?>"
    rel="stylesheet">
@endpush

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-3">Daftar Siswa Diterima</h4>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered no-wrap display">
                        <thead>
                            <tr>
                                <th>Kode Formulir</th>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($diterima as $a)
                            <tr>
                                <td>{{ $a['formulir_id'] }}</td>
                                <td>{{ $a['nama_lengkap'] }}</td>
                                <td>{{ $a['alamat'] }}</td>
                                <td>{{ $a['status'] }}</td>
                                <td class="justify-content-center text-center">
                                    <a class="btn btn-secondary ml-1" target="_blank"
                                        href="<?php echo site_url('admin/formulir/detail/'); ?>{{ $a['formulir_id'] }}"><i
                                            class="fas fa-eye"></i></a>
                                    <a href="<?php echo site_url('admin/cetak/formulir/'); ?>{{ $a['formulir_id'] }}"
                                        target="_blank" rel="noreferrer noopener" class="btn btn-secondary ml-1"><i
                                            class="fas fa-print"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-3">Daftar Siswa Ditolak</h4>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered no-wrap display">
                        <thead>
                            <tr>
                                <th>Kode Formulir</th>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($ditolak as $b)
                            <tr>
                                <td>{{ $b['formulir_id'] }}</td>
                                <td>{{ $b['nama_lengkap'] }}</td>
                                <td>{{ $b['alamat'] }}</td>
                                <td>{{ $b['status'] }}</td>
                                <td class="justify-content-center text-center">
                                    <a class="btn btn-secondary ml-1" target="_blank"
                                        href="<?php echo site_url('admin/formulir/detail/'); ?>{{ $b['formulir_id'] }}"><i
                                            class="fas fa-eye"></i></a>
                                    <a href="<?php echo site_url('admin/cetak/formulir/'); ?>{{ $b['formulir_id'] }}"
                                        target="_blank" rel="noreferrer noopener" class="btn btn-secondary ml-1"><i
                                            class="fas fa-print"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts_footer')
<script src="<?php echo base_url('assets/admin/extra-libs/datatables.net/js/jquery.dataTables.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/admin/dist/js/pages/datatable/datatable-basic.init.js'); ?>"></script>
<script>
$(document).ready(function() {
    $('table.display').DataTable();
} );
</script>
@endpush