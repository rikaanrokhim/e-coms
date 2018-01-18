<div id="box">
    <div class="box-top">Form Tambah Kategori</div>
    <div class="box-panel">
        <form method="post" action="skategori.php?aksi=add" class="form-container">
            <div class="form-title">Kategori</div>
            <input type="text" name="kategori" class="form-field" value="">
            <div class="form-title">Isparent</div>
            <select name="isparent" class="form-field">
            	<option value="0">---</option>
            	<?php
                    $q = $odb->select("tb_kategori");
                    while ($dt = $q->fetch()) {
                        #code ...
            	?>
            <option value="<?=$dt["id_kat"]?>"><?=$dt['kategori']?></option>
                <?php
                    }
                ?>
            </select>
            <div class="submit-container">
                <input type="submit" name="btnsimpan" class="submit-button">
            </div>
        </form>
    </div>
</div>