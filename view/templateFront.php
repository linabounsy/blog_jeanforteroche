<!DOCTYPE html>
<html>

<head>
    <!-- Site made with Mobirise Website Builder v4.12.3, https://mobirise.com -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="generator" content="Mobirise v4.12.3, mobirise.com">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
    <link rel="shortcut icon" href="assets/images/mbr-162x122.jpg" type="image/x-icon">
    <meta name="description" content="">


    <title>accueil</title>
    <link rel="stylesheet" href="assets/web/assets/mobirise-icons/mobirise-icons.css">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-reboot.min.css">
    <link rel="stylesheet" href="assets/socicon/css/styles.css">
    <link rel="stylesheet" href="assets/tether/tether.min.css">
    <link rel="stylesheet" href="assets/dropdown/css/style.css">
    <link rel="stylesheet" href="assets/theme/css/style.css">
    <link rel="stylesheet" href="public/css/style.css">
    <link rel="preload" as="style" href="assets/mobirise/css/mbr-additional.css">
    <link rel="stylesheet" href="assets/mobirise/css/mbr-additional.css" type="text/css">


</head>

<body>
    <section class="menu cid-qTkzRZLJNu" once="menu" id="menu1-0">



        <nav class="navbar navbar-expand beta-menu navbar-dropdown align-items-center navbar-fixed-top navbar-toggleable-sm">
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <div class="hamburger">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </button>
            <div class="menu-logo">
                <div class="navbar-brand">
                    <span class="navbar-logo">
                        <a href="index.php">
                            <img src="assets/images/mbr-162x122.jpg" alt="Mobirise" title="" style="height: 3.8rem;">
                        </a>
                    </span>
                    <span class="navbar-caption-wrap"><a class="navbar-caption text-white display-4" href="index.php">
                            J.Forteroche.</a></span>
                </div>
            </div>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav nav-dropdown nav-right" data-app-modern-menu="true">
                    <li class="nav-item"><a class="nav-link link text-white display-4" href="index.php"><span class="mbri-home mbr-iconfont mbr-iconfont-btn"></span>

                            Accueil</a></li>
                    <li class="nav-item dropdown">


                        <a class="nav-link link text-white dropdown-toggle display-4" href="" data-toggle="dropdown-submenu" aria-expanded="false"><span class="mbri-bulleted-list mbr-iconfont mbr-iconfont-btn"></span>

                            Episodes</a>


                        <div class="dropdown-menu">
                            <?php

                            foreach ($posts as $post) {

                            ?>
                                <a class="text-white dropdown-item display-4" href="index.php?action=post&id=<?= $post['id'] ?>"><?= htmlspecialchars($post['title']) ?></a>



                            <?php
                            }
                            ?>
                        </div>
                    </li>
                    <?php
                    if (isset($_SESSION['id']) && $_SESSION['id'] == 1) {


                    ?>
                        <li class="nav-item">
                            <a class="nav-link link text-white display-4" href="index.php?action=connexion&connexionview.php"><span class="mbri-letter mbr-iconfont mbr-iconfont-btn"></span>

                                <?= $_SESSION['login'] ?></a>
                        </li>
                    <?php
                    } else { ?>

                        <li class="nav-item">
                            <a class="nav-link link text-white display-4" href="index.php?action=connexion&connexionview.php"><span class="mbri-letter mbr-iconfont mbr-iconfont-btn"></span>

                                Connexion</a>
                        </li>
                    <?php
                    }
                    ?>
                </ul>

            </div>
        </nav>
    </section>

    <?= $content ?>


    <section class="cid-qTkAaeaxX5" id="footer1-2">


        <div class="container">
            <div class="media-container-row content text-white">
                <div class="col-12 col-md-3">
                    <div class="media-wrap">
                        <a href="https://mobirise.com/">
                            <img src="assets/images/mbr-256x192.jpg" alt="Mobirise" title="">
                        </a>
                    </div>
                </div>
                <div class="col-12 col-md-3 mbr-fonts-style display-7">
                    <h5 class="pb-3">Mentions légales</h5>
                    <p class="mbr-text"></p>
                </div>
                <div class="col-12 col-md-3 mbr-fonts-style display-7">
                    <h5 class="pb-3">
                        A propos de moi</h5>
                    <p class="mbr-text">je suis blablabla</p>
                </div>
                <div class="col-12 col-md-3 mbr-fonts-style display-7">
                    <h5 class="pb-3"></h5>
                    <p class="mbr-text"></p>
                </div>
            </div>
            <div class="footer-lower">
                <div class="media-container-row">
                    <div class="col-sm-12">
                        <hr>
                    </div>
                </div>
                <div class="media-container-row mbr-white">
                    <div class="col-sm-6 copyright">
                        <p class="mbr-text mbr-fonts-style display-7">
                            © Copyright Jean Forteroche - Tous droits réservés</p>
                    </div>
                    <div class="col-md-6">
                        <div class="social-list align-right">
                            <div class="soc-item">
                                <a href="https://twitter.com/mobirise" target="_blank">
                                    <span class="socicon-twitter socicon mbr-iconfont mbr-iconfont-social"></span>
                                </a>
                            </div>
                            <div class="soc-item">
                                <a href="https://www.facebook.com/pages/Mobirise/1616226671953247" target="_blank">
                                    <span class="socicon-facebook socicon mbr-iconfont mbr-iconfont-social"></span>
                                </a>
                            </div>
                            <div class="soc-item">
                                <a href="https://www.youtube.com/c/mobirise" target="_blank">
                                    <span class="socicon-youtube socicon mbr-iconfont mbr-iconfont-social"></span>
                                </a>
                            </div>
                            <div class="soc-item">
                                <a href="https://instagram.com/mobirise" target="_blank">
                                    <span class="socicon-instagram socicon mbr-iconfont mbr-iconfont-social"></span>
                                </a>
                            </div>
                            <div class="soc-item">
                                <a href="https://plus.google.com/u/0/+Mobirise" target="_blank">
                                    <span class="socicon-googleplus socicon mbr-iconfont mbr-iconfont-social"></span>
                                </a>
                            </div>
                            <div class="soc-item">
                                <a href="https://www.behance.net/Mobirise" target="_blank">
                                    <span class="socicon-behance socicon mbr-iconfont mbr-iconfont-social"></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <script src="assets/web/assets/jquery/jquery.min.js"></script>
    <script src="assets/popper/popper.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/tether/tether.min.js"></script>
    <script src="assets/dropdown/js/nav-dropdown.js"></script>
    <script src="assets/dropdown/js/navbar-dropdown.js"></script>
    <script src="assets/touchswipe/jquery.touch-swipe.min.js"></script>
    <script src="assets/parallax/jarallax.min.js"></script>
    <script src="assets/smoothscroll/smooth-scroll.js"></script>
    <script src="assets/theme/js/script.js"></script>


</body>

</html>
</body>

</html>