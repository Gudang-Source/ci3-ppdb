@extends('layouts.amaster')

@section('breadcrumb')
<li class="breadcrumb-item"><a href="<?php echo site_url('admin/users/create'); ?>">Tambah User Baru</a></li>
@endsection

@section('content')
@if (isset($_SESSION['alert']))
@include('layouts.partials.alert_success')
<?php $_SESSION['alert'] = NULL; ?>
@endif
<div class="row">
    <div class="col">
        <form action="<?php echo site_url('admin/users/insert'); ?>" method="post" id="user-add">
            <div class="form-group row">
                <label for="input-nama" class="col-sm-2">Nama Lengkap</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="input-nama" name="nama" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="input-email" class="col-sm-2">Email</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" id="input-email" name="email" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="input-username" class="col-sm-2">Username</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="input-username" name="username" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="input-password" class="col-sm-2">Password</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="input-password" name="pass" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="input-role" class="col-sm-2">Role</label>
                <div class="col-sm-10">
                    <select name="role" class="form-control" id="input-role" required>
                        <option value="" selected>Pilih role pengguna</option>
                        <option value="1">Admin</option>
                        <option value="2">Staff</option>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <button type="submit" class="btn btn-primary mr-1">Submit</button>
                <button type="reset" class="btn btn-primary ml-1">Bersihkan</button>
            </div>
        </form>
    </div>
</div>
@endsection

@section('scripts_footer')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
<script>
    $("#user-add").validate();
</script>
@endsection