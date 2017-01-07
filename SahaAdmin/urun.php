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
    <title> Urunler </title>
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
            <th>FİYAT</th>
            <th>RESİM</th>
            <th>İŞLEM</th>
            </thead>
            <tbody>
                
                <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Ürün Ekle</button>            
                
                
                <?php
                    $c=  getDB();
                    $rs = $c->query("call sp_getUrunler()");
                    while ($r=$rs->fetch_assoc())
                    {
                        $id=$r['id'];
                        $ad=$r['ad'];
                        $fiyat=$r['fiyat'];
                        $resim=$r['resim'];
                        echo '<tr>';
                        echo '<td class="text-center" width="80px">'.$id.'</td>';
                        echo '<td >'.$ad.'</td>';
                        echo '<td class="text-center" width="80px">'.$fiyat.' ₺</td>';
                        echo '<td class="text-center" width="140px"> ';     
                            echo '<a href='.$resim.' target="_blank" /> <img src='.$resim.' width="100px"/> ';
                        echo '</td>';
                        echo '<td class="text-center" width="100px">';
                            echo '<a title="Ürünü Güncelle" class="btn btn-success" href="urun_guncelle.php?id='.$id.'"> <i class="fa fa-edit fa-lg"></i></a> ';
                            echo '<a titşe="Ürünü Sil" class="btn btn-danger" href="op.php?do=urun_sil&id='.$id.'"> <i class="fa fa-trash fa-lg"></i></a>';
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
</html>

!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
        <form action="op.php?do=urun_ekle" method="post" >
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			<h4 class="modal-title">Yeni Ürün Ekle</h4>
		  </div>
		  <div class="modal-body">
			  <b>Ürün Adı : </b>
			  <input required type="text" class="form-control input input-lg" name="ad" placeholder="Ürün Adını Girin" />
			  <br>
			  
			  <b>Fiyat : </b>
			  <input required type="text" class="form-control input input-lg" name="fiyat" placeholder="Ürün Fiyatını Girin" />
			  <br>
			  
			  <b>Fotoğraf : </b>
			  <input required type="text" class="form-control input input-lg" name="resim" placeholder="Fotoğraf Linkini Girin" />
			  <br>
			  
		  </div>
		  <div class="modal-footer">
			  <button type="submit" class="btn btn-primary" >Ürün Ekle</button>
			<button type="button" class="btn btn-default" data-dismiss="modal">İptal</button>
		  </div>
        </form>
    </div>

  </div>
</div>