<html>

<head>
    <meta charset="UTF-8">
    <link href="<?= base_url() ?>/assets/css/cetak_css.css" rel="stylesheet" />
    <style type="text/css">
        .tg {
            border-collapse: collapse;
            border-spacing: 0;
        }

        .tg td {
            font-family: Arial, sans-serif;
            font-size: 14px;
            padding: 10px 5px;
            border-style: solid;
            border-width: 1px;
            overflow: hidden;
            word-break: normal;
            border-color: black;
        }

        .tg th {
            font-family: Arial, sans-serif;
            font-size: 14px;
            font-weight: normal;
            padding: 10px 5px;
            border-style: solid;
            border-width: 1px;
            overflow: hidden;
            word-break: normal;
            border-color: black;
        }

        .tg .tg-andl {
            font-weight: bold;
            font-size: 14px;
            font-family: "Times New Roman", Times, serif !important;
            ;
            border-color: #ffffff;
            text-align: center;
            vertical-align: top
        }

        .tg .tg-rg0r {
            font-weight: bold;
            font-size: 16px;
            font-family: "Times New Roman", Times, serif !important;
            ;
            border-color: #ffffff;
            color: #0017c2;
            text-align: center;
            vertical-align: top
        }

        .tg-rer {
            font-size: 9px;
            font-family: "Times New Roman", Times, serif !important;
            margin-top: 0;
            padding-left: 35px;
            border-color: #ffffff;
            text-align: center;
            vertical-align: top
        }

        .tg .tg-rgr2 {
            font-size: 10px;
            font-family: "Times New Roman", Times, serif !important;
            ;
            border-color: #ffffff;
            text-align: left;
            vertical-align: top
        }

        .header {
            padding-top: 30px;
            text-align: center;
        }

        .content {
            font-family: "Times New Roman", Times, serif;
            padding-top: 20px;
            font-size: 14px;
            text-align: justify;
        }

        .title {
            font-family: "Times New Roman", Times, serif;
            font-size: 21px;
            color: #000000;
            font-weight: bold;
            text-decoration: underline solid rgb(68, 68, 68);
            font-style: normal;
            font-variant: normal;
            text-transform: uppercase;
        }

        .tembusan {
            font-family: "Times New Roman", Times, serif;
            margin-top: 20px;
            font-size: 14px;
            text-align: justify;
        }

        .bwh {
            font-size: 12px;
            font-family: "Times New Roman", Times, serif !important;
            ;
            border-color: #ffffff;
            color: #000000;
            text-align: center;
            vertical-align: top
        }

        @font-face {
            font-family: "myFirstFont";
            src: url("<?= base_url() ?>assets/alexon-rr-medium.ttf");
        }
        
        .kopSurat {
            font-family: "myFirstFont";
            color: blue;
        }
    </style>
</head>

