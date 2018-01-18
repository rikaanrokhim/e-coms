<div id="box">
    <div class="box-top">Form Tambah Barang</div>
    <div class="box-panel">
        <form method="post" action="sbarang.php?aksi=add" class="form-container" enctype="multipart/form-data">
            <div class="form-title">Nama</div>
            <input type="text" name="nama" class="form-field" value="">
            <div class="form-title">Penjual</div>
            <select name="id_pen" class="form-field">
                <?php
                    $q = $odb->select("tb_penjual");
                    while ($dt = $q->fetch()) {
                        ?>
                        <option value="<?=$dt['id_pen']?>"><?=$dt['penjual']?></option>
                        <?php
                    }
                ?>
            </select>
            <div class="form-title">Kategori</div>
            <select name="id_kat" class="form-field">
                <?php
                    $q = $odb->select("tb_kategori");
                    while ($dt = $q->fetch()) {
                        # code...
                        ?>
                        <option value="<?=$dt['id_kat']?>"><?=$dt['kategori']?></option>
                        <?php
                    }
                ?>
            </select>
            <div class="form-title">Harga</div>
            <input type="number" name="harga" class="form-field" value="">
            <div class="form-title">Stok</div>
            <input type="number" name="stok" class="form-field" value="">
            <div class="form-title">Deskripsi</div>
            <textarea name="deskripsi" class="form-field" value=""></textarea>
            <div class="form-title">Tags</div>
            <input type="text" name="tags" class="form-field" value="">
            <div class="form-title">Foto</div>
            <input type="file" name="foto" class="form-field" value="">
            <div class="form-title">Ukuran1</div>
            <input type="text" name="ukuran1" class="form-field" value="">
            <div class="form-title">Ukuran2</div>
            <input type="text" name="ukuran2" class="form-field" value="">
            <div class="form-title">Ukuran3</div>
            <input type="text" name="ukuran3" class="form-field" value="">
            <div class="form-title">Ukuran4</div>
            <input type="text" name="ukuran4" class="form-field" value="">
            <div class="submit-container">
                <input type="submit" name="btnsimpan" class="submit-button">
            </div>
        </form>
    </div>
</div>