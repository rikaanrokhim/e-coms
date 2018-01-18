<?php
    $q = "select * from tb_trans_det where id_trans_det = id_trans_det";
    $page = isset($_GET['page'])?$_GET['page']:1;
    $pag = $odb->paging($q, 2, $page);
?>

<div id="box">
    <div class="box-top">Detail Transaksi</div>
    <div class="box-panel">
        <table>
            <tr>
                <th>No</th>
                <th>Barang</th>
                <th>Jumlah</th>
                <th>Harga</th>
            </tr>

            <?php
                $j = $pag["no"];
                $n = $j + 1;
                while ($dt = $pag["query"]->fetch()) {
                $n++;
                $br = "select * from tb_barang where id_barang = '$dt[id_barang]'";
                $dr = far($br);
            ?>

            <tr>
                <td><?=$n?></td>
                <td><?=$dr[1]?></td>
                <td><?=$dt['jumlah']?></td>
                <td><?=$dr['harga']?></td>
            </tr>
            <?php } ?>

        </table>
    </div>
</div>