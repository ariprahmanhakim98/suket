<?php
include 'koneksi.php';
?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8" />
    <title>Web Apps | Rekapitulasi Data Izin Usaha</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }
    </style>
</head>

<body>
    <h3>Rekapitulasi Data Izin Usaha</h3>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>No Surat</th>
                <th>NIK</th>
                <th>Nama</th>
                <th>Tanggal Lahir</th>
                <th>Jenis Kelamin</th>
                <th>Agama</th>
                <th>Alamat</th>
                <th>Pekerjaan</th>
                <th>Alamat Usaha</th>
                <th>Jenis Usaha</th>
                <th>Nama Usaha</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                $result = $koneksi->query("SELECT * FROM data_izinusaha WHERE status = 1");
                $no = 1;
                if($result->num_rows > 0) :
                    while ($row = $result->fetch_assoc()) {
            ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $row['no_surat'] ?></td>
                <td><?= $row['nik'] ?></td>
                <td><?= $row['nama'] ?></td>
                <td><?= $row['tanggal_lahir'] ?></td>
                <td><?= $row['jenis_kelamin'] ?></td>
                <td><?= $row['agama'] ?></td>
                <td><?= $row['alamat'] ?></td>
                <td><?= $row['pekerjaan'] ?></td>
                <td><?= $row['alamat_usaha'] ?></td>
                <td><?= $row['jenis_usaha'] ?></td>
                <td><?= $row['nama_usaha'] ?></td>
            </tr>

            <?php 
                }
            endif; 
            ?>
        </tbody>

    </table>
    <script>
       window.onload = function() {
           window.print();
       };
    </script>
</body>

</html>