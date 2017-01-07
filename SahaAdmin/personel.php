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
    <title> Personeller </title>
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
            <th>UN</th>
            <th>PW</th>
            <th>AD</th>
            <th>Tür</th>
            <th>İŞLEM</th>
            </thead>
            <tbody>
                <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Personel Ekle</button>
                <?php
                    $c=  getDB();
                    $rs = $c->query("call sp_getPersoneller()");
                    while ($r=$rs->fetch_assoc())
                    {
                        $id=$r['id'];
                        $ad=$r['ad'];
                        $un=$r['un'];
                        $pw=$r['pw'];
                        $tur=$r['tur'];
                        echo '<tr>';
                        echo '<td class="text-center" width="80px">'.$id.'</td>';
                        echo '<td class="text-center" >'.$un.'</td>';
                        echo '<td class="text-center" >'.$pw.'</td>';
                        echo '<td class="text-center" >'.$ad.'</td>';
                        echo '<td class="text-center" >'.$tur.'</td>';
                        echo '<td class="text-center" width="100px">';
                            echo '<a title="Personel Güncelle" class="open-AddPerDialog btn btn-success" data-toggle="modal" data-id="'.$id.'" data-ad="'.$ad.'"  data-un="'.$un.'" data-pw="'.$pw.'" data-tur="'.$tur.'" href="#personelGuncelle"> <i class="fa fa-edit fa-lg"></i></a> ';
                            echo '<a titşe="Personeli Sil" class="btn btn-danger" href="op.php?do=personel_sil&id='.$id.'"> <i class="fa fa-trash fa-lg"></i></a>';
                        echo '</td>';
                        echo '</tr>';
                    }
                ?>
            </tbody>
        </table>
</div>
        
        <script>
        $(document).on("click", ".open-AddPerDialog", function () {
             var gelenId = $(this).data('id');
             $(".modal-body #perId").val( gelenId );
             var gelenAd = $(this).data('ad');
             $(".modal-body #perAd").val( gelenAd );
             var gelenUn = $(this).data('un');
             $(".modal-body #perUn").val( gelenUn );
             var gelenPw = $(this).data('pw');
             $(".modal-body #perPw").val( gelenPw );     
             var gelenTur = $(this).data('tur');
             $(".modal-body #perTur").val( gelenTur );   
        });
        </script>
		
        <script>
            $(document).ready(function() {
                $('#table').DataTable();
            } );
        </script>    
</body>
</html>

<!-- Modal -->
<div id="personelGuncelle" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
        <form action="op.php?do=personel_guncelle" method="post" >
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Personel Güncelle</h4>
      </div>
      <div class="modal-body">
          <input required type="hidden" class="form-control input input-lg" name="id" id="perId" />                       
          <br>
          <b>Kullanıcı Adı : </b>
          <input required type="text" class="form-control input input-lg" name="un" id="perUn" />
          <br>
          
          <b>Parola : </b>
          <input required type="text" class="form-control input input-lg" name="pw" id="perPw" />
          <br>
          
          <b>Personel Adı : </b>
          <input required type="text" class="form-control input input-lg" name="ad" id="perAd" />
          <br>
          
          <b>Personel Türü : </b>
          <select required name="tur" class="form-control input input-lg">
              <option value="0">Yönetici</option>
              <option value="1">Saha Personel</option>
          </select>
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
        <form action="op.php?do=personel_ekle" method="post" >
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Yeni Personel Ekle</h4>
      </div>
      <div class="modal-body">
          <b>Kullanıcı Adı : </b>
          <input required type="text" class="form-control input input-lg" name="un" placeholder="Kullanıcı Adını Girin" />
          <br>
          
          <b>Parola : </b>
          <input required type="text" class="form-control input input-lg" name="pw" placeholder="Parolayı Girin" />
          <br>
          
          <b>Personel Adı : </b>
          <input required type="text" class="form-control input input-lg" name="ad" placeholder="Personelin Adını ve Soyadını Girin" />
          <br>
          
          <b>Personel Türü : </b>
          <select required name="tur" class="form-control input input-lg">
              <option value="0">Yönetici</option>
              <option value="1">Saha Personel</option>
          </select>
          <br>
      </div>
      <div class="modal-footer">
          <button type="submit" class="btn btn-primary" >Personel Ekle</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">İptal</button>
      </div>
        </form>
    </div>

  </div>
</div>