<?php
    include_once "../lib/class-Db.php";
    include_once "../lib/class-Ff.php";
    $aksi = $ff->get("aksi");
    if ($aksi == "add") {
        $post = $odb->sant(INPUT_POST);
        extract($post);
        $sukses = $ff->upload("foto");
        $status = "1";
        $tanggal = date("Y-m-d");
        if ($sukses != "") {
        $odb->insert("tb_barang", "'', '$nama', '$id_pen', '$id_kat', '$harga', '$stok', '$deskripsi', '$tags', '$status', '$sukses', '$tanggal', 
            '$ukuran1', '$ukuran2', '$ukuran3', '$ukuran4'");
            $ff->alert("Data berhasil disimpan!");
            $ff->redirect("admin.php?hal=dbarang");
        } else {
            $odb->insert("td_barang", "'', '$nama', '$id_pen', '$id_kat', '$harga', '$stok', '$deskripsi', 'tags', '$status', '', '$tanggal', 
                '$ukuran1', '$ukuran2', '$ukuran3', '$ukuran4'");
            $ff->alert("Data berhasil disimpan tanpa gambar!");
            $ff->redirect("admin.php?hal=dbarang");
        }
    }
    if ($aksi == "edit") {
        $id = $ff->get("id_barang");
        $tanggal = date("Y-m-d");
        $status = "1";
        $post = $odb->sant(INPUT_POST);
        extract($post);
        $odb->update("tb_barang", "nama = '$nama', id_pen = '$id_pen', id_kat = '$id_kat', stok = '$stok', harga = '$harga', deskripsi = '$deskripsi', tags = '$tags', status = '$status', tanggal = '$tanggal', ukuran1 = '$ukuran1', ukuran2 = '$ukuran2', ukuran3 = '$ukuran3', ukuran4 = '$ukuran4' where id_barang = '$id'");
        $ff->alert("Data berhasil diubah tanpa gambar!");
        $ff->redirect("admin.php?hal=dbarang");
    }
    if ($aksi == "ganti") {
        $id = $ff->get("id_barang");
        $post = $odb->sant(INPUT_POST);
        extract($post);
        $sukses = $ff->upload("foto");
        $status = "1";
        $tanggal = date("Y-m-d");
        if ($sukses !== "") {
            $odb->update("tb_barang", "foto = '$sukses' where id_barang='$id'");
            $ff->alert("Data berhasil diubah gambar!");
            $ff->redirect("admin.php?hal=dbarang");
        } else {
            $ff->alert("Gagal mengubah gambar!");
            $ff->back();
        }
    }
    if ($aksi == "hapus") {
        $id = $ff->get("id_barang");
        $odb->delete("tb_barang where id_barang = '$id'");
        $ff->alert("data berhasil dihapus!");
        $ff->redirect("admin.php?hal=dbarang");
    }
?>