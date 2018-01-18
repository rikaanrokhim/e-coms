<?php
include "../lib/cart.php";
require_once "../lib/class-Db.php";
require_once "../lib/class-Ff.php";


	if($ac == "al") {
		$pesan = "<fieldset class='alert'>Apakah anda yakin ingin menghapus data ini ? <br> 
		<a href='?pg=trans&ac=bl&id=$_GET[id_trans]' class='link3'>Hapus</a> | <a href='?pg=trans' class='link3'>Batal</a>
		</fieldset>";
	}
	if($ac == "bl") {
		$b=0;
		$tr = sel("tb_trans_det","*","where id_trans='$_GET[id]'");
		while($dr=far($tr)) {
			$b++;
			$bk = sel("tb_buku","*","where id_buku='$dr[id_buku]'");
			$db = far($bk);
			
			$stok = $db['stok'] + $data['jumlah'];
			
			$update = "update tb_buku set stok='$stok' where id_buku='$data[id_buku]'";
			mysql_query($update);
		}
	
		$del = "delete from tb_trans_det where id_trans='$_GET[id]'";
		mysql_query($del);
		$del = "delete from tb_trans where id_trans='$_GET[id]'";
		mysql_query($del);
		
		$pesan = "<fieldset class='alert'>Data berhasil dihapus !</fieldset>";
	}
	if($ac=="kf") {
		$update = "update tb_trans set status='2' where id_trans='$_GET[id]'";
		mysql_query($update) or die(mysql_error());
		
		$pesan = "<fieldset class='alert'>Konfirnmasi berhasil dengan ID Transaksi $_GET[id] !</fieldset>";
	}
	$q = "select * from tb_trans order by id_trans desc";
	$page = isset($_GET['page'])?$_GET['page']:"";
	$pag = $odb->paging($q,5,$page);
	
?>
	<table width="100%" border="0">
      <tr>
        <td height="34" colspan="6"><span style="float:right"><?= nav("?pg=trans",$page,$pag['j']); ?></span>        </td>
      </tr>
      <tr class="but" align="center">
        <td width="21%" height="35">-</td>
        <td width="62%">Detail</td>
        <td width="17%">Foto</td>
      </tr>
    </table>
<?php
	if(num(mysql_query($sel)) == 0) {
?>
	<fieldset class="alert">Data kosong !</fieldset>
<?php
	}
	else {
		while($data=far($pag['q'])) {
			$n++;
			$pel = sel("tb_pelanggan","*","where id_cust='$data[id_cust]'");
			$dpel = far($pel);
?>
    <table width="100%" border="0" class="pesan">
      <tr>
        <td width="21%" height="21">ID Transaksi</td>
        <td width="62%"><?= $data[0]?></td>
        <td width="17%" rowspan="6">
        <?php
			if($data['foto'] == "-") {
				echo "Not Uploaded !";
			} else {
		?>	
        	<img src="<?=$data['foto']?>" class="foto_buku" />
        <?php } ?>        </td>
      </tr>
      <tr>
        <td height="21">Pembeli</td>
        <td><?=$dpel['email']?></td>
      </tr>
      <tr>
        <td height="21">Alamat</td>
        <td><em><?= $dpel['alamat']?></td>
      </tr>
      <tr>
        <td height="21">Tanggal</td>
        <td><?=$data['tanggal']?></td>
      </tr>
      <tr>
        <td height="21">&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="21">Status Pembayaran</td>
        <td>
        <?php
		switch($data['status']) {
			case '0' : $a = "<font color='#FF9900'>Belum Melakukan Pembayaran</font>";break;
			case '1' : $a = "<a href='?pg=trans&ac=kf&id=$data[0]' class='but'>Konfirmasi</a>";break;
			case '2' : $a = "<font color='#66CC00'>Pembayaran succes, barang sudah dikirim .</font>";break;
		}
		
		echo $a;
	?>        </td>
      </tr>
      <tr>
        <td height="21">&nbsp;</td>
        <td>&nbsp;</td>
        <td align="left">&nbsp;</td>
      </tr>
      <tr>
        <td height="21">&nbsp;</td>
        <td>&nbsp;</td>
        <td align="left"><a href="?pg=trans&amp;ac=al&id=<?=$data[0]?>" class="but">Batalkan</a> <a href="?pg=trans_det&amp;id=<?=$data[0]?>" class="but">Detail</a></td>
      </tr>
      <tr>
        <td height="21">&nbsp;</td>
        <td>&nbsp;</td>
        <td align="left">&nbsp;</td>
      </tr>
    </table>
<?php } } ?>
