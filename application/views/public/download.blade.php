@extends('layouts.pmaster', ['kontak' => $kontak])

@section('header')
@parent
@endsection

@section('title', 'Download')

@section('header_title', 'Download Dokumen')

@section('breadcrumb', 'Download')

@section('content')

<div class="site-section">
    <div class="container border text-black">
        <div class="row">
            <div class="col">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Jenis File</th>
                            <th scope="col">Nama File</th>
                            <th scope="col">Size</th>
                            <th scope="col">Download</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($files as $f)
                        <tr>
                            <td>{{ $f['tipe'] }}</td>
                            <td>{{ $f['nama'] }}</td>
                            <td>{{ $f['size'] }} KB</td>
                            <td><a href="<?php echo base_url('/uploads/docs/'); ?>{{ $f['nama'] }}" target="_blank" rel="noopener noreferrer">Download</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection