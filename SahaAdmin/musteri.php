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
    <title> Müşteriler </title>
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
            <th>AD</th>
            <th>KONUM</th>
            <th>İŞLEM</th>
            </thead>
            <tbody>
                
                <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#musteriEkle">Müşteri Ekle</button>
                <?php
                    $c=  getDB();
                    $rs = $c->query("call sp_getMusteriler()");
                    while ($r=$rs->fetch_assoc())
                    {
                        $id=$r['id'];
                        $ad=$r['ad'];
                        $enlem=$r['enlem'];
                        $boylam=$r['boylam'];
                        echo '<tr>';
                        echo '<td class="text-center" width="80px">'.$id.'</td>';
                        echo '<td class="text-center" >'.$ad.'</td>';
                        $link='<a href="https://www.google.com/maps/place/'.$enlem.','.$boylam.'" target="_blank" /> Konum';
                        echo '<td class="text-center" >'.$link.'</td>';
                        echo '<td class="text-center" width="100px">';
                            echo '<a title="Personel Güncelle" class="open-AddMusDialog btn btn-success" data-toggle="modal" data-id="'.$id.'" data-ad="'.$ad.'"  data-enlem="'.$enlem.'" data-boylam="'.$boylam.'" href="#musteriGuncelle" > <i class="fa fa-edit fa-lg"></i></a> ';
                            echo '<a title="Personeli Sil" class="btn btn-danger" href="op.php?do=musteri_sil&id='.$id.'"> <i class="fa fa-trash fa-lg"></i></a>';
                        echo '</td>';
                        echo '</tr>';
                    }
                ?>
            </tbody>
        </table>
</div>
        <script>
        $(document).on("click", ".open-AddMusDialog", function () {
             var gelenId = $(this).data('id');
             $(".modal-body #musId").val( gelenId );
             var gelenAd = $(this).data('ad');
             $(".modal-body #musAd").val( gelenAd );
             var gelenEnlem = $(this).data('enlem');
             $(".modal-body #musEnlem").val( gelenEnlem );
             var gelenBoylam = $(this).data('boylam');
             $(".modal-body #musBoylam").val( gelenBoylam );     
        });
        </script>
        <script>
            $(document).ready(function() {
                $('#table').DataTable();
            } );
        </script>    
        


</body>



<!-- Modal -->
        <div id="musteriGuncelle" class="modal fade" role="dialog">
          <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <form action="op.php?do=musteri_guncelle" method="post" >
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Müşteriyi Güncelle</h4>
              </div>
              <div class="modal-body">

                        
                            <input required type="hidden" class="form-control input input-lg" name="id" id="musId" value="" />
                        
                            <br>
                            <input required type="text" class="form-control input input-lg" name="ad" id="musAd" value="" />
                        
                            <br>

                            <b>Enlem : </b>
                            <input required type="text" class="form-control input input-lg" name="enlem" id="musEnlem" />
                            <br>

                            <b>Boylam : </b>
                            <input required type="text" class="form-control input input-lg" name="boylam" id="musBoylam"  />
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
<div id="musteriEkle" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
        <form action="op.php?do=musteri_ekle" method="post" >
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Yeni Müşteri Ekle</h4>
      </div>
      <div class="modal-body">
            
            <b>Müşteri Adı : </b>
            <input required type="text" class="form-control input input-lg" name="ad" placeholder="Müşteri Adını Girin" />
            <br>

            <b>Enlem : </b>
            <input required type="text" class="form-control input input-lg" name="enlem" placeholder="Müşteri Enlemini Girin" />
            <br>

            <b>Boylam : </b>
            <input required type="text" class="form-control input input-lg" name="boylam" placeholder="Müşteri Boylamını Girin" />
            <br>
          
      </div>
      <div class="modal-footer">
          <button type="submit" class="btn btn-primary" >Müşteri Ekle</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">İptal</button>
      </div>
        </form>
    </div>

  </div>
</div>
