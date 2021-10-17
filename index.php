
<?php
require "model/user.php";
require "dbBroker.php";
session_start();
if(isset($_POST["username"])and isset($_POST["password"])){
    $uname=$_POST["username"];
    $upass=$_POST["password"];
    echo $uname;
    echo "<br>";
    echo $upass;
    echo "<br>";
    $korisnik = new User(1,$uname,$upass);
    echo $korisnik->username;
    echo "<br>"; 
    echo $korisnik->password;
    echo "<br>";
    //$odg=$korisnik->logInUser($uname,$upass,mysqli); - obična funkcija
    $odg=User::logInUser($korisnik,$conn);
    echo $odg->num_rows;
    if($odg->num_rows==1){
        echo '<script>console.log("Uspešno ste se prijavili")</script>';
        $_SESSION['user_id']=$korisnik->id;
        header('Location: home.php');
        exit();
    }else{
        echo '<script>console.log("Niste se uspešno prijavili")</script>';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>FON: Zakazivanje kolokvijuma</title>

</head>
<body>
    <div class="login-form">
        <div class="main-div">
            <form method="POST" action="#">
                <div class="container">
                    <label class="username">Korisnicko ime</label>
                    <input type="text" name="username" class="form-control"  required>
                    <br>
                    <label for="password">Lozinka</label>
                    <input type="password" name="password" class="form-control" required>
                    <button type="submit" class="btn btn-primary" name="submit">Prijavi se</button>
                </div>

            </form>
        </div>

        
    </div>
</body>
</html>