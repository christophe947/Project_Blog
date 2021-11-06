<!doctype html>
<html lang="fr">
    <head>
    <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <base href="<?= $racineWeb ?>" >
    
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="fontawesome-free-5.15.1-web/css/all.min.css">
        <link rel="stylesheet" href="MDB-Free_4.19.2/css/bootstrap.min.css">
        <!--<link rel="stylesheet" href="MDB-Free_4.19.2/css/.min.css">-->
        <!----><link rel="stylesheet" href="MDB-Free_4.19.2/css/mdb.lite.min.css"><!---->
        <!--<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">-->
        <link rel="stylesheet" type="text/css" href="css/style.css" />
        <title><?= $title ?></title>
    </head>

    <body>
    <!--<div id="block">-->
        <header>
            <nav class="navbar navbar-expand-lg navbar-light lead fixed-top"> 
        
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" 	aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <ul class="navbar-nav mr-auto " style="margin: auto;">
                        <li class="nav-item">
                            <a class="nav-link text-white" id="acceuilMenu" href="home/index/">Accueil <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" id="articleMenu" href="home/article/">Articles <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item dropdown">

                        <?php
                        if(empty($_SESSION['auth']) ){ ?>
                          <a class="nav-link text-white dropdown-toggle" id="monEspaceMenu" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >Mon Espace <span class="sr-only">(current)</span></a>
                          <div class="dropdown-menu bg-light " aria-labelledby="navbarDropdown">
                                <a class="dropdown-item <?= !empty($_SESSION['auth']) ? 'disabled' : '' ?>" href="home/register/">Inscription</a>
                                <a class="dropdown-item <?= !empty($_SESSION['auth']) ? 'disabled' : '' ?>" href="home/connect/">Connexion</a>
                                   
                            </div>
                          
                          <?php
                        
                        
                        
                        } else if ($_SESSION['auth']['role'] == 20 ) { ?>
                          <a class="nav-link text-white" id="monEspaceMenuBis" href="  home/personnalSpace/ " >Mon Espace <span class="sr-only">(current)</span></a> <?php
                        }  else if ($_SESSION['auth']['role'] == 30) { ?> <a class="nav-link text-white dropdown-toggle" id="op" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >Administrateur <span class="sr-only">(current)</span></a> 
                        
                          <div class="dropdown-menu bg-light " aria-labelledby="navbarDropdown"  id="op">
                                  <a class="dropdown-item " href="admin/redactArticle/">Rediger un article</a>
                                  <a class="dropdown-item " href="admin/personnalSpaceAdmin/">Espace Administrateur</a>
    
                              </div>
                              <?php } ?>
 
                            
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" id="contactMenu" href="home/contact/">Contact <span class="sr-only">(current)</span></a>
                        </li>
                    </ul>

                </div>
            </nav>
        </header>

    
        <div id="carouselExampleFade" class="carousel slide carousel-fade <?php if (empty($_SESSION['auth'] )) { ?> carouselHeightHome <?php } else if(!empty($_SESSION['auth'])) { if($_SESSION['auth']['role'] == 20) { ?> carouselHeightHome <?php } else if ($_SESSION['auth']['role'] == 30) { ?> carouselHeightAdmin <?php } } ?> " data-ride="carousel" data-pause="false">
            <div class="carousel-inner">
               <div class="carousel-item active">
                    <img class="d-block w-100" src="https://wallsdesk.com/wp-content/uploads/2016/11/Cinque-Terre-Computer-Backgrounds.jpg" alt="First slide">
                </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="https://www.wallpapers13.com/wp-content/uploads/2018/10/Village-of-Manarola-in-National-Park-of-Cinque-Terre-Italy-Desktop-Wallpaper-HD-for-mobile-phones-and-laptops-3840x2400-915x515.jpg" alt="Second slide">
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
      </div>

      
      
        <?= $content ?>
        
       


    <footer class="page-footer font-small pt-4">

        <!-- Footer Links -->
        <div class="container-fluid text-center text-md-left">

    <!-- Grid row -->
    <div class="row">

      <!-- Grid column -->
      <div class="col-md-6 mt-md-0 mt-3">

        <!-- Content -->
        <h5 class="text-uppercase">Acces rapide</h5>
        <p>Profiter des raccourcis d'acces rapide.</p>

      </div>
      <!-- Grid column -->

      <hr class="clearfix w-100 d-md-none pb-3">

      <!-- Grid column -->
      <div class="col-md-3 mb-md-0 mb-3">

        <!-- Links -->
        <h5 class="text-uppercase">Menu</h5>

        <ul class="list-unstyled">
          <li>
            <a href="home/index/">- Accueil</a>
          </li>
          <li>
            <a href="home/article/">- Article</a>
          </li>
          <li>
            <a href="home/connect/">- Mon Espace</a>
          </li>
          <li>
            <a href="home/contact/">- Contact</a>
          </li>
        </ul>

      </div>
      <!-- Grid column -->

      <!-- Grid column -->
      <div class="col-md-3 mb-md-0 mb-3">

        <!-- Links -->
        <h5 class="text-uppercase">Liens</h5>

        <ul class="list-unstyled">
          <li>
            <a href="#!">Link 1</a>
          </li>
          <li>
            <a href="#!">Link 2</a>
          </li>
          <li>
            <a href="#!">Link 3</a>
          </li>
          <li>
            <a href="#!">Link 4</a>
          </li>
        </ul>

      </div>
      <!-- Grid column -->

    </div>
    <!-- Grid row -->

  </div>
  <!-- Footer Links -->

  <!-- Copyright 
  <div class="footer-copyright text-center py-3">© 2020 Copyright:
    <a href="https://mdbootstrap.com/"> MDBootstrap.com</a>
  </div>
   Copyright -->

</footer>


    <script> 
        var sessionAuth = "<?php
            if(!empty($_SESSION['auth'])) {
                echo $_SESSION['auth'];
            } else {
                //$_SESSION['pseudo'] = '';
                echo 'vide';
            }; 
        ?>";
    </script>
    <!--<div>-->

    
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) 
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    -->
    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS-->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/projet_blog.js"></script>

  </body>
</html>