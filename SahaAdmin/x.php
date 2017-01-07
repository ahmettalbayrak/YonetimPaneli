<?php

function getDB() 
{
    $conn= new mysqli('localhost', 'root', '', 'saha');
    return $conn;    
}

function setScripts()
{
    echo '<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <script src="https://use.fontawesome.com/453594f85a.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs/dt-1.10.12/cr-1.3.2/r-2.1.0/sc-1.4.2/se-1.2.0/datatables.min.css"/>
 
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs/dt-1.10.12/cr-1.3.2/r-2.1.0/sc-1.4.2/se-1.2.0/datatables.min.js"></script>'
    ;
}

function setNavBar() 
{
    echo '<nav class="navbar navbar-default">
        <div class="container-fluid">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Saha</a>
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">              
              <li><a href="personel.php"><i class="fa fa-users" aria-hidden="true"></i> Personel İşlemleri</a></li>    
              <li><a href="musteri.php"><i class="fa fa-users" aria-hidden="true"></i> Müşteri İşlemleri</a></li>  
              <li><a href="rota.php"><i class="fa fa-street-view" aria-hidden="true"></i> Rota İşlemleri</a></li>  
              <li><a href="urun.php"><i class="fa fa-cubes" aria-hidden="true"></i> Ürün İşlemleri</a></li>  
              <li><a href="siparis.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Siparişler</a></li>  
            </ul>
            <ul class="nav navbar-nav navbar-right">
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user" aria-hidden="true"></i> '.$_SESSION['ad'].'<span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="sifredegistir.php"><i class="fa fa-unlock" aria-hidden="true"></i> Şifre Değiştir</a></li>
                  <li role="separator" class="divider"></li>
                  <li><a href="cikis.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Çıkış Yap</a></li>
                </ul>
              </li>
            </ul>
          </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
      </nav>';
}
?>

