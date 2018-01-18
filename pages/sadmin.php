<?php
    include_once "../lib/class-Db.php";
    include_once "../lib/class-Ff.php";
    $aksi = $ff->get("aksi");
    if ($aksi == "add") {
        $post = $odb->sant(INPUT_POST);
        extract($post);
        $odb->insert("tb_admin", "'', '$user', '$pass', '$email'");
        $ff->alert("Data berhasil disimpan");
        $ff->redirect("admin.php?hal=dadmin");
    }
    if ($aksi == "edit") {
        $id = $ff->get("id_admin");
        $post = $odb->sant(INPUT_POST);
        extract($post);
        $odb->update("tb_admin", "user = '$user', pass = '$pass', email = '$email' where id_admin='$id'");
        $ff->alert("Data berhasil diubah");
        $ff->redirect("admin.php?hal=dadmin");
    }
    if ($aksi == "hapus") {
        $id = $ff->get("id_admin");
        $odb->delete("tb_admin where id_admin='$id'");
        $ff->alert("Data berhasil dihapus");
        $ff->redirect("admin.php?hal=dadmin");
    }
?>
