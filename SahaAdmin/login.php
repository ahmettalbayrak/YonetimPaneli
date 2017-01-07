<?php
include './x.php';

$un=$_POST['un'];
$pw=$_POST['pw'];

$c= getDB();
$r = $c->query("call kullaniciGiris('$un','$pw')")->fetch_assoc();

if($r['cnt']==0)
{
    header("Location: login.html");
}
 else 
{
    session_start();
    $_SESSION['id'] = $r['id'];
    $_SESSION['un'] = $r['un'];
    $_SESSION['ad'] = $r['ad'];
    header("Location: index.php");
}
?>
