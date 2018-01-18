<!DOCTYPE html>
<html>
<head>
    <title>Page Login</title>
    <link rel="stylesheet" type="text/css" href="style/index.css">

</head>
<body>
    <div class="loginBox">
        <img src="images/index.png" class="user">

        <h2>Log In Here</h2>
            <form action="" method="post">
                <p>Username</p>
                <input type="text" name="user" placeholder="Youre Username">

                <p>Password</p>
                <input type="password" name="pass" placeholder="Youre Password">

                <input type="submit" name="btnsimpan" value="Sign In">
                
                <?php 
                    include "lib/class-Db.php";
                    include "lib/class-Ff.php";

                    if (isset($_POST['btnsimpan']))
                    {
                        $pass = 'pass';
                        $user = 'user';

                        $ff->post("$user");
                        $ff->post("$pass");

                        $post = $odb->sant(INPUT_POST);
                        extract($post);
                        $q = $odb->select("tb_admin where user='$user' and pass='$pass'");

                        $a = $odb->nur($q);

                        if ($a == 1)
                        {
                            session_start();
                            $_SESSION['user']=$user;
                            $ff->alert("Selamat datang $user");
                            $ff->redirect("pages/admin.php");
                        }
                        else
                        {
                           $ff->alert("Masukkan Username dan Password yang benar!");
                        }
                    }
                    
                ?>
            </form>
        </div>
    </body>
</html>

