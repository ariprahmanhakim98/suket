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
    <title>Web Apps | Rekapitulasi Data Kelahiran</title>
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
    <h3>Rekapitulasi Data Kelahiran</h3>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>No Surat</th>
                <th>Hari</th>
                <th>Tanggal</th>
                <th>Tempat</th>
                <th>Nama Anak</th>
                <th>Nama Ibu</th>
                <th>Nama Ayah</th>
                <th>Alamat</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                $result = $koneksi->query("SELECT * FROM data_kelahiran WHERE status = 1");
                $no = 1;
                if($result->num_rows > 0) :
                    while ($row = $result->fetch_assoc()) {
            ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $row['no_surat'] ?></td>
                <td><?= $row['hari'] ?></td>
                <td><?= $row['tanggal'] ?></td>
                <td><?= $row['tempat'] ?></td>
                <td><?= $row['nama_anak'] ?></td>
                <td><?= $row['nama_ibu'] ?></td>
                <td><?= $row['nama_ayah'] ?></td>
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