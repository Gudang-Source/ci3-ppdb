@extends('layouts.amaster')

@section('title', 'Daftar Formulir Masuk')

@section('breadcrumb')
<li class="breadcrumb-item"><a href="<?php echo site_url('admin/formulir/masuk'); ?>">Formulir Masuk</a></li>
@endsection

@push('scripts_header')
<link href="<?php echo base_url('assets/admin/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css'); ?>"
    rel="stylesheet">
@endpush

@section('content')
<div class="row">
    @if (isset($_SESSION['alert']))
    @include('layouts.partials.alert_success')
    <?php $_SESSION['alert'] = NULL; ?>
    @endif

    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-5">Daftar Formulir Masuk</h4>
                <div class="table-responsive">
                    <table id="zero_config" class="table table-striped table-bordered no-wrap">
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
                            @foreach ($berkas as $b)
                            <tr>
                                <td>{{ $b['formulir_id'] }}</td>
                                <td>{{ $b['nama_lengkap'] }}</td>
                                <td>{{ $b['alamat'] }}</td>
                                <td>{{ $b['create_date'] }}</td>
                                <td class="justify-content-center text-center">
                                    <a class="btn btn-primary mr-1" href="javascript:;" data-toggle="modal"
                                        data-target="#modal-konfirmasi"
                                        data-formid="{{ $b['formulir_id'] }}">Konfirmasi</a>
                                    <a class="btn btn-secondary ml-1 mr-1" target="_blank"
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

<!-- Small modal content -->
<div class="modal fade" id="modal-konfirmasi" tabindex="-1" role="dialog" aria-labelledby="confirm-modal"
    aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="confirm-modal">Konfirmasi Formulir</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <p>Apakah anda telah mengecek berkas-berkas syarat pendaftaran ? Silahkan klik Konfirmasi untuk
                    mengkonfirmasi formulir.</p>
                <form action="<?php echo site_url('admin/formulir/konfirmasi'); ?>" method="post">
                    <input type="hidden" id="formulir-id" name="kode_formulir">
                    <div class="form-group justify-content-center text-center">
                        <button class="btn btn-primary" type="submit">Konfirmasi</button>
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
        $("#modal-konfirmasi").on("shown.bs.modal", function (event) {
            $("#formulir-id").attr("value", $(event.relatedTarget).data("formid"));
        });
    });
</script>
@endpush