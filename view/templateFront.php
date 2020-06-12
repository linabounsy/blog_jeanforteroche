<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Accueil</title>
    <!-- MDB icon -->
    <link rel="icon" href="public/img/mbr-162x122.jpg" alt="accueil">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <!-- Google Fonts Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="public/css/bootstrap.min.css">
    <!-- Material Design Bootstrap -->
    <link rel="stylesheet" href="public/css/mdb.min.css">
    <!-- Your custom styles (optional) -->
    <link rel="stylesheet" href="public/css/style.css">
</head>

<body>

<!-- Navbar -->
<nav class="navbar fixed-top navbar-expand-lg navbar-light white scrolling-navbar">
  <div class="container">

    <!-- Brand -->
    <a class="navbar-brand" href="index.php">
                <img src="public/img/mbr-162x122.jpg" height="30" alt="logo_accueil">
                <strong class="black-text">J.Forteroche</strong>
            </a>
 
      


    <!-- Collapse -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Links -->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">

      <!-- Left -->
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link waves-effect" href="index.php">Accueil
          </a>
        </li>
        <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-black" href="" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Episodes</a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                           
                            <?php

                            foreach ($allPosts as $allPost) {

                            ?>
                                <a class="text-black dropdown-item display-4" href="index.php?action=post&id=<?= $allPost['id'] ?>"><?= htmlspecialchars($allPost['title']) ?></a>



                            <?php
                            }
                            ?>
                        </div>
                    </li>
                    <?php
                    if (isset($_SESSION['id']) && $_SESSION['id'] == 1) {


                    ?>
                    
                    <li class="nav-item">
                        <a class="nav-link text-black" href="index.php?action=indexadmin&indexadmin.php"><?= $_SESSION['login'] ?></a>
                   
                    </li>

                    <?php
                    } else { ?>

                        <li class="nav-item">
                        <a class="nav-link text-black" href="index.php?action=connexion&connexionview.php">Connexion</a>
                    </li>
                    <?php
                    }
                    ?>
      
      </ul>

      <!-- Right -->
      <ul class="navbar-nav nav-flex-icons">
        <li class="nav-item">
          <a href="#" class="nav-link waves-effect" target="_blank">
            <i class="fab fa-facebook-f"></i>
          </a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link waves-effect" target="_blank">
            <i class="fab fa-twitter"></i>
          </a>
        </li>
      
      </ul>

    </div>

  </div>
</nav>
<!-- Navbar -->


    <div id="content"><?= $content ?></div>


    


<!--Copyright-->
<footer>
<div class="footer-copyright py-3">
  © 2020 Copyright:
  <a href="#" target="_blank" class="black-text"> Jean Forteroche </a>
</div>
<!--/.Copyright-->

</footer>
<!--/.Footer-->
    <!-- End your project here-->

    <!-- jQuery -->
    <script type="text/javascript" src="public/js/jquery.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="public/js/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="public/js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="public/js/mdb.min.js"></script>



</body>

</html>