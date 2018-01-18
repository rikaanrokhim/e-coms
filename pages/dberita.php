<?php
    $q = "select * from tb_berita";
    $page = isset($_GET['page'])?$_GET['page']:1;
    $pag = $odb->paging($q, 2, $page);
?>
<div id="box">
    <div class="box-top">Data Berita</div>
    <div class="box-panel">
        <table>
            <tr>
                <th>No</th>
                <th>Judul Berita</th>
                <th>Head</th>
                <th>Isi Berita</th>
                <th>Tanggal</th>
                <th>At</th>
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
                <td><?=$dt['judul']?></td>
                <td><?=$dt['head']?></td>
                <td><?=$dt['isi_ber']?></td>
                <td><?=$dt['tanggal']?></td>
                <td><?=$dt['at']?></td>
                <td><img src="../images/<?=$dt['foto']?>" width="50" height="50"></td>
                <td><a href="?hal=sberita&aksi=hapus&id_berita=<?=$dt['id_berita']?>" onclick="return confirm('Yakin menghapus data?')">Hapus</a></td>
                <td><a href="?hal=eberita&id_berita=<?=$dt["id_berita"]?>">Ubah</a></td>

                <?php
                    $n++;
                    }
                ?>

            </tr>

            <tr>
                <td colspan="20"></td>
            </tr>
        </table>
        <?php $odb->nav("?hal=dberita", $pag["jumlah"], $page) ?> <br>
        <br>
        <a href="?hal=fberita" class="submit-button">Tambah</a>
    </div>
</div>