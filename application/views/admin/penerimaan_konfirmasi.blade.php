@extends('layouts.amaster')

@section('title', 'Daftar Dikonfirmasi')

@section('breadcrumb')
<li class="breadcrumb-item"><a href="<?php echo site_url('admin/dikonfirmasi'); ?>">Daftar Calon Peserta Didik</a></li>
@endsection

@push('scripts_header')
<link href="<?php echo base_url('assets/admin/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css'); ?>"
    rel="stylesheet">
@endpush

@section('content')
@if (isset($_SESSION['alert']))
@include('layouts.partials.alert_success')
<?php $_SESSION['alert'] = NULL; ?>
@endif
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-6 align-self-start">
                        <h4 class="card-title mb-5">Daftar Siswa Diterima</h4>
                    </div>                    
                    <div class="col-6 align-self-end text-right mb-5">
                        <a href="<?php echo site_url('admin/cetak/presensi'); ?>" target="_blank" rel="noreferrer noopener"
                            class="btn btn-primary"><i class="fas fa-print"></i> Cetak Presensi</a>
                    </div>
                </div>
                <div class="table-responsive">
                    <table id="zero_config" class="table table-striped table-bordered no-wrap display">
                        <thead>
                            <tr>
                                <th>Kode Formulir</th>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>Tanggal Masuk</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pd as $p)
                            <tr>
                                <td>{{ $p['formulir_id'] }}</td>
                                <td>{{ $p['nama_lengkap'] }}</td>
                                <td>{{ $p['alamat'] }}</td>
                                <td>{{ $p['create_date'] }}</td>
                                <td class="justify-content-center text-center">
                                    <a class="btn btn-primary mr-1" href="javascript:;" data-toggle="modal"
                                        data-target="#modal-diterima" data-formid="{{ $p['formulir_id'] }}">Terima</a>
                                    <a class="btn btn-warning mr-1 ml-1" href="javascript:;" data-toggle="modal"
                                        data-target="#modal-ditolak" data-formid="{{ $p['formulir_id'] }}">Tolak</a>
                                    <a class="btn btn-secondary mr-1 ml-1" target="_blank"
                                        href="<?php echo site_url('admin/formulir/detail/'); ?>{{ $p['formulir_id'] }}"><i
                                            class="fas fa-eye"></i></a>
                                    <a class="btn btn-secondary ml-1" target="_blank"
                                        href="<?php echo site_url('admin/cetak/formulir/'); ?>{{ $p['formulir_id'] }}"
                                        rel="noreferrer noopener"><i class="fas fa-print"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <!-- Small modal content -->
    <div class="modal fade" id="modal-diterima" tabindex="-1" role="dialog" aria-labelledby="confirm-modal"
        aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="confirm-modal">Penerimaan Peserta Didik</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <p>Apakah anda ingin menerima calon peserta didik ? Silahkan klik Diterima untuk mengkonfirmasi.</p>
                    <form action="<?php echo site_url('admin/penerimaan/diterima'); ?>" method="post">
                        <input type="hidden" id="form-id" name="form_id">
                        <div class="form-group justify-content-center text-center">
                            <button class="btn btn-primary" type="submit">Diterima</button>
                        </div>
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <!-- Small modal content -->
    <div class="modal fade" id="modal-ditolak" tabindex="-1" role="dialog" aria-labelledby="confirm-modal"
        aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="confirm-modal">Konfirmasi Formulir</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <p>Apakah anda ingin menolak calon peserta didik ? Silahkan klik Ditolak untuk mengkonfirmasi.</p>
                    <form action="<?php echo site_url('admin/penerimaan/ditolak'); ?>" method="post">
                        <input type="hidden" id="ditolak-id" name="form_id">
                        <div class="form-group justify-content-center text-center">
                            <button class="btn btn-warning" type="submit">Ditolak</button>
                        </div>
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    @endsection

    @push('scripts_footer')
    <script src="<?php echo base_url('assets/admin/extra-libs/datatables.net/js/jquery.dataTables.min.js'); ?>">
    </script>
    <script src="<?php echo base_url('assets/admin/dist/js/pages/datatable/datatable-basic.init.js'); ?>"></script>
    <script>
        $(document).ready(function () {
            $("#modal-diterima").on("shown.bs.modal", function (event) {
                $("#form-id").attr("value", $(event.relatedTarget).data("formid"));
            });
            $("#modal-ditolak").on("shown.bs.modal", function (event) {
                $("#ditolak-id").attr("value", $(event.relatedTarget).data("formid"));
            });
            $('table.display').DataTable();
        });
    </script>
    @endpush