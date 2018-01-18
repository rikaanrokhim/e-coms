<?php
    $q = "select * from tb_kategori";
    // $page = isset($_GET['page'])?$_GET['page']:1;
    $page = $ff->get("page", "1");
    $pag = $odb->paging($q, 2, $page);
?>
<div id="box">
    <div class="box-top">Data Kategori</div>
    <div class="box-panel">
        <table>
        	<tr>
        		<th>No</th>
        		<th>Nama Kategori</th>
        		<th>Sub Kategori</th>
        		<th colspan="2">Option</th>
        	</tr>
        	<?php
                $j = $pag["no"];
                $n = $j + 1;
                while ($dt=$pag["query"]->fetch()) {
                    #code ...
               
        	?>
        	<tr>
        	    <td><?=$n?></td>
        	    <td><?=$dt["kategori"]?></td>
        	    <td>
        	        <?php
        	            $isparent = $dt["isparent"];
        	            $q = $odb -> select("tb_kategori where id_kat='$isparent'");
        	            $d = $q -> fetch();
        	            echo $d['kategori'];
        	        ?>
        	    </td>
        	    <td><a href="?hal=skategori&aksi=hapus&id_kat=<?=$dt['id_kat']?>" onclick="return confirm('Yakin menghapus data?')">Hapus</a></td>
        	    <td><a href="?hal=ekategori&id_kat=<?=$dt['id_kat']?>">Ubah</a></td>
        	</tr>
        	<?php
                $n++;
                 }
          	?>
        	<tr>
        	    <td colspan="20"></td>
        	</tr>
        </table>
        <?php $odb->nav("?hal=dkategori", $pag["jumlah"], $page)?><br>
        <br>
        <a href="?hal=fkategori" class="submit-button">Tambah</a>
    </div>
</div>