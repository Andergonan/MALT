<!DOCTYPE html>
<?php include_once("_head.php") ?>
<body>
<?php
    require('db_conn.php');
    session_start();
    // create user session.
    if (isset($_POST['nickname'])) {
        $nickname = stripslashes($_REQUEST['nickname']);
        $nickname = mysqli_real_escape_string($conn, $nickname);
        
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($conn, $password);
        
        // check user is exist in the database
        $query    = "SELECT * FROM `users` WHERE nickname='$nickname'
                     AND password='" . sha1($password) . "'";
        $result = mysqli_query($conn, $query) or die(mysql_error());
        $rows = mysqli_num_rows($result);
        if ($rows == 1) {
            $_SESSION['nickname'] = $nickname;
            // redirect to user dashboard page
            header("Location: dashboard.php");
        } else {
            echo "<div class='form-container'>
                    <div class='form-title'>
                        <h3>Účet s touto přezdívkou, nebo heslem neexistuje... 🙁</h3><br/>
                    </div>
                    <p class='form-link'>Klikněte zde pro <br> <a href='login.php'>přihlášení</a>.</p>
                </div>";
        }
    } else {
?>
    <form class="form-container" action="" method="post">
        <div class="form-title">
            <h2>Přihlášení</h2>
        </div>
        <input type="text" name="nickname" placeholder="Přezdívka" autofocus="true"/>
        <input type="password" name="password" placeholder="Heslo"/>
        <input type="submit" value="Login" name="submit" class="login-button"/>
        <p class="form-link"><a href="index.php">Nemáte ještě účet?</a></p>
  </form>
<?php
    }
?>
</body>
</html>