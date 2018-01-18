<?php
    $id = $ff->get("id_pen");
    $res = $odb->select("tb_penjual where id_pen = '$id'");
    $dt1 = $res->fetch();
?>
<div id="box">
    <div class="box-top">Form Edit Data Penjual</div>
    <div class="box-panel">
        <form method="post" action="spenjual.php?aksi=edit&id_pen=<?=$id?>" class="form-container" enctype="multipart/form-data">
            <div class="form-title">Nama Penjual</div>
            <input type="text" name="penjual" class="form-field" value="<?=$dt1['penjual']?>">
            <div class="form-title">Telefon</div>
            <input type="number" name="telp" class="form-field" value="<?=$dt1['telp']?>">
            <div class="form-title">Keterangan</div>
            <textarea name="ket" class="form-field" value="<?=$dt1['ket']?>">
            <?=$dt1['ket']?>
            </textarea>
            <div class="form-title">Alamat</div>
            <textarea name="alamat" class="form-field" value="<?=$dt1['alamat']?>">
            <?=$dt1['alamat']?>
            </textarea>
            <div class="submit-container">
                <input type="submit" name="btnsimpan" value="simpan" class="submit-button">
            </div>
        </form>
    </div>
</div>