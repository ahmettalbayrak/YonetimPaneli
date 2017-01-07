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
    <title> Rotalar </title>
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
            <th>USER</th>
            <th>MUSTERİ</th>
            <th>GİDİLECEK TARİH</th>
            <th>İŞLEM</th>
        </thead>
            <tbody>
                <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Rota Ekle</button>
                <?php
                    $c=  getDB();
                    $rs = $c->query("call sp_getRotalar()");
                    
                    while ($r=$rs->fetch_assoc())
                    {
                        $id=$r['id'];
                        $user=$r['per_ad'];
                        $musteri=$r['mus_ad'];
                        $tarih=$r['gidilecek_tarih'];
                        echo '<tr>';
                        echo '<td class="text-center" width="80px">'.$id.'</td>';
                        echo '<td class="text-center" >'.$user.'</td>';
                        echo '<td class="text-center" >'.$musteri.'</td>';
                        echo '<td class="text-center" >'.$tarih.'</td>';
                        echo '<td class="text-center" width="100px">';
                            echo '<a title="Personel Güncelle" class="open-AddRotaDialog btn btn-success" data-toggle="modal"'
                        . ' data-id="'.$id.'" data-user="'.$user.'"  data-musteri="'.$musteri.'" data-tarih="'.$tarih.'" href="#rotaGuncelle" > <i class="fa fa-edit fa-lg"></i></a> ';
                            echo '<a titşe="Personeli Sil" class="btn btn-danger" href="op.php?do=rota_sil&id='.$id.'"> <i class="fa fa-trash fa-lg"></i></a>';
                        echo '</td>';
                        echo '</tr>';
                    }
                ?>
            </tbody>
        </table>
</div>
        
        <script>
        $(document).on("click", ".open-AddRotaDialog", function () {
             var gelenId = $(this).data('id');
             $(".modal-body #rotaId").val( gelenId );
             var gelenUser = $(this).data('user');
             $(".modal-body #rotaUser").val( gelenUser );
             var gelenMus = $(this).data('musteri');
             $(".modal-body #rotaMus").val( gelenMus );
             var gelenTar = $(this).data('tarih');
             $(".modal-body #rotaTar").val( gelenTar );     
             
        });
        </script>
        <script>
            $(document).ready(function() {
                $('#table').DataTable();
            } );
        </script>    
</body>


<!-- Modal -->
<div id="rotaGuncelle" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
        <form action="op.php?do=rota_guncelle" method="post" >
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Rota Güncelle</h4>
      </div>
      <div class="modal-body">
          <b>Kullanıcı Seçiniz : </b>
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
          
          <b>Tarih : </b>
          <input required type="text" class="form-control input input-lg" name="tarih" id="rotaTar" />
          <br>
          
          
      </div>
      <div class="modal-footer">
          <button type="submit" class="btn btn-primary" >Güncelle</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">İptal</button>
      </div>
        </form>
    </div>

  </div>
</div>







<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
        <form action="op.php?do=rota_ekle" method="post" >
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Yeni Rota Ekle</h4>
      </div>
      <div class="modal-body">
          <b>Kullanıcı Seçiniz : </b>
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
          
          <b>Tarih : </b>
          <input required type="text" class="form-control input input-lg" name="tarih" placeholder="Tarihi Giriniz" />
          <br>
          
          
      </div>
      <div class="modal-footer">
          <button type="submit" class="btn btn-primary" >Rota Ekle</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">İptal</button>
      </div>
        </form>
    </div>

  </div>
</div>