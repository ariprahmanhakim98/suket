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
    <title>Web Apps | Rekapitulasi Data Kematian</title>
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
    <h3>Rekapitulasi Data Kematian</h3>
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
                <th>Hari</th>
                <th>Tanggal</th>
                <th>Sebab</th>
                <th>Tempat</th>
                <th>Pelapor</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                $result = $koneksi->query("SELECT * FROM data_kematian WHERE status = 1");
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
                <td><?= $row['hari'] ?></td>
                <td><?= $row['tanggal'] ?></td>
                <td><?= $row['sebab'] ?></td>
                <td><?= $row['tempat'] ?></td>
                <td><?= $row['pelapor'] ?></td>
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