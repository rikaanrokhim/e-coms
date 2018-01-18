<div id="box">
    <div class="box-top">From Tambah Data Penjual</div>
    <div class="box-panel">
        <form method="post" action="spenjual.php?aksi=add" class="form-container" enctype="multipart/form-data">
            <div class="form-title">Nama Penjual</div>
            <input type="text" name="penjual" class="form-field" value="">
            <div class="form-title">Telefon</div>
            <input type="number" name="telp" class="form-field" value="">
            <div class="form-title">Keterangan</div>
            <textarea name="ket" class="form-field" value=""></textarea>
            <div class="form-title">Alamat</div>
            <textarea name="alamat" class="form-field" value=""></textarea>
            <div class="submit-container">
                <input type="submit" name="btnsimpan" value="simpan" class="submit-button">
            </div>
        </form>
    </div>
</div>