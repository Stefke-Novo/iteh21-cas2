<?php
require "../dbBroker.php";
require "../prijava.php";


if($_POST['predmet']&&$_POST['katedra']&&$_POST['sala']&&$_POST['datum'])
{
    $prijava= new Prijava(null,$_POST['predmet'],$_POST['katedra'],$_POST['sala'],$_POST['datum']);
    $status=$prijava->update($conn);
    if($status!=null){
        $isto=false;
        echo "Success";
    }else
    echo "Failed";
}
?>