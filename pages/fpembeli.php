<div id="box">
    <div class="box-top">Form Tambah Pelanggan</div>
    <div class="box-panel">
        <form method="post" action="spembeli.php?aksi=add" class="form-container" enctype="multipart/form-data">
            <div class="form-title">Username</div>
            <input type="text" name="user" class="form-field" value="">
            <div class="form-title">Password</div>
            <input type="password" name="pass" class="form-field" value="">
            <div class="form-title">Email</div>
            <input type="email" name="email" class="form-field" value="">
            <div class="form-title">Alamat</div>
            <textarea name="alamat" class="form-field" value=""></textarea>
            <div class="form-title">Kode Pos</div>
            <input type="number" name="k_pos" class="form-field" value="">
            <div class="form-title">Telefon</div>
            <input type="number" name="telp" class="form-field" value="">
            <div class="form-title">Status</div>
            <input type="text" name="status" class="form-field" value="">
            <div class="submit-container">
                <input type="submit" name="btnsimpan" class="submit-button">
            </div>
        </form> 
    </div>
</div>