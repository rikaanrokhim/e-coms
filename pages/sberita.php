<?php
    include_once "../lib/class-Db.php";
    include_once "../lib/class-Ff.php";

    $aksi = $ff->get("aksi");

    if ($aksi == "add") {
        $post = $odb->sant(INPUT_POST);
        extract($post);
        $sukses = $ff->upload("foto");
        $tgl = date("Y-m-d");
        $head = substr($isi_ber, 0, 10);
        if ($sukses != "") {
            $odb->insert("tb_berita", "'', '$judul', '$head', '$isi_ber', '$tgl', '$at', '$sukses'");
            $ff->alert("Data berhasil disimpan!");
            $ff->redirect("admin.php?hal=dberita");
        } else {
            $odb->insert("tb_berita", "'', '$judul', '$head', '$isi_ber', '$tgl', '$at', ''");
            $ff->alert("Data berhasil disimpan tanpa gambar!");
            $ff->redirect("admin.php?hal=dberita");
        }
    }
    if ($aksi == "edit") {
        $id = $ff->get("id_berita");
        $tgl = date("Y-m-d");
        $post = $odb->sant(INPUT_POST);
        extract($post);
        $head = substr($isi_ber, 0, 10);
        $odb->update("tb_berita", "judul = '$judul', head = '$head', isi_ber = '$isi_ber', tanggal = '$tgl', at = '$at' where id_berita = '$id'");
        $ff->alert("Data berhasil diubah tanpa gambar!");
        $ff->redirect("admin.php?hal=dberita");
    }
    if ($aksi == "ganti") {
        $id = $ff->get("id_berita");
        $post = $odb->sant(INPUT_POST);
        extract($post);
        $sukses = $ff->upload("foto");
        $tgl = date("Y-m-d");
        if ($sukses !== "") {
            $odb->update("tb_berita", "foto = '$sukses' where id_berita='$id'");
            $ff->alert("Berhasil mengubah gambar!");
            $ff->redirect("admin.php?hal=dberita");
        } else {
            $ff->alert("Gagal mengubah gambar!");
            $ff->back();
        }
    }
    if ($aksi == "hapus") {
        $id = $ff->get("id_berita");
        $odb->delete("tb_berita where id_berita = '$id'");
        $ff->alert("data berhasil dihapus!");
        $ff->redirect("admin.php?hal=dberita");
    }
?>