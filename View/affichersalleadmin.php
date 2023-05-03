
<?php
require '../Controller/salleC.php';
$salleC = new salleC();
$salle = $salleC->affichersalle();

if ($_POST["aff"] == "Tri") {
  $salle = $salleC->triSalle();
} else if ($_POST["aff"] == "Search") {
  $salle = $salleC->rechercheSalle($_POST["rech"]);
} else
  $salle = $salleC->affichersalle();



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>EnergyBox | Dashboard</title>

    <!-- Fontfaces CSS-->
    <link href="BackOffice/css/font-face.css" rel="stylesheet" media="all">
    <link href="BackOffice/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="BackOffice/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="BackOffice/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="BackOffice/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="BackOffice/vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="BackOffice/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="BackOffice/vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="BackOffice/vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="BackOffice/vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="BackOffice/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="BackOffice/vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
    <script type="text/javascript" src="jscript/graph.js"></script>


    <!-- Main CSS-->
    <link href="BackOffice/css/theme.css" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="index.html">
                            <img src="" alt="LogoGymBlack" />
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                        <li class="active">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-home"></i>Home</a>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-user"></i>Utilisateurs</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="#">Ajouter Utilisateur</a>
                                </li>
                                <li>
                                    <a href="#">Afficher Utilisateurs</a>
                                </li>
                            </ul>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-table"></i>Club</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                            <li>
                                        <a href="ajouterclubadmin.php">Ajouter Club</a>
                                    </li>
                                    <li>
                                        <a href="afficherclubadmin.php">Afficher Clubs</a>
                                    </li>
                            </ul>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-list"></i>Salle</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                            <li>
                                        <a href="ajoutersalleadmin.php">Ajouter Salle</a>
                                    </li>
                                    <li>
                                        <a href="affichersalleadmin.php">Afficher Salles</a>
                                    </li>
                            </ul>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-desktop"></i>Materiaux</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="#">Ajouter Materiel</a>
                                </li>
                                <li>
                                    <a href="#">Afficher Materiaux</a>
                                </li>
                                <li>
                                    <a href="#">Ajouter Charge</a>
                                </li>
                                <li>
                                    <a href="#">Afficher Charges</a>
                                </li>
                                <li>
                                    <a href="#">Ajouter Fournisseur</a>
                                </li>
                                <li>
                                    <a href="#">Afficher Fournisseurs</a>
                                </li>
                            </ul>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-trophy"></i>Competition</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="#">Ajouter Competition</a>
                                </li>
                                <li>
                                    <a href="#">Afficher Competition</a>
                                </li>
                                <li>
                                    <a href="#">Ajouter Ticket</a>
                                </li>
                                <li>
                                    <a href="#">Afficher Tickets</a>
                                </li>
                            </ul>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-newspaper"></i>Restaurants</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="#">Ajouter Plat</a>
                                </li>
                                <li>
                                    <a href="#">Afficher Plats</a>
                                </li>
                                <li>
                                    <a href="#">Ajouter Menu</a>
                                </li>
                                <li>
                                    <a href="#">Afficher Menus</a>
                                </li>
                            </ul>
                        </li>
                        
                    </ul>
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="#">
                    <img src="" height="90" width="100" alt="LogoGymBlack" />
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li class="active">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-home"></i>Home</a>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-user"></i>Utilisateurs</a>
                                <ul class="list-unstyled navbar__sub-list js-sub-list">
                                    <li>
                                        <a href="#">Ajouter Utilisateur</a>
                                    </li>
                                    <li>
                                        <a href="#">Afficher Utilisateurs</a>
                                    </li>
                                </ul>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-table"></i>Club</a>
                                <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                        <a href="ajouterclubadmin.php">Ajouter Club</a>
                                    </li>
                                    <li>
                                        <a href="afficherclubadmin.php">Afficher Clubs</a>
                                    </li>
                                </ul>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-list"></i>Salle</a>
                                <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                        <a href="ajoutersalleadmin.php">Ajouter Salle</a>
                                    </li>
                                    <li>
                                        <a href="affichersalleadmin.php">Afficher Salles</a>
                                    </li>
                                </ul>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-desktop"></i>Materiaux</a>
                                <ul class="list-unstyled navbar__sub-list js-sub-list">
                                    <li>
                                        <a href="#">Ajouter Materiel</a>
                                    </li>
                                    <li>
                                        <a href="#">Afficher Materiaux</a>
                                    </li>
                                    <li>
                                        <a href="#">Ajouter Charge</a>
                                    </li>
                                    <li>
                                        <a href="#">Afficher Charges</a>
                                    </li>
                                    <li>
                                        <a href="#">Ajouter Fournisseur</a>
                                    </li>
                                    <li>
                                        <a href="#">Afficher Fournisseurs</a>
                                    </li>
                                </ul>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-trophy"></i>Competition</a>
                                <ul class="list-unstyled navbar__sub-list js-sub-list">
                                    <li>
                                        <a href="#">Ajouter Competition</a>
                                    </li>
                                    <li>
                                        <a href="#">Afficher Competition</a>
                                    </li>
                                    <li>
                                        <a href="#">Ajouter Ticket</a>
                                    </li>
                                    <li>
                                        <a href="#">Afficher Tickets</a>
                                    </li>
                                </ul>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-newspaper"></i>Restaurants</a>
                                <ul class="list-unstyled navbar__sub-list js-sub-list">
                                    <li>
                                        <a href="#">Ajouter Plat</a>
                                    </li>
                                    <li>
                                        <a href="#">Afficher Plats</a>
                                    </li>
                                    <li>
                                        <a href="#">Ajouter Menu</a>
                                    </li>
                                    <li>
                                        <a href="#">Afficher Menus</a>
                                    </li>
                                </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <form class="form-header" action="" method="POST">
                                <input class="au-input au-input--xl" type="text" name="search" placeholder="Search for datas &amp; reports..." />
                                <button class="au-btn--submit" type="submit">
                                    <i class="zmdi zmdi-search"></i>
                                </button>
                            </form>
                            <div class="header-button">
                                <div class="noti-wrap">
                                    <div class="noti__item js-item-menu">
                                        <i class="zmdi zmdi-comment-more"></i>
                                        <span class="quantity">1</span>
                                        <div class="mess-dropdown js-dropdown">
                                            <div class="mess__title">
                                                <p>You have 2 news message</p>
                                            </div>
                                            <div class="mess__item">
                                                <div class="image img-cir img-40">
                                                    <img src="images/icon/avatar-06.jpg" alt="Michelle Moreno" />
                                                </div>
                                                <div class="content">
                                                    <h6>Michelle Moreno</h6>
                                                    <p>Have sent a photo</p>
                                                    <span class="time">3 min ago</span>
                                                </div>
                                            </div>
                                            <div class="mess__item">
                                                <div class="image img-cir img-40">
                                                    <img src="images/icon/avatar-04.jpg" alt="Diane Myers" />
                                                </div>
                                                <div class="content">
                                                    <h6>Diane Myers</h6>
                                                    <p>You are now connected on message</p>
                                                    <span class="time">Yesterday</span>
                                                </div>
                                            </div>
                                            <div class="mess__footer">
                                                <a href="#">View all messages</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="noti__item js-item-menu">
                                        <i class="zmdi zmdi-email"></i>
                                        <span class="quantity">1</span>
                                        <div class="email-dropdown js-dropdown">
                                            <div class="email__title">
                                                <p>You have 3 New Emails</p>
                                            </div>
                                            <div class="email__item">
                                                <div class="image img-cir img-40">
                                                    <img src="images/icon/avatar-06.jpg" alt="Cynthia Harvey" />
                                                </div>
                                                <div class="content">
                                                    <p>Meeting about new dashboard...</p>
                                                    <span>Cynthia Harvey, 3 min ago</span>
                                                </div>
                                            </div>
                                            <div class="email__item">
                                                <div class="image img-cir img-40">
                                                    <img src="images/icon/avatar-05.jpg" alt="Cynthia Harvey" />
                                                </div>
                                                <div class="content">
                                                    <p>Meeting about new dashboard...</p>
                                                    <span>Cynthia Harvey, Yesterday</span>
                                                </div>
                                            </div>
                                            <div class="email__item">
                                                <div class="image img-cir img-40">
                                                    <img src="images/icon/avatar-04.jpg" alt="Cynthia Harvey" />
                                                </div>
                                                <div class="content">
                                                    <p>Meeting about new dashboard...</p>
                                                    <span>Cynthia Harvey, April 12,,2018</span>
                                                </div>
                                            </div>
                                            <div class="email__footer">
                                                <a href="#">See all emails</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="noti__item js-item-menu">
                                        <i class="zmdi zmdi-notifications"></i>
                                        <span class="quantity">3</span>
                                        <div class="notifi-dropdown js-dropdown">
                                            <div class="notifi__title">
                                                <p>You have 3 Notifications</p>
                                            </div>
                                            <div class="notifi__item">
                                                <div class="bg-c1 img-cir img-40">
                                                    <i class="zmdi zmdi-email-open"></i>
                                                </div>
                                                <div class="content">
                                                    <p>You got a email notification</p>
                                                    <span class="date">April 12, 2018 06:50</span>
                                                </div>
                                            </div>
                                            <div class="notifi__item">
                                                <div class="bg-c2 img-cir img-40">
                                                    <i class="zmdi zmdi-account-box"></i>
                                                </div>
                                                <div class="content">
                                                    <p>Your account has been blocked</p>
                                                    <span class="date">April 12, 2018 06:50</span>
                                                </div>
                                            </div>
                                            <div class="notifi__item">
                                                <div class="bg-c3 img-cir img-40">
                                                    <i class="zmdi zmdi-file-text"></i>
                                                </div>
                                                <div class="content">
                                                    <p>You got a new file</p>
                                                    <span class="date">April 12, 2018 06:50</span>
                                                </div>
                                            </div>
                                            <div class="notifi__footer">
                                                <a href="#">All notifications</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        <div class="image">
                                            <img src="images/icon/avatar-01.jpg" alt="John Doe" />
                                        </div>
                                        <div class="content">
                                            <a class="js-acc-btn" href="#">john doe</a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                                <div class="image">
                                                    <a href="#">
                                                        <img src="images/icon/avatar-01.jpg" alt="John Doe" />
                                                    </a>
                                                </div>
                                                <div class="content">
                                                    <h5 class="name">
                                                        <a href="#">john doe</a>
                                                    </h5>
                                                    <span class="email">johndoe@example.com</span>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__body">
                                                <div class="account-dropdown__item">
                                                    <a href="#">
                                                        <i class="zmdi zmdi-account"></i>Account</a>
                                                </div>
                                                <div class="account-dropdown__item">
                                                    <a href="#">
                                                        <i class="zmdi zmdi-settings"></i>Setting</a>
                                                </div>
                                                <div class="account-dropdown__item">
                                                    <a href="#">
                                                        <i class="zmdi zmdi-money-box"></i>Billing</a>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__footer">
                                                <a href="#">
                                                    <i class="zmdi zmdi-power"></i>Logout</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <!-- START WHITE BACKGROUND-->
                                <div class="map-data m-b-40">
                                    <form action="affichersalleadmin.php" method="POST">
                                        <input type="text" name="rech" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" style="height=50px;">
                                        <center>
                                            <input type="submit" style="background-color: #007bff;
                                                border: none;
                                                border-radius: 5px;
                                                color: white;
                                                display: inline-block;
                                                font-size: 16px;
                                                padding: 8px 16px;
                                                text-align: center;
                                                text-decoration: none;
                                                transition: background-color 0.3s ease; background-color: green;" name="aff" value="Search" />
                                        </center>
                                    </form>
                                    <form action="affichersalleadmin.php" method="POST">
                                        <center>
                                        <input type="submit" style="background-color: #007bff;
                                            border: none;
                                            border-radius: 5px;
                                            color: white;
                                            display: inline-block;
                                            font-size: 16px;
                                            padding: 8px 16px;
                                            text-align: center;
                                            text-decoration: none;
                                            transition: background-color 0.3s ease; background-color: green;" name="aff" value="Tri" />
                                        </center>
                                    </form>

                            


                                

                                <!-- ======= Events Section ======= -->
                                <section id="constructions" class="constructions">
                                <div class="container" data-aos="fade-up">

                                    <div class="section-header">
                                    <h2>salles</h2>
                                    </div>

                                    <table class="table">
                                        <thead>
                                        <tr>
                                    
                                            <th>Bloc</th>
                                            <th>Numero</th>
                                            <th>etage</th>
                                            <th>club</th>
                                            <th>Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
                                    foreach ($salle as $salle) { 
                                    include_once '../Controller/clubC.php';

                                    $clubC = new clubC();
                                    
                                        $clubId = $salle['idclub'];
                                        $club = $clubC->getclubById($clubId);
                                        $clubTitle = $club['titre'];
                                ?>
                                <tr>
                                    <td><?php echo $salle['bloc']; ?></td>
                                    <td><?php echo $salle['numero']; ?></td>
                                    <td><?php echo $salle['etage']; ?></td>
                                
                                    <td><?php echo $clubTitle; ?></td>
                                    <td>
                                    <a style="color: red;" href="supprimersalleadmin.php?idsalle=<?php echo $salle['idsalle']; ?>">Supprimer</a>
                                    <a href="modifiersalleadmin.php?idsalle=<?php echo $salle['idsalle']; ?>">Modifier</a>
                                    </td>
                                </tr>
                                <?php
                                    }
                                ?>
                                </tbody>
                                    </table>
                                    
                                    <button onclick="window.location.href='ajoutersalleadmin.php'" id="add-event">Ajouter une salle</button>
                                    

                                    <br><br><br><br><br><br><br><br><br><br><br><br>
                                    <div class="row" style="position: relative;left:50px;top:-200px;">
                                            <div class="col-lg-10 grid-margin stretch-card">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <canvas id="myChart"></canvas>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                </div>
                                
                                <!-- END WHITE BACKGROUND-->
                            </div>
                        </div>
                        
                        
                        <div class="row">
                            <div class="col-md-12">
                                <div class="copyright">
                                    <p>Copyright © 2023 Colorlib. All rights reserved. Template by <a href="https://colorlib.com">Colorlib</a>.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>

    </div>
    <script>
                    var xValues = ["Nombre des clubs qui ont des salle","Nombre des clubs sans salle"];
                    var yValues = [<?php echo $salleC->count_Salle();?>, <?php echo $salleC->count_Club()-$salleC->count_Salle();?>];
                    var barColors = [
                        "#00aba9",
                        "#e8c3b9"
                    ];

                    new Chart("myChart", {
                        type: "doughnut",
                        data: {
                            labels: xValues,
                            datasets: [{
                                backgroundColor: barColors,
                                data: yValues
                            }]
                        },
                        options: {
                            title: {
                                display: true,
                                text: "Club avec-Club sans"
                            }
                        }
                    });
                </script>
    <!-- Jquery JS-->
    <script src="BackOffice/vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="BackOffice/vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="BackOffice/vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="BackOffice/vendor/slick/slick.min.js">
    </script>
    <script src="BackOffice/vendor/wow/wow.min.js"></script>
    <script src="BackOffice/vendor/animsition/animsition.min.js"></script>
    <script src="BackOffice/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="BackOffice/vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="BackOffice/vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="BackOffice/vendor/circle-progress/circle-progress.min.js"></script>
    <script src="BackOffice/vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="BackOffice/vendor/chartjs/Chart.bundle.min.js"></script>
    
    <script src="BackOffice/vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="BackOffice/js/main.js"></script>

</body>

</html>
<!-- end document-->



 