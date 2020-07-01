@extends('layouts.amaster')

@section('title', 'Daftar Konten')

@section('breadcrumb')
<li class="breadcrumb-item"><a href="<?php echo site_url('admin/berita/list'); ?>">Daftar Berita</a></li>
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
                <h4 class="card-title mb-3">Daftar Berita</h4>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered no-wrap display">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Title</th>
                                <th scope="col">Section</th>
                                <th scope="col">Status</th>
                                <th scope="col">Last Update</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            @foreach ($list as $berita)
                            <tr>
                                <td><?php echo $no++ ?></td>
                                <td class="col-sm-3 col-md-3">{{ $berita['judul'] }}</td>
                                <td>{{ $berita['nama'] }}</td>
                                <td>{{ $berita['status'] }}</td>
                                <td>{{ $berita['last_update'] }}</td>
                                <td CLASS="justify-content-center text-center">
                                    <a class="btn btn-primary btn-sm mr-1"
                                        href="<?php echo site_url('admin/berita/update/'); ?>{{ $berita['id'] }}">Update</a>
                                    <a class="btn btn-danger btn-sm ml-1" href="javascript:;" data-toggle="modal"
                                        data-target="#modal-delete" data-beritaid="{{ $berita['id'] }}">Delete</a>
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
<div class="modal fade" id="modal-delete" tabindex="-1" role="dialog" aria-labelledby="confirm-modal"
    aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="confirm-modal">Hapus Berita</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <p>Apakah anda yakin untuk menghapus berita ini ?</p>
                <form action="<?php echo site_url('admin/berita/delete'); ?>" method="post">
                    <input type="hidden" id="id-berita" name="beritaid">
                    <div class="form-group justify-content-center text-center">
                        <button class="btn btn-danger mr-1" type="submit">Hapus</button>
                        <button class="btn btn-success ml-1" type="button" data-dismiss="modal"
                            aria-hidden="true">Batal</button>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
@endsection

@push('scripts_footer')
<script src="<?php echo base_url('assets/admin/extra-libs/datatables.net/js/jquery.dataTables.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/admin/dist/js/pages/datatable/datatable-basic.init.js'); ?>"></script>
<script>
    $(document).ready(function () {
        $("#modal-delete").on("shown.bs.modal", function (event) {
            $("#id-berita").attr("value", $(event.relatedTarget).data("beritaid"));
        });
        $('table.display').DataTable();
    });
</script>
@endpush