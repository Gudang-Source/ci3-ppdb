@extends('layouts.pmaster', ['kontak' => $kontak])

@section('title', 'Home')

@section('header')
    <div class="hero-slide owl-carousel site-blocks-cover">
      @foreach($carousel as $c)
      <div class="intro-section" style="background-image: url(<?php echo base_url('uploads/gambar/pengaturan/'); ?>{{ $c['nama'] }} );">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-lg-12 mx-auto text-center" data-aos="fade-up">
              <h1>{{ $c['caption'] }}</h1>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
@endsection

@section('content')
<!--- Tanggal Penting -->
<div class="site-section">
  <div class="container">
    <div class="row mb-5 justify-content-center text-center">
      <div class="col-lg-4 mb-5">
        <h2 class="section-title-underline mb-5">
          <span>Tanggal Penting</span>
        </h2>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-3 col-md-6 mb-4 mb-lg-0">

        <div class="feature-1 border">
          <div class="icon-wrapper bg-primary">
            <span class="flaticon-ink text-white"></span>
          </div>
          <div class="feature-1-content">
            <h2 class="mb-4">Pendaftaran</h2>
            <p>{{ $tanggal['daftar_mulai'] }}</p>
            <p>s/d</p>
            <p>{{ $tanggal['daftar_akhir'] }}</p>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 mb-4 mb-lg-0">
        <div class="feature-1 border">
          <div class="icon-wrapper bg-primary">
            <span class="flaticon-school-material text-white"></span>
          </div>
          <div class="feature-1-content">
            <h2 class="mb-4">Penjajakan</h2>
            <p>{{ $tanggal['penjajagan'] }}</p>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 mb-4 mb-lg-0">
        <div class="feature-1 border">
          <div class="icon-wrapper bg-primary">
            <span class="flaticon-university text-white"></span>
          </div>
          <div class="feature-1-content">
            <h2 class="mb-4">Heregistrasi</h2>
            <p>{{ $tanggal['heregistrasi_mulai'] }}</p>
            <p>s/d</p>
            <p>{{ $tanggal['heregistrasi_akhir'] }}</p>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 mb-4 mb-lg-0">
        <div class="feature-1 border">
          <div class="icon-wrapper bg-primary">
            <span class="flaticon-books text-white"></span>
          </div>
          <div class="feature-1-content">
            <h2 class="mb-4">Belajar Perdana</h2>
            <p>{{ $tanggal['belajar_perdana'] }}</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--- End Tanggal Penting -->

<!--- Syarat Pendaftaran -->
<div class="section-bg style-1 text-light" style="background-image: url(<?php echo base_url('assets/public/images/bg_1.jpg'); ?>);">
  <div class="container">
    <div class="row">
      <div class="col-lg-4">
        <h2 class="section-title-underline style-2">
          <span>Syarat Pendaftaran</span>
        </h2>
      </div>
      <div class="col-lg-8">
        {!! $syarat_pendaftaran['konten'] !!}
      </div>
    </div>
  </div>
</div>
<!--- End Syarat Pendaftaran -->

<!--- Alur Pendaftaran -->
<div class="site-section text-dark">
  <div class="container">
    <div class="row mb-5 justify-content-center text-center">
      <div class="col-lg-4 mb-5">
        <h2 class="section-title-underline mb-5">
          <span>Alur Pendaftaran</span>
        </h2>
      </div>
    </div>
    <div class="row">
      <div class="col">
        <nav>
          <div class="nav nav-tabs justify-content-center text-center" id="nav-tab" role="tablist">
            <a class="nav-item nav-link active col" id="n-online" data-toggle="tab" href="#nav-online" role="tab"
              aria-controls="n-online" aria-selected="true">Pendaftaran Online</a>
            <a class="nav-item nav-link col" id="n-offline" data-toggle="tab" href="#nav-offline" role="tab"
              aria-controls="n-offline" aria-selected="false">Pendaftaran Offline</a>
          </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
          <div class="tab-pane fade show active" id="nav-online" role="tabpanel" aria-labelledby="nav-online">
            {!! $pendaftaran_online['konten'] !!}
          </div>
          <div class="tab-pane fade" id="nav-offline" role="tabpanel" aria-labelledby="nav-offline">
            {!! $pendaftaran_offline['konten'] !!}
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--- End Alur Pendaftaran -->

<!--- Lokasi Sekolah
<div class="site-section">
  <div class="container">
    <div class="row mb-5 justify-content-center text-center">
      <div class="col-lg-4 mb-5">
        <h2 class="section-title-underline mb-5">
          <span>Lokasi</span>
        </h2>
      </div>
    </div>
    <div class="row">
      <div class="col">
        <div id="map">
          <p>test</p>
        </div>
      </div>
    </div>
  </div>
</div>
End Lokasi Sekolahs -->
@endsection