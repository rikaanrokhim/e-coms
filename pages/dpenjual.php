<?php
    $q = "select * from tb_penjual";
    $page = isset($_GET['page'])?$_GET['page']:1;
    $pag = $odb->paging($q, 2, $page);
?>
<div id="box">
    <div class="box-top">Data Penjual</div>
    <div class="box-panel">
        <table>
            <tr>
                <th>No</th>
                <th>Nama Penjual</th>
                <th>Telefon</th>
                <th>Keterangan</th>
                <th>Alamat</th>
                <th colspan="2">Option</th>
            </tr>

            <?php
                $j = $pag["no"];
                $n = $j + 1;
                while ($dt = $pag["query"]->fetch()) {
            ?>

            <tr>
                <td><?=$n?></td>
                <td><?=$dt["penjual"]?></td>
                <td><?=$dt["telp"]?></td>
                <td><?=$dt["ket"]?></td>
                <td><?=$dt["alamat"]?></td>
                <td><a href="?hal=spenjual&aksi=hapus&id_pen=<?=$dt["id_pen"]?>" onclick="return confirm('Yakin menghapus data?')">Hapus</a></td>
                <td><a href="?hal=epenjual&id_pen=<?=$dt["id_pen"]?>">Ubah</a></td>

                <?php
                    $n++;
                    }
                ?>

            </tr>
            <tr>
                <td colspan="20 "></td>
            </tr>

        </table>
        <?php $odb->nav("?hal=dbarang", $pag["jumlah"], $page) ?> <br>
        <br>
        <a href="?hal=fpenjual" class="submit-button">Tambah</a>
    </div>
</div>