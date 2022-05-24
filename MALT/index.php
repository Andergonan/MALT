<!DOCTYPE html>
<?php include_once("_head.php") ?>
<body>
<?php
    require('db_conn.php');
    // insert values into the database.
    if (isset($_REQUEST['nickname'])) {
        // removes backslashes
        $nickname = stripslashes($_REQUEST['nickname']);
        // escapes special characters in a string
        $nickname = mysqli_real_escape_string($conn, $nickname);
        
        $firstname = stripslashes($_REQUEST['firstname']);
        $firstname = mysqli_real_escape_string($conn, $firstname );
        
        $surename = stripslashes($_REQUEST['surename']);
        $surename = mysqli_real_escape_string($conn, $surename );

        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($conn, $password);
        
        $create_datetime = date("Y-m-d H:i:s");
        
        $query    = "INSERT into `users` (firstname, surename, nickname, password, create_datetime)
                     VALUES ('$firstname', '$surename', '$nickname', '" . sha1($password) . "', '$create_datetime')";
        $result   = mysqli_query($conn, $query);
        if ($result) {
            echo "<div class='form-container'>
                    <div class='form-title'>
                        <h3>Vaše registrace proběhla úspešně! 😎</h3><br/>
                    </div>
                    <p class='form-link'>Klikněte zde pro <br> <a href='login.php'>přihlášení</a>.</p>
                </div>";
        } else {
            echo "<div class='form-container'>
                    <div class='form-title'>
                        <h3>Upsík... něco se pokazilo. ☠️</h3><br/>
                    </div>
                    <p class='form-link'>Klikněte zde pro <br> <a href='index.php'>registrace</a>.</p>
                </div>";
        }
    } else {
?>  
    <form class="form-container" action="" method="post">
        <div class="form-title">
            <h2>Registrace</h2>
        </div>
        <input type="text" name="firstname" placeholder="Jméno" required />
        <input type="text" name="surename" placeholder="Příjmení">
        <input type="text" name="nickname" placeholder="Přezdívka">
        <input type="password" name="password" placeholder="Heslo">
        <br><input type="submit" name="submit" value="Registrovat" class="login-button">
        <p class="form-link"><a href="login.php">Máte již účet?</a></p>
    </form>
<?php
    }
?>
</body>
</html>