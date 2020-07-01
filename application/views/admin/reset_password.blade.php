@extends('layouts.amaster')

@section('title', 'Ganti Password Pengguna')

@section('breadcrumb')
<li class="breadcrumb-item"><a href="<?php echo site_url('admin/personal/resetpass'); ?>">Ganti Password</a></li>
@endsection

@section('content')
<div class="container text-dark">
    @if (isset($_SESSION['alert']) && !isset($_SESSION['alert_fail']))
        @include('layouts.partials.alert_success')
        <?php $_SESSION['alert'] = NULL; ?>
    @elseif (!isset($_SESSION['alert']) && isset($_SESSION['alert_fail']))
        @include('layouts.partials.alert_error')
        <?php $_SESSION['alert_fail'] = NULL; ?>
    @endif
    <div class="row">
        <div class="col-12 justify-content-center text-center mb-5 mt-4">
            <h4>
                <span>Ganti Password Pengguna</span>
            </h4>
        </div>
    </div>
    <form action="<?php echo site_url('admin/reset/password'); ?>" method="post">
        <div class="form-group row">
            <div class="col-sm-5 col-md-5">
                <input type="hidden" class="form-control" id="username" name="user" value="<?php echo $_SESSION['username']; ?>">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-md-2" for="password-lama">Password Lama</label>
            <div class="col-sm-5 col-md-5">
                <input type="password" class="form-control" id="password-lama" name="old_pass"
                    placeholder="Password Lama" required data-msg="Mohon untuk mengisi kolom ini">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-md-2" for="password-baru">Password Baru</label>
            <div class="col-sm-5 col-md-5">
                <input type="password" class="form-control" id="password-baru" name="new_pass"
                    placeholder="Password Baru" required data-msg="Mohon untuk mengisi kolom ini">
            </div>
        </div>
        <div class="row">
            <div class="col-12 mb-5 mt-5">
                <button class="btn btn-primary mr-3" type="submit">Submit</button>
                <button class="btn btn-danger ml-3" type="reset">Bersihkan</button>
            </div>
        </div>
    </form>
</div>
@endsection

@push('scripts_footer')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
<script>
    $("#formulir-daftar").validate();
</script>
@endpush