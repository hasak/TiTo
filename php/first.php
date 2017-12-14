<?php
/**
 * Created by PhpStorm.
 * User: Hasak
 * Date: 14.12.2017.
 * Time: 08:17
 */
session_start();
include("db.php");
date_default_timezone_set("Europe/Sarajevo");
mysqli_set_charset($c,"utf8mb4");

if(isset($_GET['lout']) and $_GET['lout']=='true')
    session_destroy();

if(!isset($_SESSION['uid']) and $_SERVER['PHP_SELF']!='/login.php')
    header("location:/login");
if(isset($_SESSION['uid']) and $_SERVER['PHP_SELF']=='/login.php')
    header("location:/");
if(isset($_SESSION['uid'])){
    $uid=$_SESSION['uid'];
    $usr=$_SESSION['user'];
    $ad=$_SESSION['admin'];
}

function brudan($a){
    if($a==1)
        return "Ponedjeljak";
    if($a==2)
        return "Utorak";
    if($a==3)
        return "Srijeda";
    if($a==4)
        return "Četvrtak";
    if($a==5)
        return "Petak";
    if($a==6)
        return "Subota";
    if($a==7)
        return "Nedjelja";
    return "Greška u danu";
}