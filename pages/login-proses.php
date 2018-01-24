<?php
    session_start();
    include "../lib/class-Db.php";
    include "../lib/class-Ff.php";
    include "login.php";

    if (isset($_POST['submit'])) {

    $post = $odb->sant(INPUT_POST);

    $ff->post('user');
    $ff->post('pass');

    extract($post);

    $q = $odb->select("tb_admin where binary user='$user' and binary pass='$pass'");
    $a = $odb->nur($q);

    if ($a < 1) {
        $ff->redirect("login.php?err=2");
    } else {
        $_SESSION['user'] = $user;
        $ff->alert('Selamat datang' . . $user);
        $ff->redirect('admin.php');
    }
    }
?>