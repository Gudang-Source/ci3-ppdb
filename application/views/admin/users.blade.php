@extends('layouts.amaster')

@section('breadcrumb')
<li class="breadcrumb-item"><a href="<?php echo site_url('admin/users/list'); ?>">Daftar User</a></li>
@endsection

@section('content')
@if (isset($_SESSION['alert']) && !isset($_SESSION['alert_fail']))
    @include('layouts.partials.alert_success')
    <?php $_SESSION['alert'] = NULL; ?>
@elseif (!isset($_SESSION['alert']) && isset($_SESSION['alert_fail']))
    @include('layouts.partials.alert_error')
    <?php $_SESSION['alert_fail'] = NULL; ?>
@endif
<div class="row">
    <div class="col">
        <div class="table-responsive">
            <table class="table table-striped table-dark mb-0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Lengkap</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    @foreach ($data as $user)
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td>{{ $user['nama'] }}</td>
                        <td>{{ $user['username'] }}</td>
                        <td>{{ $user['email'] }}</td>
                        <td class="justify-content-center text-center">
                            <a href="javascript:;" class="btn btn-secondary btn-sm mr-1" data-toggle="modal"
                                data-target="#modal-resetpass" data-userid="{{ $user['id'] }}">Reset Password</a>
                            <a href="javscript:;" class="btn btn-danger btn-sm ml-1" data-toggle="modal"
                                data-target="#modal-delete" data-userid="{{ $user['id'] }}">Hapus</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
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
                <p>Apakah anda yakin untuk menghapus pengguna ini ?</p>
                <form action="<?php echo site_url('admin/users/delete'); ?>" method="post">
                    <input type="hidden" id="h-id-user" name="userid">
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

<!-- Primary Header Modal -->
<div id="modal-resetpass" class="modal fade" tabindex="-1" role="dialog"
    aria-labelledby="modal-resetpass-label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-colored-header bg-primary">
                <h4 class="modal-title" id="modal-resetpass-label">Ganti Password User</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form action="<?php echo site_url('admin/users/resetpass'); ?>" method="post">
                    <div class="form-group row">
                        <label class="col-sm-4" for="input-new-pass">Masukkan Password Baru</label>
                        <div class="col-sm-8">
                            <input type="hidden" id="r-id-user" name="userid">
                            <input type="password" class="form-control col-sm-10" name="new_pass">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4" for="input-new-pass">Masukkan Ulang Password</label>
                        <div class="col-sm-8">
                            <input type="password" class="form-control col-sm-10" name="re_new_pass">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-12 justify-content-center text-center">
                            <button type="submit" class="btn btn-primary btn-sm mr-1">Submit</button>
                            <button type="button" class="btn btn-light btn-sm ml-1" data-dismiss="modal">Batal</button>
                        </div>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
@endsection

@push('scripts_footer')
<script>
    $(document).ready(function () {
        $("#modal-delete").on("shown.bs.modal", function (event) {
            $("#h-id-user").attr("value", $(event.relatedTarget).data("userid"));
        });
        $("#modal-resetpass").on("shown.bs.modal", function (event) {
            $("#r-id-user").attr("value", $(event.relatedTarget).data("userid"));
        });
    });
</script>
@endpush