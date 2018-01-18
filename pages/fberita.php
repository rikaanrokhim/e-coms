<div id="box">
    <div class="box-top">Form Tambah Berita</div>
    <div class="box-panel">
        <form method="post" action="sberita.php?aksi=add" class="form-container" enctype="multipart/form-data">
            <div class="form-title">Judul</div>
            <input type="text" name="judul" class="form-field" value="">
            <!-- <div class="form-title">Head</div>
            <input type="hidden" name="head" class="form-field" value=""> -->
            <div class="form-title">Isi Berita</div>
            <textarea name="isi_ber" class="form-field" value=""></textarea>
            <!-- <div class="form-title">Tanggal</div>
            <input type="date" name="tanggal" class="form-field" value=""> -->
            <div class="form-title">At</div>
            <input type="text" name="at" class="form-field" value="">
            <div class="form-title">Foto</div>
            <input type="file" name="foto" class="form-field" value="">
            <div class="submit-container">
                <input type="submit" name="btnsimpan" class="submit-button">
            </div>
        </form>
    </div>
</div>