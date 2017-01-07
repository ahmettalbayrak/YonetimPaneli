<?php
include './x.php';
$do=$_GET['do'];

if ($do == "rota_guncelle")
{
    $id= $_POST['id'];
    $per_id = $_POST['per'];
    $mus_id = $_POST['mus'];
    $tarih = $_POST['tarih'];
    
    $c = getDB();
    
    $c->query("call sp_upRota('$id', '$per_id', '$mus_id', '$tarih')");
    header("Location: rota.php");
    
}

if($do == "personel_guncelle")
{
    $id = $_POST['id'];
    $un = $_POST['un'];
    $pw = $_POST['pw'];
    $ad = $_POST['ad'];
    $tur = $_POST['tur'];
    
    $c = getDB();
    
    $c->query("call sp_upPersonel('$id','$un','$pw','$ad','$tur')");
    header("Location: personel.php");
}

if ($do == "musteri_guncelle")
{
    $id = $_POST['id'];
    $ad = $_POST['ad'];
    $enlem = $_POST['enlem'];
    $boylam = $_POST['boylam'];
    
    
    $c = getDB();
    
    $c->query("call sp_upMusteri('$id','$ad','$enlem','$boylam')");
    header("Location: musteri.php");
    
}

if ($do == "siparis_ekle")
{
    $tarih = $_POST['tarih'];
    $mus_id = $_POST['mus'];
    $per_id = $_POST['per'];
    $toplam = $_POST['toplam'];
    
    
    $c = getDB();
    
    $c->query("call sp_siparisEkle('$tarih', '$mus_id', '$per_id', '$toplam')");
    header("Location: siparis.php");
    
}

if ($do == "personel_ekle")
{
    $un = $_POST['un'];
    $pw = $_POST['pw'];
    $ad = $_POST['ad'];
    $tur= $_POST['tur'];
    
    $c = getDB();
    
    $c->query("call sp_personelEkle('$un', '$pw', '$ad', $tur)");
    header("Location: personel.php");
    
}

if ($do == "rota_ekle")
{
    $per_id = $_POST['per'];
    $mus_id = $_POST['mus'];
    $tarih = $_POST['tarih'];
    
    $c = getDB();
    
    $c->query("call sp_rotaEkle('$per_id', '$mus_id', '$tarih')");
    header("Location: rota.php");
    
}

if ($do == "musteri_ekle")
{
    $ad = $_POST['ad'];
    $enlem = $_POST['enlem'];
    $boylam = $_POST['boylam'];
    
    $c = getDB();
    
    $c->query("call sp_musteriEkle('$ad','$enlem','$boylam')");
    header("Location: musteri.php");
    
}

if($do=="urun_ekle")
{
    $ad=$_POST['ad'];
    $fiyat=$_POST['fiyat'];
    $resim=$_POST['resim'];
    $c=  getDB();
    $c ->query("call sp_urunEkle('$ad','$fiyat','$resim')");
    header("Location: urun.php");
}

if($do=="urun_sil")
{
    $id=$_GET['id'];
    $c=  getDB();
    $c ->query("call sp_delUrun('$id')");
    header("Location: urun.php");
}

if($do=="personel_sil")
{
    $id=$_GET['id'];
    $c=  getDB();
    $c ->query("call sp_delPersonel('$id')");
    header("Location: personel.php");
}

if($do=="musteri_sil")
{
    $id=$_GET['id'];
    $c=  getDB();
    $c ->query("call sp_delMusteri('$id')");
    header("Location: musteri.php");
}

if($do=="siparis_sil")
{
    $id=$_GET['id'];
    $c=  getDB();
    $c ->query("call sp_delSiparis('$id')");
    header("Location: siparis.php");
}

if($do=="rota_sil")
{
    $id=$_GET['id'];
    $c=  getDB();
    $c ->query("call sp_delRota('$id')");
    header("Location: rota.php");
}
?>

