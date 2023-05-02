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
  <link href="./assets/css/main.css" rel="stylesheet">
  <link href="./hii.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: UpConstruction
  * Updated: Mar 10 2023 with Bootstrap v5.2.3
  * Template URL: https://bootstrapmade.com/upconstruction-bootstrap-construction-website-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->

  <script>
function addToCart(productId) {
    // Send AJAX request to add product to cart
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "add-to-cart.php");
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
        if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
            alert("Product added to cart successfully!");
        }
    };
    xhr.send("product_id=" + productId);
}
</script>
<style>
.rating-widget {
  font-size: 24px;
  
  display: flex;
  flex-direction: row-reverse;
  justify-content: flex-end;
}

.rating-widget .star {
  cursor: pointer;
  color: #ccc;
  
}

.rating-widget .star:hover,
.rating-widget .star:hover ~ .star {
  color: #ffcc00;
}


</style>
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
              <li><a href="#">Tache 1</a></li>
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

          <?php
                        include "../core/ProductC.php";
                        $ProductC=new ProductC();
                        $listepro=$ProductC-> Afficherproducts();
                        $listemovieQuery = $ProductC->Afficherpaniers(); 
                        
                        
                        // the PDOStatement object returned by the function
                        $listemovie = $listemovieQuery->fetchAll(PDO::FETCH_ASSOC); // fetch the results and store them in an array
                        
                        $total = 0;
                        $numItems = count($listemovie);
                    
                        ?>
          <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
    <span class="glyphicon glyphicon-shopping-cart"> Cart - <?php echo $numItems; ?> - Items</span>
    <span class="caret"></span>
  </a>
          <ul class="dropdown" role="menu">
          <?PHP


foreach($listemovie as $row)
{
  $total += $row['prix'];
?>
              <li >
                  <span class="item">
                    <span class="item-left" >
                    <img src="../../Back/images/<?php echo $row['img'];?>" alt="streamlab-image" style="width: 50px; padding:10px; height:50px ">
                        <span class="item-info">
                            <span><?php echo $row['nom'];?></span>
                            <span><?php echo $row['prix'];?>Dt</span>
                        </span>
                    </span>
                    <span class="item-right">
                    <button style="border:none;background-color:white; " >  <form method="POST" action="suppP.php">
    <input type="submit" class="btn btn-xs btn-danger pull-right" name="supprimer" value="X">
    <input type="hidden" value="<?PHP echo $row['id']; ?>" name="id">
    </form></button>
                        
                    </span>
                </span>
              </li>
              
              <?PHP
              
}
?>
              <li class="divider"></li>
              <li><a class="text-center" href="commande.php">View Cart</a></li>
              <li><span class="text-center" > Prix Totale :  <?php echo $total;?> DT</span></li> <!-- print the total value -->
          </ul>
        </li>




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




    <!-- ======= Events Section ======= -->
    <section id="constructions" class="constructions">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>Produit</h2>
          <p>Explore and discover our plans and Product coming</p>
        </div>

    



        <section class="section-products">
	<div class="container">
		<div class="row justify-content-center text-center">
			<div class="col-md-8 col-lg-6">
				<div class="header">
				
				</div>
			</div>
		</div>
		<div class="row">
			<?php foreach($listepro as $row) { ?>
			<!-- Single Product -->
			<div class="col-md-6 col-lg-4 col-xl-3">
      <div id="product-<?php echo $row['id']; ?>" class="single-product">

       
					<div class="part-1">
             <div class="card-bg"> <img src="../../Back/images/<?php echo $row['img'];?>" alt="streamlab-image" style="width: 400px; padding: 0px ; height:300px "></div>
						<ul>
							<li><a href="addtocart.php?id=<?PHP echo $row['id']; ?>"><i class="fas fa-shopping-cart"></i></a></li>
				
						</ul>
					</div>


          <div class="rating-widget" data-product="<?php echo $row['id']; ?>">
  <a href="#" onclick="submitRating(<?php echo $row['id']; ?>, 5)" data-value="5" class="star">&#9733;</a>
  <a href="#" onclick="submitRating(<?php echo $row['id']; ?>, 4)" data-value="4" class="star">&#9733;</a>
  <a href="#" onclick="submitRating(<?php echo $row['id']; ?>, 3)" data-value="3" class="star">&#9733;</a>
  <a href="#" onclick="submitRating(<?php echo $row['id']; ?>, 2)" data-value="2" class="star">&#9733;</a>
  <a href="#" onclick="submitRating(<?php echo $row['id']; ?>, 1)" data-value="1" class="star">&#9733;</a>
</div>

<script>
  // Function to set the selected stars for a product based on its saved rating
// Function to set the selected stars for a product based on its saved rating
function setSelectedStars(productId, savedRating) {
  var stars = document.querySelectorAll('.rating-widget[data-product="' + productId + '"] a.star');
  stars.forEach(function(star) {
    var value = star.getAttribute('data-value');
    star.classList.remove('selected');
    star.classList.remove('disabled');
    star.setAttribute('href', '#');
    star.setAttribute('onclick', 'submitRating(' + productId + ', ' + value + ')');
    if (savedRating && value <= savedRating) {
      star.classList.add('selected');
      star.removeAttribute('href');
      star.removeAttribute('onclick');
    } else if (savedRating && value > savedRating) {
      star.classList.add('disabled');
      star.removeAttribute('href');
      star.removeAttribute('onclick');
    }
  });
}





  // Loop through all the rating widgets and set the selected stars for each product
  var ratingWidgets = document.querySelectorAll('.rating-widget');
  ratingWidgets.forEach(function(widget) {
    var productId = widget.getAttribute('data-product');
    var savedRating = localStorage.getItem("rating_" + productId);
    if (savedRating) {
      setSelectedStars(productId, savedRating);
    }
  });

  // Function to submit the rating for a product
  function submitRating(productId, rating) {
    var url = "submit.php?id=" + productId + "&rating=" + rating;
    var stars = document.querySelectorAll('.rating-widget[data-product="' + productId + '"] a.star');
    stars.forEach(function(star) {
      if (star.getAttribute('data-value') <= rating) {
        star.classList.add('selected');
      }
      if (star.getAttribute('data-value') < rating) {
        star.classList.add('disabled');
        star.removeAttribute('href');
      }
    });
    localStorage.setItem("rating_" + productId, rating);
    stars.forEach(function(star) {
      star.removeAttribute('onclick');
    });
    window.location.href = url; // redirect to the URL
  }

  // Call the setSelectedStars function again after the page has finished loading
  window.onload = function() {
    var ratingWidgets = document.querySelectorAll('.rating-widget');
    ratingWidgets.forEach(function(widget) {
      var productId = widget.getAttribute('data-product');
      var savedRating = localStorage.getItem("rating_" + productId);
      if (savedRating) {
        setSelectedStars(productId, savedRating);
      }
    });
  };
</script>

<style>
.rating-widget a.star.selected {
  color: orange;
}
</style>





					<div class="part-2">
						<h3 class="product-title"><?php echo $row['nom'];?></h3>
            <h4 class="product-old-price"><?php echo $row['genre'];?></h4>
						<h4 class="product-price"><?php echo $row['prix'];?> DT</h4>
					</div>
				</div>
			</div>
			<!-- Single Product -->
			<?php } ?>
		</div>
	</div>
</section>




      </div>
    </section><!-- End Constructions Section -->

 


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