<?php 
    include_once  "../lib/class-Db.php";
    include_once  "../lib/class-Ff.php";

    session_start();
    $user = isset($_SESSION['user'])?$_SESSION['user']:"";

    if($user == "")
    {
        $ff->alert('Anda harus login dulu untuk mengakses halaman ini!');
        $ff->redirect('../index.php');
    }
?>
 
<head>
<title>Admin Template</title>
<!-- syarat untuk responsive -->
<meta name="viewport" content="width=device-width, initial-sclae=1.0"> 
<link rel="stylesheet" type="text/css" href="../style/admin.css">
<script scr="../js/jquery-2.1.1.js"></script>

</head>

<body>
	<div id="header">
		<div class="logo">
			<a href="">Open<span>Source</span></a>
		</div>
	</div>

	<a class="mobile">MENU</a>

	<div id="container">
		<div class="sidebar" id="mysidebar">
			<ul id="nav">
				<li><a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times; Hide</a></li>
				<li><a href="admin.php" class="selected">Dashboard</a></li>
				<li><a href="#" class="selected">Master</a>
					<ul>
						<li><a href="?hal=dadmin">Admin</a></li>
						<li><a href="?hal=dbarang">Barang</a></li>
						<li><a href="?hal=dkategori">Kategori</a></li>
						<li><a href="?hal=dberita">Berita</a></li>
						<li><a href="?hal=dpenjual">Penjual</a></li>
						<li><a href="?hal=dpembeli">Pembeli</a></li>
						<li><a href="?hal=diklan">Iklan</a></li>
					</ul>
				</li>
				<li><a href="?hal=trans" class="selected">Transaksi</a>
					<ul>
						<li><a href="?hal=trans_det">Detail Transaksi</a></li>
					</ul>
				</li>
				<li><a href="?hal=logout" class="selected">Logout</a>
			</ul>
		</div>
		<div class="content" id="mycontent">
			<span id="open" style="font-size:300px;cursor:pointer;display: none;" onclick="openNav()">&#9776; open</span>

			<?php
				// $hal = isset($_GET['hal'])?$_GET['hal']:"dashboard";
				$hal = $ff->get("hal", "dashboard");
				include ("$hal".".php");
			?>
		</div>
	</div>
	<script type="text/javascript" src="../js/admin.js">

	</script>
</body>