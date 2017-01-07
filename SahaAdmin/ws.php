<?php

include './x.php';
$op = $_GET['op'];
$c = getDB();

if ($op == "login")
{
    $un = $_GET['un'];
    $pw = $_GET['pw'];
    
    $c =  getDB();
    $r = $c->query("call kullaniciGiris('$un','$pw')")->fetch_assoc();
    
    header("Content-Type: application/json");
    $arr = array('res' => $r['cnt'],'id' => $r['id'],'ad' => $r['ad']);
    echo json_encode($arr, JSON_PRETTY_PRINT | JSON_NUMERIC_CHECK);
}

if($op=="get_urunler")
{
    $c=  getDB();
    
    $rs= $c->query("call sp_getUrunler()");
    $arr=array();
    while ($r = $rs->fetch_assoc())
    {
        $arr[]=$r;
    }
    header("Content-Type: application/json");
    echo json_encode($arr, JSON_PRETTY_PRINT | JSON_NUMERIC_CHECK);
}


if ($op == "get_personeller")
{
    $c = getDB();
    
    $rs = $c->query("call sp_getPersoneller()");
    $arr = array();
    while ($r = $rs->fetch_assoc())
    {
        $arr[]=$r;
    }
    header("Content-Type: application/json");
    echo json_encode($arr, JSON_PRETTY_PRINT | JSON_NUMERIC_CHECK);
}

if($op=="get_urunler")
{
    $c=  getDB();
    
    $rs= $c->query("call sp_getUrunler()");
    $arr=array();
    while ($r = $rs->fetch_assoc())
    {
        $arr[]=$r;
    }
    header("Content-Type: application/json");
    echo json_encode($arr, JSON_PRETTY_PRINT | JSON_NUMERIC_CHECK);
}

if($op=="get_siparisler")
{
    $c=  getDB();
    
    $rs= $c->query("call sp_getSiparisler()");
    $arr=array();
    while ($r = $rs->fetch_assoc())
    {
        $arr[]=$r;
    }
    header("Content-Type: application/json");
    echo json_encode($arr, JSON_PRETTY_PRINT | JSON_NUMERIC_CHECK);
}

if ($op == "rota_guncelle")
{
    $id= $_POST['id'];
    $per_id = $_POST['per'];
    $mus_id = $_POST['mus'];
    $tarih = $_POST['tarih'];
    
    $c = getDB();
    
    $c->query("call sp_upRota('$id', '$per_id', '$mus_id', '$tarih')");
    header("Location: rota.php");
    
}

if($op == "personel_guncelle")
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

if ($op == "musteri_guncelle")
{
    $id = $_POST['id'];
    $ad = $_POST['ad'];
    $enlem = $_POST['enlem'];
    $boylam = $_POST['boylam'];
    
    
    $c = getDB();
    
    $c->query("call sp_upMusteri('$id','$ad','$enlem','$boylam')");
    header("Location: musteri.php");
    
}

if ($op == "siparis_ekle")
{
    $tarih = $_POST['tarih'];
    $mus_id = $_POST['mus'];
    $per_id = $_POST['per'];
    $toplam = $_POST['toplam'];
    
    
    $c = getDB();
    
    $c->query("call sp_siparisEkle('$tarih', '$mus_id', '$per_id', '$toplam')");
    header("Location: siparis.php");
    
}

if ($op == "personel_ekle")
{
    $un = $_POST['un'];
    $pw = $_POST['pw'];
    $ad = $_POST['ad'];
    $tur= $_POST['tur'];
    
    $c = getDB();
    
    $c->query("call sp_personelEkle('$un', '$pw', '$ad', $tur)");
    header("Location: personel.php");
    
}

if ($op == "rota_ekle")
{
    $per_id = $_POST['per'];
    $mus_id = $_POST['mus'];
    $tarih = $_POST['tarih'];
    
    $c = getDB();
    
    $c->query("call sp_rotaEkle('$per_id', '$mus_id', '$tarih')");
    header("Location: rota.php");
    
}

if ($op == "musteri_ekle")
{
    $ad = $_POST['ad'];
    $enlem = $_POST['enlem'];
    $boylam = $_POST['boylam'];
    
    $c = getDB();
    
    $c->query("call sp_musteriEkle('$ad','$enlem','$boylam')");
    header("Location: musteri.php");
    
}

if($op=="urun_ekle")
{
    $ad=$_POST['ad'];
    $fiyat=$_POST['fiyat'];
    $resim=$_POST['resim'];
    $c=  getDB();
    $c ->query("call sp_urunEkle('$ad','$fiyat','$resim')");
    header("Location: urun.php");
}

if($op=="urun_sil")
{
    $id=$_GET['id'];
    $c=  getDB();
    $c ->query("call sp_delUrun('$id')");
    header("Location: urun.php");
}

if($op=="personel_sil")
{
    $id=$_GET['id'];
    $c=  getDB();
    $c ->query("call sp_delPersonel('$id')");
    header("Location: personel.php");
}

if($op=="musteri_sil")
{
    $id=$_GET['id'];
    $c=  getDB();
    $c ->query("call sp_delMusteri('$id')");
    header("Location: musteri.php");
}

if($op=="siparis_sil")
{
    $id=$_GET['id'];
    $c=  getDB();
    $c ->query("call sp_delSiparis('$id')");
    header("Location: siparis.php");
}

if($op=="rota_sil")
{
    $id=$_GET['id'];
    $c=  getDB();
    $c ->query("call sp_delRota('$id')");
    header("Location: rota.php");
}
?>
