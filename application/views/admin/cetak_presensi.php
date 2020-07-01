<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Presensi Penjajakan Siswa/i</title>
    <style>
        /** Define the margins of your page **/
        @page {
            margin: 0px;
        }

        body {
            margin: 0px;
        }

        .header-logo {
            max-width: 100px;
            max-height: 100px;
            padding-left: 110px;
        }

        .header-text {
            text-align: center;
            padding-right: 70px;
        }

        .info-presensi {
            width: 100%;
            padding-top: 10px;
            padding-bottom: 10px;
            padding-left: 70px;
        }

        .table-presensi {
            width: 100%;
            border: solid thin;
            border-collapse: collapse;
            padding-right: 70px;
            padding-left: 70px;
        }

        .table-presensi th {
            padding: 0.2em;
            vertical-align: middle;
            text-align: center;
            font-weight: bold;
        }

        .table-presensi th,
        .table-presensi td {
            border: solid thin;
            padding: 0.3rem 0.3rem;
            font-size: 12px;
        }
    </style>
</head>

<body>
    <table width="100%">
        <tr>
            <td><img class="header-logo" src="<?php echo base_url('assets/admin/images/logo-sdgirikerto-gray.png'); ?>"></td>
            <td>
                <h4 class="header-text">
                    MAJELIS PENDIDIKAN DASAR DAN MENENGAH <br>
                    PIMPINAN CABANG MUHAMMADIYAH TURI <br>
                    SD MUHAMMADIYAH GIRIKERTO <br>
                    TERAKREDITASI "A" <br>
                </h4>
                <p class="header-text">
                Alamat: Sidorejo, Girikerto, Turi, Sleman, Yogyakarta 55551 <br>
                Email: sdmuhammadiyahgirikerto@yahoo.com
                </p>
            </td>
        </tr>
    </table>
    
    <hr>
    
    <table class="info-presensi">
        <tr>
            <td>Pengawas : </td>
            <td>Tanggal : </td>
        </tr>
        <tr>
            <td>Jam : </td>
        </tr>
    </table>

    <table class="table-presensi">
        <thead>
            <tr>
                <th rowspan="2" style="width: 5%; ">No.</th>
                <th rowspan="2">Nama Lengkap</th>
                <th rowspan="2">Asal Sekolah</th>
                <th rowspan="2" style="width: 10%; ">Kehadiran</th>
                <th colspan="2" style="width: 20%; ">Nilai</th>
            </tr>
            <tr>
                <th>Tes 1</th>
                <th>Tes 2</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; ?>
            <?php foreach ($daftar_nama as $d) { ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $d['nama_lengkap']; ?></td>
                <td><?php echo $d['nama']; ?></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
    <script type="text/php">
    if ( isset($pdf) ) { 
        $pdf->page_script('
            if ($PAGE_COUNT > 1) {
                $font = $fontMetrics->get_font("Arial, Helvetica, sans-serif", "normal");
                $size = 12;
                $pageText = "Page " . $PAGE_NUM . " of " . $PAGE_COUNT;
                $y = 800;
                $x = 520;
                $pdf->text($x, $y, $pageText, $font, $size);
            } 
        ');
    }
    </script>
</body>
</html>