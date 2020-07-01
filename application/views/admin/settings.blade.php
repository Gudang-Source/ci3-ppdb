@extends('layouts.amaster')

@section('title', 'Pengaturan')

@section('breadcrumb', 'Pengaturan')

@section('content')
@if (isset($_SESSION['alert']) && !isset($_SESSION['alert_fail']))
    @include('layouts.partials.alert_success')
    <?php $_SESSION['alert'] = NULL; ?>
@elseif (!isset($_SESSION['alert']) && isset($_SESSION['alert_fail']))
    @include('layouts.partials.alert_error')
    <?php $_SESSION['alert_fail'] = NULL; ?>
@endif
<div class="row text-dark">
    <div class="col-sm-2 mb-2">
        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
            <a class="nav-link active show" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab"
                aria-controls="v-pills-home" aria-selected="true">
                <i class="mdi mdi-home-variant d-lg-none d-block mr-1"></i>
                <span class="d-none d-lg-block">Konten</span>
            </a>
            <a class="nav-link" id="v-pills-pendaftaran-tab" data-toggle="pill" href="#v-pills-pendaftaran" role="tab"
                aria-controls="v-pills-pendaftaran" aria-selected="false">
                <i class="mdi mdi-account-circle d-lg-none d-block mr-1"></i>
                <span class="d-none d-lg-block">Tanggal Penting</span>
            </a>
            <a class="nav-link" id="v-pills-contact-tab" data-toggle="pill" href="#v-pills-contact" role="tab"
                aria-controls="v-pills-contact" aria-selected="false">
                <i class="mdi mdi-contact-outline d-lg-none d-block mr-1"></i>
                <span class="d-none d-lg-block">Kontak</span>
            </a>
            <a class="nav-link" id="v-pills-image-tab" data-toggle="pill" href="#v-pills-image" role="tab"
                aria-controls="v-pills-image" aria-selected="false">
                <i class="mdi mdi-image-outline d-lg-none d-block mr-1"></i>
                <span class="d-none d-lg-block">Carousel</span>
            </a>
            <a class="nav-link" id="v-pills-docs-tab" data-toggle="pill" href="#v-pills-docs" role="tab"
                aria-controls="v-pills-docs" aria-selected="false">
                <i class="mdi mdi-docs-outline d-lg-none d-block mr-1"></i>
                <span class="d-none d-lg-block">Download</span>
            </a>
        </div>
    </div> <!-- end col-->

    <div class="col-sm-10">
        <div class="tab-content" id="v-pills-tabContent">
            <div class="tab-pane fade active show" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                <form action="<?php echo site_url('admin/settings/home'); ?>" method="post">
                    <div class="form-group row">
                        <label class="col-sm-4" for="konten">Syarat Pendaftaran</label>
                        <div class="col">
                            <select name="syarat" class="form-control">
                                @foreach($syarat as $sya)
                                <option value="{{ $sya['id'] }}">{{ $sya['judul'] }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4" for="konten">Pendaftaran Online</label>
                        <div class="col">
                            <select name="online" class="form-control">
                                @foreach($daftarol as $dol)
                                <option value="{{ $dol['id'] }}">{{ $dol['judul']}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4" for="konten">Pendaftaran Offline</label>
                        <div class="col">
                            <select name="offline" class="form-control">
                                @foreach($daftaroff as $dof)
                                <option value="{{ $dof['id']}}">{{ $dof['judul'] }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="tab-pane fade" id="v-pills-pendaftaran" role="tabpanel"
                aria-labelledby="v-pills-pendaftaran-tab">
                <form action="<?php echo site_url('admin/settings/dates'); ?>" method="post">
                    <div class="form-group row">
                        <label class="col-sm-4" for="konten">Status Pendaftaran</label>
                        <div class="col-sm-8">
                            <input class="form-control" type="text" value="{{ $pendaftaran['status'] }}" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4" for="konten">Tanggal Pendaftaran</label>
                        <div class="col">
                            <input class="form-control" type="date" name="tgl_daftar_m"
                                value="{{ $tanggal['daftar_mulai'] }}">
                        </div>
                        <label class="col-sm-1 pt-1" for="">s/d</label>
                        <div class="col">
                            <input class="form-control" type="date" name="tgl_daftar_a"
                                value="{{ $tanggal['daftar_akhir'] }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4" for="konten">Tanggal Penjajakan</label>
                        <div class="col">
                            <input class="form-control" type="date" name="tgl_penjajagan"
                                value="{{ $tanggal['penjajagan'] }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4" for="konten">Tanggal Heregistrasi</label>
                        <div class="col">
                            <input class="form-control" type="date" name="tgl_heregistrasi_m"
                                value="{{ $tanggal['heregistrasi_mulai'] }}">
                        </div>
                        <label class="col-sm-1 pt-1" for="">s/d</label>
                        <div class="col">
                            <input class="form-control" type="date" name="tgl_heregistrasi_a"
                                value="{{ $tanggal['heregistrasi_akhir'] }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4" for="konten">Tanggal Belajar Perdana</label>
                        <div class="col">
                            <input class="form-control" type="date" name="tgl_belajar"
                                value="{{ $tanggal['belajar_perdana'] }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="tab-pane fade" id="v-pills-contact" role="tabpanel" aria-labelledby="v-pills-contact-tab">
                <form action="<?php echo site_url('admin/settings/contacts'); ?>" method="post">
                    <div class="form-group row">
                        <label class="col-sm-2" for="konten">Telepon</label>
                        <div class="col-sm-6">
                            <input class="form-control" type="tel" name="telepon" value="{{ $kontak['telepon'] }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2" for="konten">E-mail</label>
                        <div class="col-sm-6">
                            <input class="form-control" type="text" name="email" value="{{ $kontak['email'] }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2" for="konten">Facebook</label>
                        <div class="col-sm-6">
                            <input class="form-control" type="url" name="facebook" value="{{ $kontak['facebook'] }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2" for="konten">Alamat</label>
                        <div class="col-sm-6">
                            <textarea class="form-control" name="alamat" cols="30"
                                rows="5">{{ $kontak['alamat'] }}</textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="tab-pane fade" id="v-pills-image" role="tabpanel" aria-labelledby="v-pills-image-tab">
                <form action="<?php echo site_url('admin/settings/upload-car'); ?>" method="post"
                    enctype="multipart/form-data" id="form-carousel">
                    <div class="form-group row">
                        <label class="col-sm-3" for="input-gambar">Upload Gambar</label>
                        <div class="col">
                            <input class="form-control-file" type="file" name="carousel" id="input-gambar" accept=".jpg,.jpeg,.png"
                            required data-msg="Anda belum memilih file gambar.">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3" for="caption">Caption</label>
                        <div class="col">
                            <input class="form-control" type="text" name="caption">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 mb-5">
                            <button type="submit" class="btn btn-primary">Upload</button>
                        </div>
                    </div>
                </form>
                <div class="row">
                    <div class="col-12">
                        <table class="table table-responsive table-hover">
                            <thead class="thead-light">
                                <th>Nama File</th>
                                <th>Caption</th>
                                <th>Ukuran</th>
                                <th>Aksi</th>
                            </thead>
                            <tbody class="table-striped">
                                @foreach($carousel as $c)
                                <tr>
                                    <td>{{ $c['nama'] }}</td>
                                    <td>{{ $c['caption'] }}</td>
                                    <td>{{ $c['size'] }} KB</td>
                                    <td>
                                        <a class="btn btn-secondary btn-sm"
                                            href="<?php echo base_url('/uploads/gambar/pengaturan/'); ?>{{ $c['nama'] }}"
                                            target="_blank" rel="noopener noreferrer">View</a>
                                        <a class="btn btn-danger btn-sm" href="javascript:;" data-toggle="modal"
                                            data-target="#modal-delete" data-carouselid="{{ $c['id'] }}">Hapus</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="v-pills-docs" role="tabpanel" aria-labelledby="v-pills-docs-tab">
                <form action="<?php echo site_url('admin/settings/upload-doc'); ?>" method="post"
                    enctype="multipart/form-data" id="form-document">
                    <div class="form-group row">
                        <label class="col-sm-3" for="input-dokumen">Upload Dokumen</label>
                        <div class="col-sm-5 custom-file">
                            <input class="form-control-input" type="file" name="dokumen" id="input-dokumen" accept=".odt,.doc,.docx,.pdf"
                            required data-msg="Anda belum memilih file dokumen." >
                        </div>
                    </div>
                    <div class="row mb-5">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">Upload</button>
                        </div>
                    </div>
                </form>
                <div class="row">
                    <table class="table table-responsive table-hover">
                        <thead class="thead-light">
                            <th scope="col">Nama File</th>
                            <th scope="col">Ekstensi</th>
                            <th scope="col">Ukuran</th>
                            <th scope="col">Aksi</th>
                        </thead>
                        <tbody class="table-striped">
                            @foreach($docs as $d)
                            <tr>
                                <td>{{ $d['nama']}}</td>
                                <td>{{ $d['tipe']}}</td>
                                <td>{{ $d['size']}} KB</td>
                                <td>
                                    <a class="btn btn-primary btn-sm"
                                        href="<?php echo base_url('/uploads/docs/'); ?>{{ $d['nama'] }}" target="_blank"
                                        rel="noopener noreferrer">View</a>
                                    <a class="btn btn-danger btn-sm" href="javascript:;" data-toggle="modal"
                                        data-target="#modal-delete" data-docid="{{ $d['id'] }}">Hapus</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div> <!-- end tab-content-->
    </div> <!-- end col-->
</div>
<!-- end row-->

<!-- Small modal content -->
<div class="modal fade" id="modal-delete" tabindex="-1" role="dialog" aria-labelledby="confirm-modal"
    aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="confirm-modal">Hapus File</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <p>Apakah anda yakin untuk menghapus file ini ?</p>
                <form action="<?php echo site_url('admin/settings/delete-file'); ?>" method="post">
                    <input type="hidden" id="id-doc" name="docid">
                    <input type="hidden" id="id-carousel" name="carouselid">
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
<script>
    $("#form-carousel").validate();
    $("#form-document").validate();
</script>
<script>
    $(document).ready(function () {
        $("#modal-delete").on("shown.bs.modal", function (event) {
            $("#id-doc").attr("value", $(event.relatedTarget).data("docid"));
            $("#id-carousel").attr("value", $(event.relatedTarget).data("carouselid"));
        });
    });
</script>
@endpush