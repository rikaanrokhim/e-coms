<?php
    $q = "select a.id_barang, a.nama, a.harga, a.stok, b.penjual, a.foto
            from tb_barang a, tb_penjual b where b.id_pen = a.id_pen";
    $page = isset($_GET['page'])?$_GET['page']:1;
    $pag = $odb->paging($q, 2, $page);
?>
<div id="box">
    <div class="box-top">Data Barang</div>
    <div class="box-panel">
        <table>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Penjual</th>
                <th>Gambar</th>
                <th>Detail</th>
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
                <td><?=$dt["harga"]?></td>
                <td><?=$dt["stok"]?></td>
                <td><?=$dt["penjual"]?></td>
                <td><img src="../images/<?=$dt["foto"]?>" height="50" width="50"></td>

                <td><a href="?hal=detbarang&id_barang=<?=$dt["id_barang"]?>">Detail</a></td>
                <td><a href="?hal=sbarang&aksi=hapus&id_barang=<?=$dt["id_barang"]?>" onclick="return confirm('Yakin menghapus data?')">Hapus</a></td>
                <td><a href="?hal=ebarang&id_barang=<?=$dt["id_barang"]?>">Ubah</a></td>
            </tr>

            <?php
                $n++;
                }
            ?>

            <tr>
                <td colspan="20"></td>
            </tr>
        </table>

        <?php $odb->nav("?hal=dbarang", $pag["jumlah"], $page)?><br>
        <br>
        <a href="?hal=fbarang" class="submit-button">Tambah</a>

    </div>
</div>