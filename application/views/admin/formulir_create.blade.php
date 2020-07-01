@extends('layouts.amaster')

@section('title', 'Buat Formulir')

@section('breadcrumb')
<li class="breadcrumb-item"><a href="<?php echo site_url('admin/formulir/buat'); ?>">Buat Formulir</a></li>
@endsection

@section('content')
<div class="container text-dark">
    @if (isset($_SESSION['alert']))
    @include('layouts.partials.alert_success')
    <?php $_SESSION['alert'] = NULL; ?>
    @endif
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12 justify-content-center text-center mb-5 mt-4">
                        <h4>
                            <span>Formulir Pendaftaran Peserta Didik Baru</span>
                        </h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <h5 class="mb-4">
                            <span>A. Identitas Peserta Didik</span>
                        </h5>
                    </div>
                </div>
                <form action="<?php echo site_url('pendaftaran/kirim'); ?>" method="post" id="formulir-daftar">
                    <!--- Data Peserta Didik -->
                    <div class="form-group row">
                        <label class="col-sm-2 col-md-2" for="fnama1">Nama Depan</label>
                        <div class="col-sm-4 col-md-4">
                            <input type="text" class="form-control" name="fnama1" placeholder="Nama depan" required
                                data-msg="Mohon untuk mengisi kolom ini">
                        </div>
                        <label class="col-sm-2 col-md-2" for="lnama1">Nama Belakang</label>
                        <div class="col-sm-4 col-md-4">
                            <input type="text" class="form-control" name="lnama1" placeholder="Nama belakang" required
                                data-msg="Mohon untuk mengisi kolom ini">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-md-2" for="kota_lahir">Tempat Lahir</label>
                        <div class="col-sm-4 col-md-4">
                            <input type="text" class="form-control" name="tempat" placeholder="Kota Kelahiran" required
                                data-msg="Mohon untuk mengisi kolom ini">
                        </div>
                        <label class="col-sm-2 col-md-2" for="tgl_lahir">Tanggal Lahir</label>
                        <div class="col-sm-4 col-md-4">
                            <input type="date" class="form-control" name="tgl_lahir" required
                                data-msg="Mohon untuk mengisi kolom ini">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-md-2" for="gender">Jenis Kelamin</label>
                        <div class="col-sm-4 col-md-4">
                            <select name="gender" class="form-control" required
                                data-msg="Mohon untuk mengisi kolom ini">
                                <option value="">Pilih jenis kelamin</option>
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                        <label class="col-sm-2 col-md-2" for="agama1">Agama</label>
                        <div class="col-sm-4 col-md-4">
                            <select name="agama1" class="form-control" required
                                data-msg="Mohon untuk mengisi kolom ini">
                                <option value="">Pilih agama</option>
                                <option value="Islam">Islam</option>
                                <option value="Protestan">Protestan</option>
                                <option value="Katolik">Katolik</option>
                                <option value="Hindu">Hindu</option>
                                <option value="Buddha">Buddha</option>
                                <option value="Khonghucu">Khonghucu</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-md-2" for="alamat1">Alamat</label>
                        <div class="col-sm-10 col-md-10">
                            <input type="text" class="form-control" name="alamat1"
                                placeholder="Alamat tempat tinggal saat ini" required
                                data-msg="Mohon untuk mengisi kolom ini">
                        </div>
                    </div>
                    <!--- End Data Peserta Didik -->
                    <div class="row">
                        <div class="col-12">
                            <h5 class="mb-4 mt-5">
                                <span>B. Identitas Orang Tua/Wali</span>
                            </h5>
                        </div>
                    </div>
                    <!--- Data Orang Tua -->
                    <div class="row">
                        <div class="col-12">
                            <h6 class="mb-4 mt-3 section-title-underline">
                                <span>B.1 Identitas Orang Tua</span>
                            </h6>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-md-2" for="fnama2">Nama Depan</label>
                        <div class="col-sm-4 col-md-4">
                            <input type="text" class="form-control" name="fnama2" placeholder="Nama depan">
                        </div>
                        <label class="col-sm-2 col-md-2" for="lnama2">Nama Belakang</label>
                        <div class="col-sm-4 col-md-4">
                            <input type="text" class="form-control" name="lnama2" placeholder="Nama belakang">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-md-2" for="pekerjaan">Pekerjaan</label>
                        <div class="col-sm-4 col-md-4">
                            <input type="text" class="form-control" name="pekerjaan1" placeholder="Pekerjaan orang tua">
                        </div>
                        <label class="col-sm-2 col-md-2" for="agama2">Agama</label>
                        <div class="col-sm-4 col-md-4">
                            <select name="agama2" class="form-control">
                                <option value="">Pilih agama</option>
                                <option value="Islam">Islam</option>
                                <option value="Protestan">Protestan</option>
                                <option value="Katolik">Katolik</option>
                                <option value="Hindu">Hindu</option>
                                <option value="Buddha">Buddha</option>
                                <option value="Khonghucu">Khonghucu</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-md-2" for="alamat2">Alamat</label>
                        <div class="col-sm-10 col-md-10">
                            <input type="text" class="form-control" name="alamat2"
                                placeholder="Alamat tempat tinggal saat ini">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-md-2" for="telepon1">Nomor HP/Telepon</label>
                        <div class="col-sm-4 col-md-4">
                            <input type="tel" class="form-control" name="telepon1"
                                placeholder="Nomor telepon yang dapat dihubungi">
                        </div>
                    </div>
                    <!--- End Data Orang Tua -->


                    <!--- Data Wali -->
                    <div class="row">
                        <div class="col-12">
                            <h6 class="mb-4 mt-3 section-title-underline">
                                <span>B.2 Identitas Wali</span>
                            </h6>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-md-2" for="fnama3">Nama Depan</label>
                        <div class="col-sm-4 col-md-4">
                            <input type="text" class="form-control" name="fnama3" placeholder="Nama depan">
                        </div>
                        <label class="col-sm-2 col-md-2" for="lnama3">Nama Belakang</label>
                        <div class="col-sm-4 col-md-4">
                            <input type="text" class="form-control" name="lnama3" placeholder="Nama belakang">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-md-2" for="pekerjaan">Pekerjaan</label>
                        <div class="col-sm-4 col-md-4">
                            <input type="text" class="form-control" name="pekerjaan2" placeholder="Pekerjaan wali">
                        </div>
                        <label class="col-sm-2 col-md-2" for="agama3">Agama</label>
                        <div class="col-sm-4 col-md-4">
                            <select name="agama3" class="form-control">
                                <option value="">Pilih agama</option>
                                <option value="Islam">Islam</option>
                                <option value="Protestan">Protestan</option>
                                <option value="Katolik">Katolik</option>
                                <option value="Hindu">Hindu</option>
                                <option value="Buddha">Buddha</option>
                                <option value="Khonghucu">Khonghucu</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-md-2" for="alamat3">Alamat</label>
                        <div class="col-sm-10 col-md-10">
                            <input type="text" class="form-control" name="alamat3"
                                placeholder="Alamat tempat tinggal saat ini">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-md-2" for="telepon2">Nomor HP/Telepon</label>
                        <div class="col-sm-4 col-md-4">
                            <input type="tel" class="form-control" name="telepon2"
                                placeholder="Nomor telepon yang dapat dihubungi">
                        </div>
                    </div>
                    <!--- End Data Wali -->

                    <div class="row">
                        <div class="col-12">
                            <h5 class="mb-4 mt-5">
                                <span>C. Asal Sekolah</span>
                            </h5>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-md-2" for="school-name">Nama Sekolah</label>
                        <div class="col-sm-10 col-md-10">
                            <input type="text" class="form-control" name="nama_sekolah" id="school-name"
                                placeholder="Nama sekolah">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-md-2" for="school-address">Alamat Sekolah</label>
                        <div class="col-sm-10 col-md-10">
                            <input type="text" class="form-control" name="alamat_sekolah" id="school-address"
                                placeholder="Alamat sekolah">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-md-2" for="school-status">Status Sekolah</label>
                        <div class="col-sm-4 col-md-4">
                            <select class="form-control" name="status_sekolah" id="school-status">
                                <option value="">Pilih status</option>
                                <option value="Negeri">Negeri</option>
                                <option value="Swasta">Swasta</option>
                            </select>
                        </div>
                        <label class="col-sm-2 col-md-2" for="from-class">Dari Kelas</label>
                        <div class="col-sm-4 col-md-4">
                            <input type="text" class="form-control" name="dari_kelas" id="from-class"
                                placeholder="Dari kelas">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <h5 class="mb-4 mt-5">
                                <span>D. Kartu Keluarga Miskin</span>
                            </h5>
                        </div>
                    </div>

                    <div class="form-check form-check-inline">
                        <label class="col">Memiliki kartu keluarga miskin yang masih berlaku ?</label>
                        <div class="custom-control custom-radio mr-3">
                            <input type="radio" class="custom-control-input" id="punya-kkm1" name="kk_miskin"
                                value="Punya">
                            <label class="custom-control-label" for="punya-kkm1">Punya</label>
                        </div>
                        <div class="custom-control custom-radio ml-3">
                            <input type="radio" class="custom-control-input" id="punya-kkm2" name="kk_miskin"
                                value="Tidak Punya">
                            <label class="custom-control-label" for="punya-kkm2">Tidak Punya</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 justify-content-center text-center mb-5 mt-5">
                            <button class="btn btn-primary mr-3" type="submit">Daftar</button>
                            <button class="btn btn-danger ml-3" type="reset">Bersihkan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
@endsection

@push('scripts_footer')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
<script>
    $("#formulir-daftar").validate();
</script>
@endpush