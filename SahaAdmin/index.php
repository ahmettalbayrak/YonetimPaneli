<?php
include './x.php';
session_start();
if (!isset($_SESSION['id']))
{
    header("Location: login.html");
}

$c=  getDB();
$r = $c->query("call sayiGetir()")->fetch_assoc();
$personelS= $r['kul_say'];
$musteriS= $r['mus_say'];
$urunS= $r['urun_say'];
$rotaS= $r['rota_say'];
?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
    <title>Merhaba  <?=$_SESSION['ad'] ?> </title>
    <?= setScripts();?>
</head>
<body>
    
    <?php    
        setNavBar();
    ?>
    <table border='0' widtg='100%' align='center'>
        <tr>
        <br>
            <td width='25%' align='center'><br><i class="fa fa-users fa-5x" aria-hidden="true"></i><br><?= $personelS?> personel<br></td>    
            <td width='25%' align='center'><br><i class="fa fa-users fa-5x" aria-hidden="true"></i><br><?= $musteriS ?> müşteri<br></td>
        </tr>
        <tr>
            <td width='25%' align='center'><br><i class="fa fa-street-view fa-5x" aria-hidden="true"></i><br><?= $rotaS ?> rota<br></td>  
            <td width='25%' align='center'><br><i class="fa fa-cubes fa-5x" aria-hidden="true"></i><br><?= $urunS ?> ürün<br></td>  
        </tr>
    </table>
    
    
</body>
</html>