<body>
    <table style="align:center;margin-left:43%">
        <tr>
            <th><img width="15%" src="<?= base_url('assets/img/logoumsida.jpg') ?>"></th>
        </tr>
    </table>
    <table style="align:center;margin-left:13%">
        <tr>
            <th style= "font-size:140%;"><span style="color:blue">UNIVERSITAS MUHAMMADIYAH SIDOARJO<br>
                FAKULTAS SAINS DAN TEKNOLOGI</span>
                <br>
                <span class="bwh" style= "font-size:60%"><br>- INFORMATIKA (S1) - TEKNIK INDUSTRI (S1) - TEKNIK MESIN(S1)<br>
                - TEKNIK ELEKTRO (S1) - TEKNOLOGI HASIL PERTANIAN (S1) - AGROTEKNOLOGI (S1)</span></p></th>
        </tr>
    </table>
    <!-- <img src="<?= base_url('assets/img/border.jpg') ?>"> -->
    <div style="padding-right:90px; padding-left:90px; margin-right: 90px; margin-left:90px;">
        <div style="height: 3px;
        background-color: red;
        background-image: linear-gradient(to left, #374876 , #cb9559);"></div>
    </div>
    <div class="header">
        <table>
            <tr>
                <td style="padding-right:35%;"> </td>
                <td style="vertical-align:top;padding-right:100px;text-align:center;"> <span class="title">
                        SURAT PENGANTAR
                    </span>
                    <br>
                </td>
                
            </tr>
        </table>

    </div>

    <div class="content">
        <?php foreach ($detail_tim as $item) : ?>
        <?php $date = getdate(); ?>
        <table>
            <tr>
                <td style="vertical-align:top;padding-right:30px;">Nomor</td>
                <td style="vertical-align:top;padding-right:10px;">:</td>
                <td style="text-align: justify;"> <?= $detail['no_surat'] ?>
                </td>
            </tr>
            <tr>
                <td style="vertical-align:top;padding-right:30px;">Perihal</td>
                <td style="vertical-align:top;padding-right:10px;">:</td>
                <td style="text-align: justify;"> <?= $item->jenis_surat; ?>
                </td>
            </tr>
            <tr></tr>
        </table>
        <p>
        <br>
        <table>
            <tr>
                <td style="vertical-align:top;padding-right:70px;"></td>
                <td style="vertical-align:top;padding-right:17px;">Kepada Yth</td>
                <td style="text-align: justify;">
                </td>
            </tr>
        </table>
        <table>
            <tr>
                <td style="vertical-align:top;padding-right:70px;"></td>
                <td style="vertical-align:top;padding-right:17px;"><b>Pimpinan <?= $item->tempat_pkl; ?></td>
                <td style="text-align: justify;">
                </td>
            </tr>
        </table>
        <table>
            <tr>
                <td style="vertical-align:top;padding-right:70px;"></td>
                <td style="vertical-align:top;padding-right:17px;"><b><?= $item->lokasi_pkl; ?></td>
                <td style="text-align: justify;">
                </td>
            </tr>
        </table>
        <table>
            <tr>
                <td style="vertical-align:top;padding-right:70px;"></td>
                <td style="vertical-align:top;padding-right:17px;">Di Tempat,</td>
                <td style="text-align: justify;">
                </td>
            </tr>
        </table>
        <p></p>
        <table>
            <tr>
                <td style="vertical-align:top;padding-right:70px;"></td>
                <td style="vertical-align:top;padding-right:17px;">Assalamu’alaikum Wr.Wb</td>
                <td style="text-align: justify;">
                </td>
            </tr>
        </table>
        <table>
            <tr>
                <td style="vertical-align:top;padding-right:70px;"></td>
                <td style="vertical-align:top;padding-right:17px;">Dalam rangka melengkapi tugas Akademik Fakultas Sains dan Teknologi</td>
                <td style="text-align: justify;">
                </td>
            </tr>
        </table>
        <table>
            <tr>
                <td style="vertical-align:top;padding-right:70px;"></td>
                <td style="vertical-align:top;padding-right:17px;">Universitas Muhammadiyah Sidoarjo, maka kami mohon dengan hormat agar</td>
                <td style="text-align: justify;">
                </td>
            </tr>
        </table>
        <table>
            <tr>
                <td style="vertical-align:top;padding-right:70px;"></td>
                <td style="vertical-align:top;padding-right:17px;">mahasiswa di bawah ini :</td>
                <td style="text-align: justify;">
                </td>
            </tr>
        </table>
        <table>
            <tr>
                <td style="vertical-align:top;padding-right:60px;"></td>
                <td style="vertical-align:top;padding-right:50px;"></td>
            </tr>
            
                <tr>
                    <td rowspan="8"></td>
                    <td style="vertical-align:top;" rowspan="8"></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td>Nama</td>
                    <td> : </td>
                    <td><?= $detail['nama'] ?></td>
                </tr>
                <tr>
                    <td></td>
                    <td>Nim</td>
                    <td> : </td>
                    <td><?= $detail['nim'] ?></td>
                </tr>
        </br>
                <tr>
                    <td></td>
                    <td>Nama</td>
                    <td> : </td>
                    <td><?= $item->nama1; ?></td>
                </tr>
                <tr>
                    <td></td>
                    <td>Nim</td>
                    <td> : </td>
                    <td><?= $item->nim1; ?></td>
                </tr>
                <tr>
                <td style="vertical-align:top;padding-right:50px;"></td>
            </tr>
                <tr>
                    <td></td>
                    <td>Semester</td>
                    <td> : </td>
                    <td><?= $detail['semester'] ?></td>
                </tr>
                <tr>
                    <td></td>
                    <td>Prodi</td>
                    <td> : </td>
                    <td><?= $detail['prodi'] ?></td>
                </tr>
                    <td colspan="5"><br></td>
                </tr>
        </table>
        <!-- <table>
            <tr>
                <td style="vertical-align:top;padding-right:70px;">Untuk</td>
                <td style="vertical-align:top;padding-right:15px;">:</td>
                <td style="text-align: justify;">Melaksanakan penelitian dengan judul "<?= $detail['judul_penelitian'] ?>" dan tujuan "<?= $detail['tujuan_penelitian'] ?>", pada tanggal <?= formaldate_indo($detail['tgl_mulai']) ?> s.d <?= formaldate_indo($detail['tgl_akhir']) ?> di <?= $detail['lokasi_penelitian'] ?>.
                </td>
            </tr>
        </table> -->
        <p></p>
        <!-- <p style="font-size:14px;">Biaya yang berkaitan dengan pelaksanaan tugas ini dibebankan pada anggaran BOPTN <i>cluster interdisipliner</i>.<br>Setelah selesai melaksanakan tugas segera menyampaikan laporan kepada pemberi tugas.<br>Demikian surat tugas ini dibuat untuk dilaksanakan dengan penuh tanggung jawab.</i></p> -->
        <table>
            <tr>
                <td style="vertical-align:top;padding-right:70px;"></td>
                <td style="vertical-align:top;padding-right:17px;">Diperkenankan untuk melaksanakan Praktik Kerja Lapangan selama 1 bulan di</td>
                <td style="text-align: justify;">
                </td>
            </tr>
        </table>
        <table>
            <tr>
                <td style="vertical-align:top;padding-right:70px;"></td>
                <td style="vertical-align:top;padding-right:17px;">Balai Desa yang Bapak/Ibu Pimpin.</td>
                <td style="text-align: justify;">
                </td>
            </tr>
        </table>
        <p></p>
        <table>
            <tr>
                <td style="vertical-align:top;padding-right:70px;"></td>
                <td style="vertical-align:top;padding-right:17px;">Demikian surat permohonan ini, atas perhatian dan kerjasamanya kami sampaikan terima kasih.</td>
                <td style="text-align: justify;">
                </td>
            </tr>
        </table>
        <table>
            <tr>
                <td style="vertical-align:top;padding-right:70px;"></td>
                <td style="vertical-align:top;padding-right:17px;">Wassalamu’alaikum Wr. Wb</td>
                <td style="text-align: justify;">
                </td>
            </tr>
        </table>
        <p></p>
        <table>
            <tr>
            <td style="padding-right:15%;"> </td>
                <td style="vertical-align:top;text-align:center;padding-right:70px;padding-top:5%;">
                    <span>
                        <img width="110" src="<?= base_url('assets/img/qrcode/' . $detail['qrcode_name']) ?>">
                        
                    </span>
                </td>
            </tr>
        </table>
        <table style="padding-left:420px; padding-top:-16%;">
            <tr>
                <td>Sidoarjo</td>
                <td>,</td>
                <td><?= date('d F Y'); ?></td>
            </tr>
            <br>
        </table>
        <table style="padding-left:420px;">
            <tr>
                <td>Ka</td>
                <td>.Prodi</td>
                <td><?= $detail['prodi'] ?></td>
            </tr>
        </table>
        <div style="padding-left:420px;">
            <img width="100" src="<?= base_url('upload/surat/'). $detail['foto_ttd']; ?>">
        </div>
        <table style="padding-left:420px;">
            <tr>
                <td><?= $detail['nama_kaprodi']; ?></td>
            </tr>
        </table>
        <?php endforeach; ?>
    </div>
</body>

</html>