<?php
    include_once "../lib/class-Db.php";
    include_once "../lib/class-Ff.php";
    $aksi = $ff->get("aksi");
    if ($aksi == "add") {
        $post = $odb->sant(INPUT_POST);
        extract($post);
        $odb->insert("tb_kategori", "'', '$kategori', '$isparent'");
        $ff->alert("Data berhasil disimpan");
        $ff->redirect("admin.php?hal=dkategori");
    }
    if ($aksi == "edit") {
        $id = $ff->get("id_kat");
        $post = $odb->sant(INPUT_POST);
        extract($post);
        $odb->update("tb_kategori", "kategori='$kategori', isparent='$isparent' where id_kat='$id'");
        $ff->alert("Data berhasil diubah");
        $ff->redirect("admin.php?hal=dkategori");
    }
    if ($aksi == "hapus") {
        $id = $ff->get("id_kat");
        $odb->delete("tb_kategori where id_kat='$id'");
        $ff->alert("Data berhasil dihapus");
        $ff->redirect("admin.php?hal=dkategori");
    }
?>
