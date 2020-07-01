@extends('layouts.amaster')

@section('title', 'Editor Berita')

@push('scripts_header')
<script src="<?php echo base_url('vendor/tinymce/tinymce/tinymce.min.js'); ?>"></script>
@endpush

@section('welcome')

@section('breadcrumb')
<li class="breadcrumb-item"><a href="<?php echo site_url('admin/berita/editor'); ?>">Editor Berita</a></li>
@endsection

@section('content')
@if (isset($_SESSION['alert']))
    @include('layouts.partials.alert_success')
    <?php $_SESSION['alert'] = NULL; ?>
@endif
<div class="row">
    <div class="col">
        <form action="<?php echo site_url(); ?>{!! $post['action'] !!}" method="post" id="berita-editor">
            <div class="row">
                <div class="col-md-9">
                    <div class="form-group">
                        <input type="hidden" id="stored-idBerita" name="idBerita" value="{{ $post['id'] }}">
                        <input type="text" class="form-control" name="judul" placeholder="Judul konten"
                            value="{{ $post['judul'] }}" required data-msg="Mohon untuk mengisi kolom ini">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group bg-white">
                        <select class="custom-select mr-sm-2 text-dark" name="section" required data-msg="Mohon untuk mengisi kolom ini">
                            <option value="" selected>Pilih section</option>
                            <option value="1">Syarat Pendaftaran</option>
                            <option value="2">Pendaftaran Online</option>
                            <option value="3">Pendaftaran Offline</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <textarea name="konten" cols="20" rows="10" id="post-konten"><h3>{!! $post['konten'] !!}</h3></textarea>
                </div>
            </div>
            <div class="form-group">
                <button type="submit" name="publish" class="btn btn-primary mt-4" value="1">Publish</button>
                <button type="submit" name="draft" class="btn btn-secondary mt-4" value="0">Save as Draft</button>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts_footer')
<script type='text/javascript'>
    tinymce.init({
        selector: 'textarea',
        menubar: true,
        height: 400,
        plugins: [
            'advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker',
            'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
            'table emoticons template paste help'
        ],
        toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify |' +
            ' bullist numlist outdent indent | ' +
            'forecolor backcolor | help',
        automatic_uploads: true,
        image_advtab: true,
        images_upload_url: "<?php echo site_url('admin/berita/images-upload')?>",
        file_picker_types: 'image', 
        paste_data_images:true,
        relative_urls: false,
        remove_script_host: false,
          file_picker_callback: function(cb, value, meta) {
             var input = document.createElement('input');
             input.setAttribute('type', 'file');
             input.setAttribute('accept', 'image/*');
             input.onchange = function() {
                var file = this.files[0];
                var reader = new FileReader();
                reader.readAsDataURL(file);
                reader.onload = function () {
                   var id = 'post-image-' + (new Date()).getTime();
                   var blobCache =  tinymce.activeEditor.editorUpload.blobCache;
                   var blobInfo = blobCache.create(id, file, reader.result);
                   blobCache.add(blobInfo);
                   cb(blobInfo.blobUri(), { title: file.name });
                };
             };
             input.click();
          }
    });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
<script>
    $("#berita-editor").validate();
</script>
@endpush