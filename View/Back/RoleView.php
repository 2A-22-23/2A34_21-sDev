<!DOCTYPE html>
<html lang="en">
<?php

session_start (); 
?>
<?PHP
include "../../Controller/RoleC.php";
$Role2C=new RoleC();
$listeRole2=$Role2C->AfficherRoless() ;
$Role1C=new RoleC();
$listeRole=$Role1C->AfficherRoles() ;
?>

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>YOUTH SPACE Bootstrap Template - Index</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Roboto:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Work+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: UpConstruction
  * Updated: Mar 10 2023 with Bootstrap v5.2.3
  * Template URL: https://bootstrapmade.com/upconstruction-bootstrap-construction-website-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>


<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header d-flex align-items-center">
   
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <a href="index.html" class="logo d-flex align-items-center">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <h1>YOUTH SPACE<span>.</span></h1>
      </a>

      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
      <nav id="navbar" class="navbar">
        
        <ul>
          <li><a href="index.html" class="active">Home</a></li> 
          <li class="dropdown">
    <a href="#"><span>User</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
    <ul>
 
        <?php foreach ($listeRole2 as $row) {
            if ($row['roles'] !== 'admin') {
                ?>
                <li><a href="listeu.php?id=<?php echo $row['id']; ?>"><?php echo $row['roles']; ?></a></li>
                
            <?php
            }
        } ?>
        <li> <a href="recherche.php"> Recherche </a></li>
    </ul>
</li>

          <li class="dropdown"><a href="#"><span>Clubs</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
            <ul>
              <li><a href="#">Tache 1</a></li>
              <li><a href="#">Tache 2</a></li>
              <li><a href="#">Tache 3</a></li>
            </ul>
          </li>
          <li class="dropdown"><a href="#"><span>Events</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
            <ul>
              <li><a href="#">Tache 1</a></li>
              <li><a href="#">Tache 2</a></li>
              <li><a href="#">Tache 3</a></li>
            </ul>
          </li>
          <li class="dropdown"><a href="#"><span>Product</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
            <ul>
              <li><a href="ProduitAFF.php">Product</a></li>
              <li><a href="#">Tache 2</a></li>
              <li><a href="#">Tache 3</a></li>
            </ul>
          </li>
          <li class="dropdown"><a href="#"><span>Forum</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
            <ul>
              <li><a href="#">Tache 1</a></li>
              <li><a href="#">Tache 2</a></li>
              <li><a href="#">Tache 3</a></li>
            </ul>
          </li>
          <li class="dropdown"><a href="#"><span>Media</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
            <ul>
              <li><a href="#">Tache 1</a></li>
              <li><a href="#">Tache 2</a></li>
              <li><a href="#">Tache 3</a></li>
            </ul>
          </li>
          <li><a href="about.html">About</a></li>
        </ul>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="hero">

    <div class="info d-flex align-items-center">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-6 text-center">
            <h2 data-aos="fade-down">Welcome to <span> <br> YOUTH SPACE</span></h2>
            <p data-aos="fade-up">A place for growth and connection.</p>
            <a data-aos="fade-up" data-aos-delay="200" href="#get-started" class="btn-get-started">Gérer Roles</a>
          </div>
        </div>
      </div>
    </div>

    <div id="hero-carousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">

      <div class="carousel-item active" style="background-image: url(assets/img/hero-carousel/1.jpg)"></div>
      <div class="carousel-item" style="background-image: url(assets/img/hero-carousel/2.jpg)"></div>
      <div class="carousel-item" style="background-image: url(assets/img/hero-carousel/3.jpg)"></div>
      <div class="carousel-item" style="background-image: url(assets/img/hero-carousel/4.jpg)"></div>
      <div class="carousel-item" style="background-image: url(assets/img/hero-carousel/5.jpg)"></div>

      <a class="carousel-control-prev" href="#hero-carousel" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
      </a>

      <a class="carousel-control-next" href="#hero-carousel" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
      </a>

    </div>

  </section><!-- End Hero Section -->

  <main id="main">

    <!-- ======= User Section ======= -->
    <section id="get-started" class="get-started section-bg">
      <div class="container" data-aos="fade-up">

        <div class="row justify-content-between gy-4">

        
              <div class="row gy-3">
                <style>
                  table {
                    border: 1px solid black;
                  }
                  tr {
                    border: 1px solid black;
                  }
                  th {
                    border: 1px solid black;
                  }
                  td {
                    border: 1px solid black;
                  }
                </style>
                
        

          </div><!-- End Quote Form -->

        </div>

      </div>
   



    <!-- ======= Products Section ======= -->
    <section id="services" class="services section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>Roles</h2>
        </div>

        <div class="row gy-4">
    <!-- hne -->
