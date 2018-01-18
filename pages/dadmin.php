<?php
    $q = "select * from tb_admin";
    $page = isset($_GET['page'])?$_GET['page']:1;
    $pag = $odb->paging($q, 2, $page);
?>
<div id="box">
    <div class="box-top">Data Kategori</div>
    <div class="box-panel">
        <table>
        	<tr>
        		<th>Nomor</th>
        		<th>Nama User</th>
        		<th>Email</th>
                <th>Password</th>
        		<th colspan="2">Option</th>
        	</tr>
        	<?php
                $j = $pag["no"];
                $n = $j + 1;
                while ($dt=$pag["query"]->fetch()) {               
        	?>
        	<tr>
        	    <td><?=$n?></td>
        	    <td><?=$dt["user"]?></td>
                <td><?=$dt["email"]?></td>
                <td><?=$dt["pass"]?></td>
        	    <td><a href="?hal=sadmin&aksi=hapus&id_admin=<?=$dt['id_admin']?>" onclick="return confirm('Yakin menghapus data?')">Hapus</a></td>
        	    <td><a href="?hal=eadmin&id_admin=<?=$dt['id_admin']?>">Ubah</a></td>
        	</tr>
        	<?php
                $n++;
                 }
          	?>
        	<tr>
        	    <td colspan="20"></td>
        	</tr>
        </table>
        <?php $odb -> nav("?hal=dadmin", $pag["jumlah"], $page)?><br>
        <br>
        <a href="?hal=fadmin" class="submit-button">Tambah</a>
    </div>
</div>