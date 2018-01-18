<?php
    session_start();
    include_once "../lib/class-Db.php";
    include_once "../lib/class-Ff.php";

    if (isset($_SESSION['user'])) {
        $ff->redirect('admin.php');
    }

    $err = "Silahkan klik tombol Login untuk melanjutkan!";

    if (isset($_GET['err'])) {
        switch ($_GET['err']) {
            case 1:
                $err = "Silahkan lengkapi form untuk melanjutkan!";
                break;

            case 2:
                $err = "Kombinasi Username dan Password salah!";
                break;

            default:
                $err = "Silahkan klik tombol Login untuk melanjutkan!";
                break;
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-sclae=1.0">
    <link rel="stylesheet" type="text/css" href="../style/admin.css">
    <script scr="../js/jquery-2.1.1.js"></script>
</head>
<body style="font-family: sans-serif;">
    <div id="container">
        <center>
            <div id="box" style="width: 60%;">
                <div class="box-top">
                    <h3>Login Form</h3>
                </div>
                <div class="box-panel">
                    <p>Masukkan Username dan Password Anda</p>
                    <br>
                    <form method="post" action="login-prosses.php" class="form-container" enctype="multipart/form-data">
                        Username :
                        <input type="text" name="username" required="" class="form-field" value="">
                        <br>
                        Password :
                        <input type="password" name="password" required="" class="form-field" value="">
                        <br>
                        <div id="msg-container">
                            <p><i> <?=$err?> </i></p>
                        </div>
                        <br>
                        <input type="submit" name="submit" class="submit-button" value="Login">
                    </form>
                </div>
            </div>
        </center>
    </div>
    <script type="text/javascript" src="../js/admin.js"></script>
</body>
</html>