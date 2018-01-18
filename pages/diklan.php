<?php
    $q = "select * from tb_iklan";
    // $page = isset($_GET['page'])?$_GET['page']:1;
    $page = $ff->get("page", "1");
    $pag = $odb->paging($q, 2, $page);
?>
<div id="box">
    <div class="box-top">Data Iklan</div>
    <div class="box-panel">
        <table>
            <tr>
                <th>No</th>
                <th>Nama Iklan</th>
                <th>URL</th>
                <th>Gambar</th>
                <th colspan="2">Option</th>
            </tr>

            <?php
                $j = $pag["no"];
                $n = $j + 1;
                while ($dt = $pag["query"]->fetch()) {
            ?>

            <tr>
                <td><?=$n?></td>
                <td><?=$dt["nama"]?></td>
                <td><?=$dt["url"]?></td>
                <td><img src="../images/<?=$dt["foto"]?>" height="50" width="50"></td>
                <td><a href="?hal=siklan&aksi=hapus&id_iklan=<?=$dt["id_iklan"]?>" onclick="return confirm('Yakin menghapus data?')">Hapus</a></td>
                <td><a href="?hal=eiklan&id_iklan=<?=$dt["id_iklan"]?>">Ubah</a></td>

                <?php
                    $n++;
                    }
                ?>               
            </tr>
            <tr>
               <td colspan="20"></td> 
            </tr>
        </table>
        <?php $odb->nav("?hal=diklan", $pag["jumlah"], $page) ?> <br>
        <br>
        <a href="?hal=fiklan" class="submit-button">Tambah</a>
    </div>
</div>