<div class="container">
    <h2>Liste des rôles</h2>
<div class="table-responsive">
<table id="example1" class="table table-striped">
  <thead>
    <tr>
      <th>ID</th>
      <th>Role</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($listeRole as $row) { ?>
      <tr>
        <td><?php echo $row['id']; ?></td>
        <td><?php echo $row['roles']; ?></td>
        <td>
          <a href="modifR.php?id=<?php echo $row['id']; ?>">
            <img src="./assets/img/pencill.png" alt="Modifier" title="Modifier">
          </a>
          <form method="POST" action="deleteR.php" style="display:inline-block;">
            <input type="hidden" value="<?php echo $row['id']; ?>" name="id">
            <button type="submit" name="supprimer" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce rôle ?')" style="background:none; border:none; padding:0; margin:0;">
              <img src="./assets/img/trash.png" alt="Supprimer" title="Supprimer">
            </button>
          </form>
        </td>
      </tr>
    <?php } ?>
  </tbody>
</table>
<button id="add-event" class="btn btn-primary">
    <a href="add.php" style="color: white;">Ajouter un rôle</a>
  </button>

    </section><!-- End Services Section -->

  <!-- ======= Forum Section ======= -->

  
    <!-- ======= Media Section ======= -->



  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">

    <div class="footer-content position-relative">
      <div class="container">
        <div class="row">

          <div class="col-lg-4 col-md-6">
            <div class="footer-info">
              <h3>YOUTH SPACE</h3>
              <p>
                A108 Adam Street <br>
                NY 535022, USA<br><br>
                <strong>Phone:</strong> +1 5589 55488 55<br>
                <strong>Email:</strong> info@example.com<br>
              </p>
              <div class="social-links d-flex mt-3">
                <a href="#" class="d-flex align-items-center justify-content-center"><i class="bi bi-twitter"></i></a>
                <a href="#" class="d-flex align-items-center justify-content-center"><i class="bi bi-facebook"></i></a>
                <a href="#" class="d-flex align-items-center justify-content-center"><i class="bi bi-instagram"></i></a>
                <a href="#" class="d-flex align-items-center justify-content-center"><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
          </div><!-- End footer info column-->

          <div class="col-lg-2 col-md-3 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><a href="#">Home</a></li>
              <li><a href="#">About us</a></li>
              <li><a href="#">Services</a></li>
              <li><a href="#">Terms of service</a></li>
              <li><a href="#">Privacy policy</a></li>
            </ul>
          </div><!-- End footer links column-->

          <div class="col-lg-2 col-md-3 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li><a href="#">Web Design</a></li>
              <li><a href="#">Web Development</a></li>
              <li><a href="#">Product Management</a></li>
              <li><a href="#">Marketing</a></li>
              <li><a href="#">Graphic Design</a></li>
            </ul>
          </div><!-- End footer links column-->

          <div class="col-lg-2 col-md-3 footer-links">
            <h4>Hic solutasetp</h4>
            <ul>
              <li><a href="#">Molestiae accusamus iure</a></li>
              <li><a href="#">Excepturi dignissimos</a></li>
              <li><a href="#">Suscipit distinctio</a></li>
              <li><a href="#">Dilecta</a></li>
              <li><a href="#">Sit quas consectetur</a></li>
            </ul>
          </div><!-- End footer links column-->

          <div class="col-lg-2 col-md-3 footer-links">
            <h4>Nobis illum</h4>
            <ul>
              <li><a href="#">Ipsam</a></li>
              <li><a href="#">Laudantium dolorum</a></li>
              <li><a href="#">Dinera</a></li>
              <li><a href="#">Trodelas</a></li>
              <li><a href="#">Flexo</a></li>
            </ul>
          </div><!-- End footer links column-->

        </div>
      </div>
    </div>

    <div class="footer-legal text-center position-relative">
      <div class="container">
        <div class="copyright">
          &copy; Copyright <strong><span>YOUTH SPACE</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
          <!-- All the links in the footer should remain intact. -->
          <!-- You can delete the links only if you purchased the pro version. -->
          <!-- Licensing information: https://bootstrapmade.com/license/ -->
          <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/YOUTH SPACE-bootstrap-construction-website-template/ -->
          Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
      </div>
    </div>

  </footer>
  <!-- End Footer -->

  <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>