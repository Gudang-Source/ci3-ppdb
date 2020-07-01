<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Formulir Siswa/i</title>
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

        .header-separator {
            border: 0;
            border-top: 4px double;
        }

        .wrap-main {
            padding-left: 110px;
            padding-right: 110px;
            margin: auto;
        }

        .section-title {
            padding-top: 20px;
            padding-bottom: 10px;
            font-weight: bold;
        }

        .point {
            padding-left: 20px;
            padding-top: 4px;
            padding-bottom: 4px;
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
    
    <hr class="header-separator">
    
    <div class="wrap-main">
    <table width="100%">
        <tr>
            <td colspan="4">
                <h5 style="text-align: center;">
                    FORMULIR PENDAFTARAN <br>
                    CALON PESERTA DIDIK BARU SD MUHAMMADIYAH GIRIKERTO <br>
                    TAHUN AJARAN <?php echo date('Y'); ?>/<?php echo date('Y') + 1; ?>
                </h5>
            </td>
        </tr>
        <tr>
            <td>Tanggal Masuk</td>
            <td>: <?php echo $bio['create_date']; ?></td>
            <td rowspan="2" colspan="2" style="font-size: 24px; font-weight: bold; text-align: right;"><?php echo $bio['id']; ?></td>
        </tr>
        <tr>
            <td>Status</td>
            <td>: <?php echo $bio['status']; ?></td>
        </tr>
    </table>
        <hr>
    <table width="100%">
        <tr>
            <td class="section-title" colspan="4">A. INFORMASI PESERTA DIDIK</td>
        </tr>
        <tr>
            <td class="point">1. Nama Lengkap</td>
            <td class="point" colspan="3">: <?php echo $bio['fullname1']; ?></td>
        </tr>
        <tr>
            <td class="point">2. Tempat, Tanggal Lahir</td>
            <td class="point" colspan="3">: <?php echo $bio['tempat_lahir']; ?>, <?php echo $bio['tanggal_lahir']; ?></td>
        </tr>
        <tr>
            <td class="point">3. Jenis Kelamin</td>
            <td class="point" colspan="3">: <?php echo $bio['gender']; ?></td>
        </tr>
        <tr>
            <td class="point">4. Agama</td>
            <td class="point" colspan="3">: <?php echo $bio['agama1']; ?></td>
        </tr>
        <tr>
            <td class="point">5. Alamat</td>
            <td class="point" colspan="3">: <?php echo $bio['alamat1']; ?></td>
        </tr>
        <tr>
            <td class="section-title" colspan="4">B. INFORMASI ORANG TUA</td>
        </tr>
        <tr>
            <td class="point">6. Nama Lengkap</td>
            <td class="point" colspan="3">: <?php echo $bio['fullname2']; ?></td>
        </tr>
        <tr>
            <td class="point">7. Pekerjaan</td>
            <td class="point" colspan="3">: <?php echo $bio['pekerjaan1']; ?></td>
        </tr>
        <tr>
            <td class="point">8. Agama</td>
            <td class="point" colspan="3">: <?php echo $bio['agama2']; ?></td>
        </tr>
        <tr>
            <td class="point">9. Alamat</td>
            <td class="point" colspan="3">: <?php echo $bio['alamat2']; ?></td>
        </tr>
        <tr>
            <td class="point">10. Telepon</td>
            <td class="point" colspan="3">: <?php echo $bio['telepon1']; ?></td>
        </tr>
        <tr>
            <td class="section-title" colspan="4">C. INFORMASI WALI</td>
        </tr>
        <tr>
            <td class="point">11. Nama Lengkap</td>
            <td class="point" colspan="3">: <?php echo $bio['fullname3']; ?></td>
        </tr>
        <tr>
            <td class="point">12. Pekerjaan</td>
            <td class="point" colspan="3">: <?php echo $bio['pekerjaan2']; ?></td>
        </tr>
        <tr>
            <td class="point">13. Agama</td>
            <td class="point" colspan="3">: <?php echo $bio['agama3']; ?></td>
        </tr>
        <tr>
            <td class="point">14. Alamat</td>
            <td class="point" colspan="3">: <?php echo $bio['alamat3']; ?></td>
        </tr>
        <tr>
            <td class="point">15. Telepon</td>
            <td class="point" colspan="3">: <?php echo $bio['telepon2']; ?></td>
        </tr>
        <tr>
            <td class="section-title" colspan="4">D. INFORMASI ASAL SEKOLAH</td>
        </tr>
        <tr>
            <td class="point">16. Nama Sekolah</td>
            <td class="point" colspan="3">: <?php echo $bio['nama_sekolah']; ?></td>
        </tr>
        <tr>
            <td class="point">17. Status</td>
            <td class="point" colspan="3">: <?php echo $bio['status_sekolah']; ?></td>
        </tr>
        <tr>
            <td class="point">18. Alamat</td>
            <td class="point" colspan="3">: <?php echo $bio['alamat_sekolah']; ?></td>
        </tr>
    </table>
    </div>

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