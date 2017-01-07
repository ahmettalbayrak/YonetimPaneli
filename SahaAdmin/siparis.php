<?php

include './x.php';
session_start();
if (!isset($_SESSION['id']))
{
    header("Location: login.html");
}
?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
    <title> Siparişler </title>
    <?= setScripts();?>
</head>
<body>
    
    <?php    
        setNavBar();
    ?>
<div style="padding: 30px" align="center">
    <table style="margin:10px" border="1" class="table table-bordered table-striped table-hover" width="100%" id="table">
            <thead>
            <th>ID</th>
            <th>TARİH</th>
            <th>MUSTERİ</th>
            <th>PERSONEL</th>
            <th>TOPLAM FİYAT</th>
            </thead>
            <tbody>
                <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Siparis Ekle</button>
                <?php
                    $c=  getDB();
                    $rs = $c->query("call sp_getSiparisler()");
                    while ($r=$rs->fetch_assoc())
                    {
                        $id=$r['id'];
                        $tarih=$r['tarih'];
                        $musteri=$r['mus_ad'];
                        $user=$r['per_ad'];
                        $toplam=$r['toplam_fiyat'];
                        echo '<tr>';
                        echo '<td class="text-center" width="80px">'.$id.'</td>';
                        echo '<td class="text-center" >'.$tarih.'</td>';
                        echo '<td class="text-center" >'.$musteri.'</td>';
                        echo '<td class="text-center" >'.$user.'</td>';
                        echo '<td class="text-center" >'.$toplam.' ₺</td>';
                        echo '<td class="text-center" width="100px">';
                            echo '<a title="Personel Güncelle" class="btn btn-success" href="siparis_guncelle.php?id='.$id.'"> <i class="fa fa-edit fa-lg"></i></a> ';
                            echo '<a titşe="Personeli Sil" class="btn btn-danger" href="op.php?do=siparis_sil&id='.$id.'"> <i class="fa fa-trash fa-lg"></i></a>';
                        echo '</td>';
                        echo '</tr>';
                    }
                ?>
            </tbody>
        </table>
</div>
        
        <script>
            $(document).ready(function() {
                $('#table').DataTable();
            } );
        </script>    
</body>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
        <form action="op.php?do=siparis_ekle" method="post" >
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Yeni Sipariş Ekle</h4>
      </div>
      <div class="modal-body">
          <b>Tarih : </b>
          <input required type="text" class="form-control input input-lg" name="tarih" placeholder="Tarihi Giriniz" />
          <br>          
          <b>Müşteri Seçiniz : </b>
          <select required name="mus" class="form-control input input-lg">
          <?php
            $c=  getDB();
                    $rs = $c->query("call sp_getMusteriler()");
                    
                    while ($r=$rs->fetch_assoc())
                    {            
                        echo '<option value="'.$r['id'].'">'.$r['ad'].'</option>';
                    }
          ?>              
          </select>
          <br>          
          <b>Personel Seçiniz : </b>
          <select required name="per" class="form-control input input-lg">
          <?php
            $c=  getDB();
                    $rs = $c->query("call sp_getPersoneller()");
                    
                    while ($r=$rs->fetch_assoc())
                    {            
                        echo '<option value="'.$r['id'].'">'.$r['ad'].'</option>';
                    }
          ?>              
          </select>
          <br>          
          <b>Toplam Fiyat : </b>
          <input required type="text" class="form-control input input-lg" name="toplam" placeholder="Toplam Fiyatı Giriniz" />
          <br>
          
      </div>
      <div class="modal-footer">
          <button type="submit" class="btn btn-primary" >Sipariş Ekle</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">İptal</button>
      </div>
        </form>
    </div>

  </div>
</div>