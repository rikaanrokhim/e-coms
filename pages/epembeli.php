<?php
    $id = $ff->get("id_cust");
    $res = $odb->select("tb_pelanggan where id_cust = '$id'");
    $dt1 = $res->fetch();
?>
<div id="box">
    <div class="box-top">Form Edit Pelanggan</div>
    <div class="box=panel">
        <form method="post" action="spembeli.php?aksi=edit&id_cust=<?=$id?>" class="form-container" enctype="multipart/form-data">
            <div class="form-title">Username</div>
            <input type="text" name="user" class="form-field" value="<?=$dt1['user']?>"> 
            <div class="form-title">Password</div>
            <input type="passsword" name="pass" class="form-field" value="<?=$dt1['pass']?>">
            <div class="form-title">Email</div>
            <input type="email" name="email" class="form-field" value="<?=$dt1['email']?>">
            <div class="form-title">Alamat</div>
            <textarea name="alamat" class="form-field" value="<?=$dt1['alamat']?>">
            <?=$dt1['alamat']?>
            </textarea>
            <div class="form-title">Kode Pos</div>
            <input type="number" name="k_pos" class="form-field" value="<?=$dt1['k_pos']?>">
            <div class="form-title">Telefon</div>
            <input type="number" name="telp" class="form-field" value="<?=$dt1['telp']?>">
            <div class="form-title">Status</div>
            <input type="text" name="status" class="form-field" value="<?=$dt1['status']?>">
            <div class="submit-container">
                <input type="submit" name="btnsimpan" value="simpan" class="submit-button">
            </div>
        </form>
    </div>
</div>