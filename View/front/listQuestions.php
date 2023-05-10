<?php
    require '../../Controller/questionC.php';
    $questionC = new questionC();
    $list = $questionC->listQuestions();
?>


<!DOCTYPE html>
<html lang="en">

<?php include 'head.php'; ?>
    
<body>
<?php include 'header.php'; ?>

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs d-flex align-items-center" style="background-image: url('assets/img/breadcrumbs-bg.jpg');">
      <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">

        <h2>Forum</h2>
        <ol>
          <li><a href="index2.php">Home</a></li>
          <li>Forum</li>
        </ol>

      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="row position-relative">

        </div>
    </section>
    <!-- End About Section -->


  </main><!-- End #main -->
    
  <form method="GET" style="text-align: center;">
  <div class="form-group row">
    <div>
      <input type="search" name="search" class="DocSearch-Input" placeholder="Search By Title">
    </div>
    <br>
    <br>
    <div>
      <div style="display: inline-block;">
        <button class="btn btn-success" type="submit" style="background-color: black;"><i class="fa fa-search"></i></button>
      </div>
    </div>
  </div>
</form>


<br>
<br>

<div style="text-align: center;">
    </div>
    <br><br><br>
    <iframe src="https://www.facebook.com/plugins/share_button.php?href=https%3A%2F%2F0e85-154-107-246-183.ngrok-free.app%2Fprojet%2FView%2FFront%2FlistQuestions.php&layout&size&width=91&height=20&appId" width="91" height="20" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
    <style>
      iframe {
        display: block;
        margin: auto;
        text-align: center;
        top: 0;
        left: 0;
        bottom: 0;
        right: 0;
      }

    </style>
    <br>
    <br>
    <?php foreach ($list as $row){ ?>
    <?php 
          require 'likesCount.php';
          require 'dislikesCount.php';
          $titre = $questionC->censorBadWords($row['titre']);
          $contenue = $questionC->censorBadWords($row['contenu']); 
    ?>
    <div class="card text-center">
        <div class="card-header">
        <h2><?= $row['id_auteur'] ?></h2>
        </div>
        <div class="card-body">
            <a href="showOnce.php?idQuestion=<?= $row['idQuestion'] ?>"> <h5 class="card-title"> <?= $titre ?> </h5> </a>
            <p class="card-text"> <?= $contenue ?> </p>
            <a href="deleteQuestion.php?idQuestion=<?= $row['idQuestion'] ?>" style="background-color: #ff0000;" class="btn btn-primary">
            <i class="fa fa-trash" aria-hidden="true"></i></a>
            <a href="updateQuestion.php?idQuestion=<?= $row['idQuestion'] ?>" style="background-color: #fcc903;" class="btn btn-primary">
            <i class="fa fa-pencil" aria-hidden="true"></i></a>
            <a href="showOnce.php?idQuestion=<?= $row['idQuestion'] ?>" style="background-color: #fcc903;" class="btn btn-primary">
            <i class="fa fa-reply" aria-hidden="true"></i></a>
            <a href="report.php?idQuestion=<?= $row['idQuestion'] ?>" style="background-color: #ff0000;" class="btn btn-primary">
            <i class="fa fa-flag" aria-hidden="true"></i></a>
            <br><br>
            <button class="btn-like" style="background-color: #22ff00;" data-question-id="<?= $row['idQuestion'] ?>"><i class="fa fa-thumbs-up" aria-hidden="true"></i></button>
            <span class="likes-count"><?=$likesCount?></span>

            <button class="btn-dislike" style="background-color: #bcbcbc;" data-question-id="<?= $row['idQuestion'] ?>"><i class="fa fa-thumbs-down" aria-hidden="true"></i></button>
            <span class="dislikes-count"><?=$dislikesCount?></span>

        </div>
        <div class="card-footer text-muted">
            <p><?= $row['date_publication'] ?></p>
        </div>
    </div>
    <br>
    <hr style="border: 5px solid black;">
    <br>
    <?php
    }
    ?>
    <script>
      $(document).ready(function() {
        $('.btn-like').click(function(e) {
          e.preventDefault();
          var questionId = $(this).data('question-id');
          $.ajax({
            type: 'GET',
            url: 'like.php',
            data: {idQuestion: questionId},
            success: function(data) {
              var likesCount = parseInt($('.likes-count[data-question-id='+questionId+']').text()) + 1;
              $('.likes-count[data-question-id='+questionId+']').text(likesCount);
            }
          });
        });

        $('.btn-dislike').click(function(e) {
          e.preventDefault();
          var questionId = $(this).data('question-id');
          $.ajax({
            type: 'GET',
            url: 'dislike.php',
            data: {idQuestion: questionId},
            success: function(data) {
              var dislikesCount = parseInt($('.dislikes-count[data-question-id='+questionId+']').text()) + 1;
              $('.dislikes-count[data-question-id='+questionId+']').text(dislikesCount);
            }
          });
        });
      });

    </script>

        
<br>
<br>
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

</html>