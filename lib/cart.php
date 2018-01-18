<?php
	$ac = isset($_GET['ac'])?$_GET['ac']:"";
	
	if($ac) {
		$id = isset($_GET['id'])?$_GET['id']:0;
		
		switch($ac) {
			case 'add' : 
				if(! empty($_SESSION['basket'][$id])) {
					$_SESSION['basket'][$id] += 1;
				}
				else {
					$_SESSION['basket'][$id] = 1;
				}
				break;
			case 'up' : 
				if(! empty($_SESSION['basket'])) {
					$jum = isset($_POST['jum'])?$_POST['jum']:"";
					
					
					foreach($jum as $key => $val) {
						
							$_SESSION['basket'][$key] = $val;
						
					}
				}
				else {
					$p = "<fieldset class='alert'>Barang tidak ada di keranjang !</fieldset>";
				}
				break;
			case 'dl' : 
				if(! empty($_SESSION['basket'][$id])) {
					unset($_SESSION['basket'][$id]);
				}
				else { 
					$p = "<fieldset class='alert'>Barang tidak ada di keranjang !</fieldset>";
				}
				break;
		}
		
		if(! empty($_SESSION['basket'])) {
			$basket = $_SESSION['basket'];
		}
	}
?>