<!-- menulis ke session, jadi tidak langsung ditulis kedatabases, tapi ditampung di ssession  -->
<?php
	include_once("class-Ff.php");
	$aksi = $ff->get("aksi");

	if ($aksi) {
		$id = $ff->get("id_barang", "0");

		switch ($aksi) {
			case 'add':
				$jml = $ff->get("jml", "0");
				if (! empty($_SESSION['basket'][$id])) {
					$_SESSION['basket'][$id] += $jml;
				} else {
					$_SESSION['basket'][$id] = $jml;
				}
				break;
			case 'up':
				if (! empty($_SESSION['basket'])) {
					$jum = $ff->post("jum");
					foreach ($jum as $key => $val) {
						$_SESSION['basket'][$key] = $val;
					}
				}
				break;
			case 'dl':
				if (! empty($_SESSION['basket'][$id])) {
					unset($_SESSION['basket'][$id]);
				}
				break;
		}

		if (! empty($_SESSION['basket'])) {
			$basket = $_SESSION['basket'];
		}
	}
?>