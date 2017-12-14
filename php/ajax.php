<?php
/**
 * Created by PhpStorm.
 * User: Hasak
 * Date: 14.12.2017.
 * Time: 18:13
 */
session_start();
include("db.php");
date_default_timezone_set("Europe/Sarajevo");
mysqli_set_charset($c,"utf-8");
$a = $_REQUEST['a'];

if ($a=="logg" and isset($_POST['userrr'])) {
    $usr = $_POST['userrr'];
    $pw = md5($_POST['passs']);
    $q = mysqli_query($c, "SELECT * FROM users WHERE username='" . $usr . "'");
    if (!mysqli_num_rows($q))
        echo 0;
    else {
        $b = mysqli_fetch_array($q);
        if ($pw == $b['password']) {
            $_SESSION['user'] = $b['username'];
            $_SESSION['uid'] = $b['ID'];
            $_SESSION['admin']= $b['admin'];
            echo 1;
        } else echo 3;

    }
}

else if($a=="tassk" and $_SESSION['admin']){
    $i=0;
    $sed=date("W")+1;
    while(isset($_REQUEST["s".$i])){
        $qt="insert into tasks (ko, kad, sedmica, sta, koliko, zadao, uradio, umor, pace) 
VALUES('".$_REQUEST["k".$i]."','".$_REQUEST["t".$i]."','".$sed."','".$_REQUEST["s".$i]."','".$_REQUEST["m".$i]."','".$_SESSION['uid']."','0','','');";
        //echo $_REQUEST["s".$i]." ".$_REQUEST["t".$i]." ".$_REQUEST["k".$i]." ".$_REQUEST["m".$i]."\n";
        if(!mysqli_query($c,$qt)){
            echo mysqli_error($c);
        }
        $i++;
    }
    echo 'Uspješno zadano!';
}

else if($a=="uspi" and $_SESSION['admin']){
    $pace=$_REQUEST['pace'];
    $umor=$_REQUEST['umor'];
    $qf="update tasks set uradio=1,umor='".$umor."',pace='".$pace."' where ko='".$_SESSION['uid']."' and kad='".date("N")."' and sedmica='".date("W")."' limit 1";
    if(!mysqli_query($c,$qf))
        echo mysqli_error($c);
    else echo 'Uspješno zadano!';
}