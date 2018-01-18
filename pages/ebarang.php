<?php

    $id = $ff->get("id_barang");
    $res = $odb->select("tb_barang where id_barang = '$id'");
    $dt1 = $res->fetch();

?>
<div id="box">
    <div class="box-top">Form Ubah Barang</div>
    <div class="box-panel">
        <form method="post" action="sbarang.php?aksi=edit&id_barang=<?=$id?>" class="form-container" enctype="multipart/form-data">
        <div class="form-title">Nama</div>
        <input type="text" name="nama" class="form-field" value="<?=$dt1['nama']?>">
        <div class="form-title">Penjual</div>
        <select name="id_pen" class="form-field">
            <?php
                $q = $odb->select("tb_penjual");
                while ($dt = $q->fetch()) {
                    # code...
                    if ($dt1['id_pen'] == ['id_pen']) {
                    ?>
                    <option value="<?=$dt['id_pen']?>" selected="selected">
                    <?=$dt['penjual']?></option>

                    <?php
                    }
                    else {
                    ?>
                        <option value="<?=$dt['id_pen']?>"><?=$dt['penjual']?>
                        </option>
                    <?php
                    }
                }
            ?>
        </select>
        <div class="form-title">Kategori</div>
        <select name="id_kat" class="form-field">
            <?php
                $q = $odb->select("tb_kategori");
                while ($dt = $q->fetch()) {
                    # code...
                    if ($dt['id_kat'] == $dt1['id_kat']) {
                    ?>
                    <option value="<?$dt['id_kat']?>" selected="selected">
                    <?=$dt['kategori']?></option>
                    <?php
                    } else {
                    ?>
                        <option value="<?=$dt['id_kat']?>"><?=$dt['kategori']?></option>
                    <?php
                    }
                }
            ?>
        </select>
        <div class="form-title">Harga</div>
        <input type="number" name="harga" class="form-field" value="<?=$dt1['harga']?>">
        <div class="form-title">Stok</div>
        <input type="number" name="stok" class="form-field" value="<?=$dt1['stok']?>">
        <div class="form-title">Deskripsi</div>
        <textarea name="deskripsi" class="form-field" value="<?=$dt1['tags']?>">
            <?=$dt1['deskripsi']?>
        </textarea>
        <div class="form-title">Tags</div>
        <input type="text" name="tags" class="form-field" value="<?=$dt1['tags']?>">
        <div class="form-title">Ukuran 1</div>
        <input type="text" name="ukuran1" class="form-field" value="<?=$dt1['ukuran1']?>">
        <div class="form-title">Ukuran 2</div>
        <input type="text" name="ukuran2" class="form-field" value="<?=$dt1['ukuran2']?>">
        <div class="form-title">Ukuran 3</div>
        <input type="text" name="ukuran3" class="form-field" value="<?=$dt1['ukuran3']?>">
        <div class="form-title">Ukuran 4</div>
        <input type="text" name="ukuran4" class="form-field" value="<?=$dt1['ukuran4']?>">
        <div class="submit-container">
            <input type="submit" name="btnsimpan" value="simpan" class="submit-button">
        </div>
        </form>

            <form method="post" action="sbarang.php?aksi=ganti&id_barang=<?=$id?>" class="form-container" enctype="multipart/form-data">
                <div class="form-title">Foto
                    <img src="../images/<?=$dt1['foto']?>" height="50" width="50">
                </div>
                <input type="file" name="foto" class="form-field" value="">
                <div class="submit-container">
                    <input type="submit" name="btnugambar" value="ubah gambar" class="submit-button">
                </div>
            </form>
    </div>
</div>