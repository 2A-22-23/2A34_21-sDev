<?php

    require_once     '../Controller/clubC.php';
    require_once '../Model/club.php' ;
    $clubC = new clubC();
    

    if (isset($_POST['idclub'] ) && isset($_POST['titre']  )&& isset($_POST['type']  )&& isset($_POST['fondateur']  )&& isset($_POST['date']  )) 
    {
        echo $_POST['idclub'] ;
            $club = new club($_POST['idclub'] , $_POST['titre'] , $_POST['type'], $_POST['fondateur'], $_POST['date']);
            $clubC->modifierclub($club);
            header('Location:afficherclub.php');
    }else
    {
        $a = $clubC->getclubbyID($_GET['idclub']) ;
    }



?>

        <style>
            table {
                border-collapse: collapse;
                width: 100%;
                max-width: 600px;
                margin: 0 auto;
                background-color: #f2f2f2;
                font-family: Arial, sans-serif;
            }
            td {
                padding: 8px;
                border: 1px solid #ddd;
            }
            td label {
                font-weight: bold;
                display: inline-block;
                width: 100px;
				color:black;
            }
            td input[type="text"], td input[type="number"] {
                padding: 8px;
                border: none;
                border-radius: 3px;
                width: 100%;
                box-sizing: border-box;
				color:black;
            }
            td input[type="submit"], td input[type="reset"] {
                background-color: #4CAF50;
                border: none;
                color: white;
                padding: 8px 16px;
                text-decoration: none;
                margin: 4px 2px;
                cursor: pointer;
                border-radius: 3px;
            }
        </style>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>youth space</title>
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
          <li><a href="index.php">Home</a></li>
          <li><a href="afficherclub.php" class="active">club</a></li>
          <li><a href="affichersalle.php">salle</a></li>
          <li><a href="afficherclubadmin.php">Pannel</a></li>
          <li><a href="blog.html">Blog</a></li>
          <li class="dropdown"><a href="#"><span>Dropdown</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
            <ul>
              <li><a href="#">Dropdown 1</a></li>
              <li class="dropdown"><a href="#"><span>Deep Dropdown</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
                <ul>
                  <li><a href="#">Deep Dropdown 1</a></li>
                  <li><a href="#">Deep Dropdown 2</a></li>
                  <li><a href="#">Deep Dropdown 3</a></li>
                  <li><a href="#">Deep Dropdown 4</a></li>
                  <li><a href="#">Deep Dropdown 5</a></li>
                </ul>
              </li>
              <li><a href="#">Dropdown 2</a></li>
              <li><a href="#">Dropdown 3</a></li>
              <li><a href="#">Dropdown 4</a></li>
            </ul>
          </li>
          <li><a href="contact.html">Contact</a></li>
        </ul>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs d-flex align-items-center" style="background-image: url('assets/img/breadcrumbs-bg.jpg');">
      <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">

        <h2>Clubs</h2>
        <ol>
          <li><a href="index.php ">Home</a></li>
          <li>clubs</li>
        </ol>

      </div>
    </div><!-- End Breadcrumbs -->
        <form action="" method="POST">
            <table class="table">
                <tr>
                    <td>
                        <label for="idclub">idclub:</label>
                    </td>
                    <td>
                        <input type="number" name="idclub" id="idclub" maxlength="20" value="<?php echo $a['idclub'];?>"  readonly>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="titre">titre:</label>
                    </td>
                    <td>
                        <input type="text" value="<?php echo $a['titre'];?>" name="titre" id="titre" maxlength="20">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="type">type:</label>
                    </td>
                    <td>
                        <input type="text" value="<?php echo $a['type'];?>" name="type" id="type" maxlength="20" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="fondateur">fondateur:</label>
                    </td>
                    <td>
                        <input type="text" value="<?php echo $a['fondateur'];?>" name="fondateur" id="fondateur" maxlength="20" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="date">date:</label>
                    </td>
                    <td>
                        <input type="date" value="<?php echo $a['date'];?>" name="date" id="date" maxlength="20" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="submit" value="Modifier">
                    </td>
                    <td>
                        <input type="reset" value="Annuler">
                    </td>
                </tr>
            </table>
        </form>
    </body>
    
  <div class="container">
        <div class="row">
    <div class="footer-legal text-center position-relative">
      <div class="container">
        <div class="copyright">
          &copy; Copyright <strong><span>YOUTH SPACE</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
          <!-- All the links in the footer should remain intact. -->
          <!-- You can delete the links only if you purchased the pro version. -->
          <!-- Licensing information: https://bootstrapmade.com/license/ -->
          <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/upconstruction-bootstrap-construction-website-template/ -->
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
          </div>
</html>
</html>

</html>
