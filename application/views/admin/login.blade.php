@extends('layouts.authentication')

@section('title', 'Login')

@section('content')

<div class="auth-box row">
    @if (isset($_SESSION['alert_fail']))
    @include('layouts.partials.alert_error')
    <?php $_SESSION['alert_fail'] = NULL; ?>
    @endif
    <div class="col-lg-7 col-md-5 modal-bg-img"
        style="background-image: url(<?php echo base_url('assets/admin/images/big/sd-muhgi.png'); ?>);">
    </div>
    <div class="col-lg-5 col-md-7 bg-white">
        <div class="p-3">
            <div class="text-center">
                <img src="<?php echo base_url('assets/admin/images/big/icon.png'); ?>" alt="wrapkit">
            </div>
            <h2 class="mt-3 text-center">Sign In</h2>
            <p class="text-center">Masukkan username dan password anda untuk mengakses panel admin.</p>
            <form action="<?php echo site_url('login/verifikasi'); ?>" method="post">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="text-dark" for="uname">Username</label>
                            <input class="form-control" name="user" id="uname" type="text" placeholder="username anda">
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="text-dark" for="pwd">Password</label>
                            <input class="form-control" name="pass" id="pwd" type="password"
                                placeholder="password anda">
                        </div>
                    </div>
                    <div class="col-lg-12 text-center">
                        <button type="submit" class="btn btn-block btn-dark">Sign In</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection