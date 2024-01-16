<?php
include 'koneksi.php';
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$no_surat = "SKP-" . rand(10, 99) . rand(10, 99) . "/" . date('m/y');
$nik = "";
$nama = "";
$tempat_lahir = "";
$tanggal_lahir = "";
$jenis_kelamin = "";
$agama = "";
$alamat = "";
$pindah_dari = "";
$alasan_pindah = "";
$alamat_baru = "";
$jnspost = 'insert';
$idpindah = '';

if($_GET){
    if($_GET['status'] == '0'){
        $id_pindah = $_GET['id'];
        $result = $koneksi->query("SELECT * FROM data_pindah WHERE id = $id_pindah");
        $row = $result->fetch_assoc();
        $no_surat = $row['no_surat'];
        $nik = $row['nik'];
        $nama = $row['nama'];
        $tempat_lahir = $row['tempat_lahir'];
        $tanggal_lahir = $row['tanggal_lahir'];
        $jenis_kelamin = $row['jenis_kelamin'];
        $agama = $row['agama'];
        $alamat = $row['alamat'];
        $pindah_dari = $row['pindah_dari'];
        $alasan_pindah = $row['alasan_pindah'];
        $alamat_baru = $row['alamat_baru'];
        $idpindah = $row['id'];
        $jnspost = 'edit';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Web Apps | Data Pindah</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />

    <!-- ================== BEGIN BASE CSS STYLE ================== -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <link href="assets/plugins/jquery-ui/jquery-ui.min.css" rel="stylesheet" />
    <link href="assets/plugins/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/plugins/font-awesome/5.3/css/all.min.css" rel="stylesheet" />
    <link href="assets/plugins/animate/animate.min.css" rel="stylesheet" />
    <link href="assets/css/default/style.min.css" rel="stylesheet" />
    <link href="assets/css/default/style-responsive.min.css" rel="stylesheet" />
    <link href="assets/css/default/theme/default.css" rel="stylesheet" id="theme" />
    <!-- ================== END BASE CSS STYLE ================== -->

    <!-- ================== BEGIN PAGE LEVEL STYLE ================== -->
    <link href="assets/plugins/jquery-jvectormap/jquery-jvectormap.css" rel="stylesheet" />
    <link href="assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.css" rel="stylesheet" />
    <link href="assets/plugins/gritter/css/jquery.gritter.css" rel="stylesheet" />
    <!-- ================== END PAGE LEVEL STYLE ================== -->

    <!-- ================== BEGIN BASE JS ================== -->
    <script src="assets/plugins/pace/pace.min.js"></script>
    <!-- ================== END BASE JS ================== -->
</head>

<body>
    <!-- begin #page-loader -->
    <div id="page-loader" class="fade show"><span class="spinner"></span></div>
    <!-- end #page-loader -->

    <!-- begin #page-container -->
    <div id="page-container" class="fade page-sidebar-fixed page-header-fixed">
        <!-- begin #header -->
        <div id="header" class="header navbar-default">
            <!-- begin navbar-header -->
            <div class="navbar-header">
				<a href="index.php" class="navbar-brand text-center mb-2">
					<img src="assets/img/logo/mainlogo.jpeg" alt="Your Logo" style="max-height: 40px;" /> 
				</a>
                <button type="button" class="navbar-toggle" data-click="sidebar-toggled">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <!-- end navbar-header -->

            <!-- begin header-nav -->
            <ul class="navbar-nav navbar-right">
                <li class="dropdown navbar-user">
                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="assets/img/user/user-13.jpg" alt="" />
                        <span class="d-none d-md-inline">John Doe</span> <b class="caret"></b>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a href="logout.php" class="dropdown-item">Log Out</a>
                    </div>
                </li>
            </ul>
            <!-- end header navigation right -->
        </div>
        <!-- end #header -->

        <!-- begin #sidebar -->
        <div id="sidebar" class="sidebar">
            <!-- begin sidebar scrollbar -->
            <div data-scrollbar="true" data-height="100%">
                <!-- begin sidebar user -->
                <ul class="nav">
                    <li class="nav-profile">
                        <a href="javascript:;" data-toggle="nav-profile">
                            <div class="cover with-shadow"></div>
                            <div class="image">
                                <img src="assets/img/user/user-13.jpg" alt="" />
                            </div>
                            <div class="info">
                                <b class="caret pull-right"></b>
                                John Doe
                                <small>Administrator</small>
                            </div>
                        </a>
                    </li>
                </ul>
                <!-- end sidebar user -->
                <!-- begin sidebar nav -->
                <ul class="nav">
                    <li class="nav-header">Navigation</li>
                    <li class="has-sub active">
                        <a href="javascript:;">
                            <b class="caret"></b>
                            <i class="fa fa-th-large"></i>
                            <span>Dashboard</span>
                        </a>
                        <ul class="sub-menu">
                            <li class="active"><a href="index.php">Monitoring Rekapitulasi</a></li>
                        </ul>
                    </li>
                    <li class="has-sub">
                        <a href="javascript:;">
                            <b class="caret"></b>
                            <i class="fa fa-align-left"></i>
                            <span>Management Data</span>
                        </a>
                        <ul class="sub-menu">
                            <li><a href="inputdatapenduduk.php">Input Data Penduduk</a></li>
                            <li><a href="inputdatakelahiran.php">Input Data Kelahiran</a></li>
                            <li><a href="inputdatakematian.php">Input Data Kematian</a></li>
                            <li><a href="inputdataizinusaha.php">Input Data Izin Usaha</a></li>
							<li><a href="inputdatapindah.php">Tambah Data Pindah</a></li>
							<li><a href="approve.php">Approve</a></li>
                        </ul>
                    </li>
                    <li class="has-sub">
                        <a href="javascript:;">
                            <b class="caret"></b>
                            <i class="fa fa-align-left"></i>
                            <span>Report</span>
                        </a>
                        <ul class="sub-menu">
							<li><a href="rekapitulasidatapenduduk.php">Rekapitulasi Data Penduduk </a></li>
							<li><a href="rekapitulasidatakelahiran.php">Rekapitulasi Data Kelahiran</a></li>
							<li><a href="rekapitulasidatakematian.php">Rekapitulasi Data Kematian</a></li>
							<li><a href="jrekapitulasidataizinusaha.php">Rekapitulasi Data Izin Usaha</a></li>
                        </ul>
                    </li>
                    <!-- begin sidebar minify button -->
                    <li><a href="javascript:;" class="sidebar-minify-btn" data-click="sidebar-minify"><i
                                class="fa fa-angle-double-left"></i></a></li>
                    <!-- end sidebar minify button -->
                </ul>
                <!-- end sidebar nav -->
            </div>
            <!-- end sidebar scrollbar -->
        </div>
        <div class="sidebar-bg"></div>
        <!-- end #sidebar -->

        <!-- begin #content -->
        <div id="content" class="content">
            <!-- begin page-header -->
            <h1 class="page-header">Input Data Pindah</h1>
            <!-- end page-header -->
            <?php 
                if (isset($_GET['status'])) {
                    $status = $_GET['status'];
                    if($status != '0'){
                        if ($status == '1') {
                            echo '
                            <div class="alert alert-success fade show">
                                <span class="close" data-dismiss="alert">×</span>
                                <strong>Success!</strong>
                                <aclass="alert-link">Data berhasil disimpan</a>. 
                            </div>
                            ';
                        } else {
                            echo '
                            <div class="alert alert-danger fade show">
                                <span class="close" data-dismiss="alert">×</span>
                                <strong>Warning!</strong>
                                <a class="alert-link">Terjadi kesalahan saat menyimpan data</a>. 
                            </div>
                            ';
                        }
                    }
                
                }
            ?>


            <!-- begin row -->
            <div class="row">
                <!-- begin col-6 -->
                <div class="col-lg-12">
                    <!-- begin panel -->
                    <div class="panel panel-inverse" data-sortable-id="form-stuff-1">
                        <!-- begin panel-heading -->
                        <div class="panel-heading">
                            <h4 class="panel-title">Form Input Data Pindah</h4>
                        </div>
                        <!-- end panel-heading -->
                        <!-- begin panel-body -->
                        <div class="panel-body">
                            <form action="prosespindah.php" method="post">
                                <input type="hidden" name="id_pindah" value="<?= $idpindah ?>">
                                <input type="hidden" name="jenis_post" value="<?= $jnspost ?>">
                                <div class="form-group row m-b-15">
                                    <label class="col-form-label col-md-3">No. Surat</label>
                                    <div class="col-md-9">
                                        <input type="text" name="no_surat" class="form-control m-b-5" value="<?= $no_surat ?>" readonly />
                                    </div>
                                </div>
                                <div class="form-group row m-b-15">
                                    <label class="col-form-label col-md-3">NIK</label>
                                    <div class="col-md-9">
                                        <input type="text" name="nik" value="<?= $nik ?>" class="form-control m-b-5" placeholder="Masukan NIK" />
                                    </div>
                                </div>
                                <div class="form-group row m-b-15">
                                    <label class="col-form-label col-md-3">Nama</label>
                                    <div class="col-md-9">
                                        <input type="text" name="nama" value="<?= $nama ?>" class="form-control m-b-5" placeholder="Masukan Nama" />
                                    </div>
                                </div>
                                <div class="form-group row m-b-15">
                                    <label class="col-form-label col-md-3">Tempat Lahir</label>
                                    <div class="col-md-9">
                                        <input type="text" name="tempat_lahir" value="<?= $tempat_lahir ?>" class="form-control m-b-5" />
                                    </div>
                                </div>
                                <div class="form-group row m-b-15">
                                    <label class="col-form-label col-md-3">Tanggal Lahir</label>
                                    <div class="col-md-9">
                                        <input type="date" name="tanggal_lahir" value="<?= $tanggal_lahir ?>" class="form-control m-b-5" />
                                    </div>
                                </div>
                                <div class="form-group row m-b-15">
                                    <label class="col-form-label col-md-3">Jenis Kelamin</label>
                                    <div class="col-md-9">
                                        <select name="jenis_kelamin" value="<?= $jenis_kelamin ?>" class="form-control">
                                            <option value="Laki-Laki" <?= ($jenis_kelamin == 'Laki-Laki') ? 'selected' : '' ?>>Laki-Laki</option>
                                            <option value="Perempuan" <?= ($jenis_kelamin == 'Perempuan') ? 'selected' : '' ?>>Perempuan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row m-b-15">
                                    <label class="col-form-label col-md-3">Agama</label>
                                    <div class="col-md-9">
                                        <select name="agama" value="<?= $agama ?>" class="form-control">
                                            <option value="Islam" <?= ($agama == 'Islam') ? 'selected' : '' ?>>Islam</option>
                                            <option value="Kristen" <?= ($agama == 'Kristen') ? 'selected' : '' ?>>Kristen</option>
                                            <option value="Hindu" <?= ($agama == 'Hindu') ? 'selected' : '' ?>>Hindu</option>
                                            <option value="Budha" <?= ($agama == 'Budha') ? 'selected' : '' ?>>Budha</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row m-b-15">
                                    <label class="col-form-label col-md-3">Alamat</label>
                                    <div class="col-md-9">
                                        <textarea name="alamat" value="<?= $alamat ?>" class="form-control" rows="3"><?= $alamat ?></textarea>
                                    </div>
                                </div>
                                <div class="form-group row m-b-15">
                                    <label class="col-form-label col-md-3">Pindah dari</label>
                                    <div class="col-md-9">
                                        <textarea name="pindah_dari" value="<?= $pindah_dari ?>" class="form-control" rows="3"><?= $pindah_dari ?></textarea>
                                    </div>
                                </div>
                                <div class="form-group row m-b-15">
                                    <label class="col-form-label col-md-3">Alasan Pindah</label>
                                    <div class="col-md-9">
                                        <textarea name="alasan_pindah" value="<?= $alamat ?>" class="form-control" rows="3"><?= $alamat ?></textarea>
                                    </div>
                                </div>
                                <div class="form-group row m-b-15">
                                    <label class="col-form-label col-md-3">Alamat Baru</label>
                                    <div class="col-md-9">
                                        <textarea name="alamat_baru" value="<?= $alamat_baru ?>" class="form-control" rows="3"><?= $alamat_baru ?></textarea>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-sm btn-primary m-r-5">Simpan</button>
                                <a href="index.php" class="btn btn-sm btn-default">Kembali</a>
                            </form>
                        </div>
                        <!-- end panel-body -->
                    </div>
                    <!-- end panel -->
                </div>
                <!-- end col-6 -->
            </div>
            <!-- end row -->
        </div>
        <!-- end #content -->

        <!-- begin scroll to top btn -->
        <a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade"
            data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
        <!-- end scroll to top btn -->
    </div>
    <!-- end page container -->

    <!-- ================== BEGIN BASE JS ================== -->
    <script src="assets/plugins/jquery/jquery-3.3.1.min.js"></script>
    <script src="assets/plugins/jquery-ui/jquery-ui.min.js"></script>
    <script src="assets/plugins/bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
    <!--[if lt IE 9]>
		<script src="assets/crossbrowserjs/html5shiv.js"></script>
		<script src="assets/crossbrowserjs/respond.min.js"></script>
		<script src="assets/crossbrowserjs/excanvas.min.js"></script>
	<![endif]-->
    <script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="assets/plugins/js-cookie/js.cookie.js"></script>
    <script src="assets/js/theme/default.min.js"></script>
    <script src="assets/js/apps.min.js"></script>
    <!-- ================== END BASE JS ================== -->

    <!-- ================== BEGIN PAGE LEVEL JS ================== -->
    <script src="assets/plugins/gritter/js/jquery.gritter.js"></script>
    <script src="assets/plugins/flot/jquery.flot.min.js"></script>
    <script src="assets/plugins/flot/jquery.flot.time.min.js"></script>
    <script src="assets/plugins/flot/jquery.flot.resize.min.js"></script>
    <script src="assets/plugins/flot/jquery.flot.pie.min.js"></script>
    <script src="assets/plugins/sparkline/jquery.sparkline.js"></script>
    <script src="assets/plugins/jquery-jvectormap/jquery-jvectormap.min.js"></script>
    <script src="assets/plugins/jquery-jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
    <script src="assets/js/demo/dashboard.min.js"></script>
    <!-- ================== END PAGE LEVEL JS ================== -->

    <script>
        $(document).ready(function () {
            App.init();
            Dashboard.init();
        });
    </script>
</body>

</html>