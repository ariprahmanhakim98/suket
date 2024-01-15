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
    <title>Web Apps | Rekapitulasi Data Penduduk</title>
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
    <h3>Rekapitulasi Data Penduduk</h3>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Foto</th>
                <th>NIK</th>
                <th>Nama</th>
                <th>Tempat Lahir</th>
                <th>Tanggal Lahir</th>
                <th>Jenis Kelamin</th>
                <th>Agama</th>
                <th>Pekerjaan</th>
                <th>Status Perkawinan</th>
                <th>Email</th>
                <th>No HP</th>
                <th>Alamat</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                $result = $koneksi->query("SELECT * FROM data_penduduk WHERE status = 1");
                $no = 1;
                if($result->num_rows > 0) :
                    while ($row = $result->fetch_assoc()) {
            ?>
            <tr>
                <td><?= $no++ ?></td>
                <td>
                    <img src='upload/<?= $row['foto'] ?>' width="50px" class="img-rounded height-30" />
                </td>
                <td><?= $row['nik'] ?></td>
                <td><?= $row['nama'] ?></td>
                <td><?= $row['tempat_lahir'] ?></td>
                <td><?= $row['tanggal_lahir'] ?></td>
                <td><?= $row['jenis_kelamin'] ?></td>
                <td><?= $row['agama'] ?></td>
                <td><?= $row['pekerjaan'] ?></td>
                <td><?= $row['status_perkawinan'] ?></td>
                <td><?= $row['email'] ?></td>
                <td><?= $row['no_telpon'] ?></td>
                <td><?= $row['alamat'] ?></td>
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