<?php
    $id = $ff->get("id_iklan");
    $res = $odb->select("tb_iklan where id_iklan = '$id'");
    $dt1 = $res->fetch();
?>
<div id="dox">
    <div class="box-top">Form Ubah Iklan</div>
    <div class="box-panel">
        <form method="post" action="siklan.php?aksi=edit&id_iklan=<?=$id?>" class="form-container" enctype="multipatr/form-data">
            <div class="form-title">Nama</div>
            <input type="text" name="nama" class="form-field" value="<?=$dt1['nama']?>">
            <div class="form-title">URL</div>
            <input type="url" name="url" class="form-field" value="<?=$dt1['url']?>">
            <div class="submit-container">
                <input type="submit" name="btnsimpan" value="simpan" class="submit-button">
            </div>
        </form>

        <form method="post" action="siklan.php?aksi=ganti&id_iklan=<?=$id?>" class="form-container" enctype="multipatr/form-data">
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