@extends('layouts.amaster')

@section('title', 'Dashboard')

@section('breadcrumb')
<li class="breadcrumb-item"><a href="<?php echo site_url('admin/dashboard'); ?>">Dashboard</a></li>
@endsection

@push('scripts_header')
<link href="<?php echo base_url('assets/admin/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css'); ?>"
    rel="stylesheet">
@endpush

@section('content')
<!-- *************************************************************** -->
<!-- Start First Cards -->
<!-- *************************************************************** -->
<div class="card-group">
    <div class="card border-right">
        <div class="card-body">
            <div class="d-flex d-lg-flex d-md-block align-items-center">
                <div>
                    <div class="d-inline-flex align-items-center">
                        <h2 class="text-dark mb-1 font-weight-medium">{{ $total_formulir }}</h2>
                    </div>
                    <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Total Formulir Masuk</h6>
                </div>
                <div class="ml-auto mt-md-3 mt-lg-0">
                    <span class="opacity-7 text-muted"><i data-feather="file-text"></i></span>
                </div>
            </div>
        </div>
    </div>
    <div class="card border-right">
        <div class="card-body">
            <div class="d-flex d-lg-flex d-md-block align-items-center">
                <div>
                    <h2 class="text-dark mb-1 w-100 text-truncate font-weight-medium">{{ $total_dikonfirmasi }}</h2>
                    <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Formulir Dikonfirmasi
                    </h6>
                </div>
                <div class="ml-auto mt-md-3 mt-lg-0">
                    <span class="opacity-7 text-muted"><i data-feather="file-plus"></i></span>
                </div>
            </div>
        </div>
    </div>
    <div class="card border-right">
        <div class="card-body">
            <div class="d-flex d-lg-flex d-md-block align-items-center">
                <div>
                    <div class="d-inline-flex align-items-center">
                        <h2 class="text-dark mb-1 font-weight-medium">{{ $total_diterima }}</h2>
                    </div>
                    <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Total Peserta Didik Diterima</h6>
                </div>
                <div class="ml-auto mt-md-3 mt-lg-0">
                    <span class="opacity-7 text-muted"><i data-feather="user-plus"></i></span>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="d-flex d-lg-flex d-md-block align-items-center">
                <div>
                    <h2 class="text-dark mb-1 font-weight-medium">{{ $total_ditolak }}</h2>
                    <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Total Peserta Didik Ditolak</h6>
                </div>
                <div class="ml-auto mt-md-3 mt-lg-0">
                    <span class="opacity-7 text-muted"><i data-feather="user-x"></i></span>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
            <h4 class="card-title mb-3">Formulir Masuk Terbaru (Belum konfirmasi)</h4>
                <div class="table-responsive">
                    <table id="zero_config" class="table table-striped table-bordered no-wrap">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Kode Formulir</th>
                                <th>Nama Siswa</th>
                                <th>Status</th>
                                <th>Tanggal Masuk</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            @foreach ($recent_formulir as $rf)
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td>{{ $rf['id'] }}</td>
                                <td>{{ $rf['nama_lengkap'] }}</td>
                                <td>{{ $rf['status'] }}</td>
                                <td>{{ $rf['create_date'] }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- *************************************************************** -->
<!-- End First Cards -->
<!-- *************************************************************** -->
@endsection

@push('scripts_footer')
<script src="<?php echo base_url('assets/admin/extra-libs/datatables.net/js/jquery.dataTables.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/admin/dist/js/pages/datatable/datatable-basic.init.js'); ?>"></script>
@endpush