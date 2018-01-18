<?php
    $id = $ff->get("id_kat");
    $res = $odb->select("tb_kategori where id_kat='$id'");
    $dt1 = $res->fetch();
?>
<div id="box">
    <div class="box-top">Form Edit Kategori</div>
    <div class="box-panel">
        <form method="post" action="skategori.php?aksi=edit&id_kat=<?=$id?>" class="form-container">
            <div class="form-title">Kategori</div>
                <input type="text" name="kategori" class="form-field" value="<?=$dt1['kategori']?>">
            <div class="form-title">Isparent</div>
                <select name="isparent" class="form-field">
                    <option value="0">---</option>
                        <?php
                            $q = $odb->select("tb_kategori");
                            while ($dt = $q->fetch()) {
                                #code ...
                        ?>
                        <option value="<?=$dt['id_kat']?>"><?=$dt['kategori']?></option>
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