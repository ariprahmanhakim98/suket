<?php
include 'koneksi.php';
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Web Apps | Rekapitulasi Data Kelahiran</title>
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
            <h1 class="page-header">Rekapitulasi Data Kelahiran</h1>
            <!-- end page-header -->
            
			<!-- begin row -->
			<div class="row">
				<!-- begin col-6 -->
				<div class="col-lg-12">
					<!-- begin panel -->
					<div class="panel panel-inverse" data-sortable-id="table-basic-7">
						<!-- begin panel-heading -->
						<div class="panel-heading">
							<div class="panel-heading-btn">
								<a href="cetakdatakelahiran.php" target="_blank" class="btn btn-sm btn-danger">print</a>
							</div>
							<h4 class="panel-title">Rekapitulasi Data Kelahiran</h4>
						</div>
						<!-- end panel-heading -->
						<!-- begin panel-body -->
						<div class="panel-body">
							<!-- begin table-responsive -->
							<div class="table-responsive">
								<table class="table table-striped m-b-0">
									<thead>
										<tr>
											<th>No</th>
											<th>No Surat</th>
											<th>Hari</th>
											<th>Tanggal</th>
											<th>Tempat</th>
											<th>Nama Anak</th>
											<th>Jenis Kelamin</th>
											<th>Nama Ibu</th>
											<th>Nama Ayah</th>
											<th>Alamat</th>
											<th width="1%">Action</th>
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
											<td><?= $row['jenis_kelamin'] ?></td>
											<td><?= $row['nama_ibu'] ?></td>
											<td><?= $row['nama_ayah'] ?></td>
											<td><?= $row['alamat'] ?></td>
											<td class="with-btn" nowrap>
												<a href="inputdatakelahiran.php?status=0&id=<?= $row['id'] ?>" class="btn btn-sm btn-primary width-60 m-r-2">Edit</a>
												<a href="deletedata.php?id=<?= $row['id'] ?>&tabel=data_kelahiran" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')" class="btn btn-sm btn-danger width-60">Delete</a>
											</td>
										</tr>
                                        <?php 
                                            }
                                        endif; 
                                        ?>
									</tbody>
								</table>
							</div>
							<!-- end table-responsive -->
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