
<?php
// Set database connection details
$host = 'localhost';
$dbname = 'YouthSpace';
$username = 'root';
$password = '';

// Connect to database using PDO
try {
    $db = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('Database connection failed: ' . $e->getMessage());
}

// Define function to calculate rating mean
function calculateRatingMean()
{
    global $db;

    try {
        // Select the distinct product IDs and names from the rate and produit tables
        $sql = "SELECT DISTINCT r.product_id, p.nom
                FROM rate r 
                INNER JOIN produit p ON r.product_id = p.id";
        $products = $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);

        // Iterate through each product and calculate its average rating
        $averages = array();
        foreach ($products as $product) {
            $sql = "SELECT AVG(rating) AS average FROM rate WHERE product_id = :productId";
            $stmt = $db->prepare($sql);
            $stmt->bindValue(':productId', $product['product_id'], PDO::PARAM_INT);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            $average = $result['average'];
            if ($average !== null) {
                $averages[] = array(
                    'product_id' => $product['product_id'],
                    'product_name' => $product['nom'],
                    'rating_average' => $average
                );
            }
        }

        return $averages;
    } catch (Exception $e) {
        die('Erreur: ' . $e->getMessage());
    }
}


$averages = calculateRatingMean();

$chart_data = '';
foreach ($averages as $average) {
    $chart_data .= "{ product_id:'".$average['product_id']."', product_name:'".$average['product_name']."', rating_average:".$average['rating_average']."}, ";
}
$chart_data = substr($chart_data, 0, -2);


?>



<!DOCTYPE html>
<html lang="en">
<?php

session_start (); 
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
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/c3/0.7.20/c3.min.css">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/d3/5.9.2/d3.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/c3/0.7.20/c3.min.js"></script>

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
          <li class="dropdown"><a href="#"><span>User</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
            <ul>
              <li><a href="#">Tache 1</a></li>
              <li><a href="#">Tache 2</a></li>
              <li><a href="#">Tache 3</a></li>
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
            <a data-aos="fade-up" data-aos-delay="200" href="#get-started" class="btn-get-started">Get Started</a>
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
            <h2>Products</h2>
        </div>

        <?php
        // Include the ProductC class
        include "../core/ProductC.php";

        // Create an instance of the ProductC class
        $prod1C = new ProductC();

        // Check if a sort order is selected
        if (isset($_POST['asc'])) {
            // Retrieve the products in ascending order
            $listeProd = $prod1C->afficherASC();
        } elseif (isset($_POST['desc'])) {
            // Retrieve the products in descending order
            $listeProd = $prod1C->afficherDESC();
        } else {
            // Retrieve all products
            $listeProd = $prod1C->Afficherproducts();
        }
        ?>

        <form method="POST" action="">
            <center>
                <button type="submit" name="asc" value="ascendant" class="btn btn-danger">Ascendant</button>
                <button type="submit" name="desc" value="descendant" class="btn btn-danger">Descendant</button>
            </center>
        </form>

        <table id="example1" class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Image</th>
                    <th>Prix</th>
                    <th>Description</th>
                    <th>Genre</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($listeProd as $row): ?>
                    <tr>
                        <td><?= $row['id'] ?></td>
                        <td><?= $row['nom'] ?></td>
                        <td><a><img class="" src="../images/<?= $row['img'] ?>" style="width: 100px; height:100px;"></a></td>
                        <td><?= $row['prix'] ?> DT</td>
                        <td><?= $row['descriptions'] ?></td>
                        <td><?= $row['genre'] ?></td>
                        <td>
                            <button style="background: none; border: none;">
                                <a href="modifierpros.php?id=<?= $row['id'] ?>" style="color: black; display: inline-block;">
                                    <img class="" src="./assets/img/pencill.png" style="margin-right: 5px; vertical-align: middle;">
                                    Modifier
                                </a>
                            </button>

                            <form method="POST" action="suppP.php" style="margin-top:30px">
                                <input type="hidden" value="<?= $row['id'] ?>" name="id">
                                <button type="submit" name="supprimer" style="background: none; border: none;">
                                    <img class="" src="./assets/img/trash.png" style="margin-right: 5px; vertical-align: middle;">
                                    Supprimer
                                </button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <button id="add-event">
            <a href="add.php" style="color: black">Ajouter un Produit</a>
        </button>

    </div>
</section>

  


  </main><!-- End #main -->

  <div class="container" style="width:1360px;">
   <h2 align="center">voici notre statistique</h2>
   <h3 align="center">statistique de notation </h3>   
   <br /><br />
   <div id="chart"></div>
  </div>


  </body>



  <?php
$data = [];
foreach ($averages as $average) {
  $rating_average_formatted = number_format($average['rating_average'], 2);
  $data[] = [$average['product_name'] . ' (' . $rating_average_formatted . ')', $average['rating_average']];
}
?>

<script>
var chart = c3.generate({
  bindto: '#chart',
  data: {
    columns: <?php echo json_encode($data); ?>,
    type: 'donut'
  },
  donut: {
    title: "évaluations des produits",
    width: 50
  },
  tooltip: {
    format: {
      value: function(value, ratio, id, index) {
        return value.toFixed(2) + '%';
      }
    }
  },
  legend: {
    show: true
  }
});
</script>






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



</html>