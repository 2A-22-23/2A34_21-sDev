<!DOCTYPE html>
<html lang="en">

<?php include 'head.php'; ?>
    
<body>
<?php include 'header.php'; ?>

<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs d-flex align-items-center" style="background-image: url('assets/img/breadcrumbs-bg.jpg');">
      <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">

        <h2>Commande</h2>
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
  </main><!-- End #main -->

<?php
                        
                        require_once(__DIR__ . '/../../Controller/proC.php'); 
                        $ProductC=new ProductC();
                     
                        $listemovieQuery = $ProductC->Afficherpaniers(); 
                        
                        
                        // the PDOStatement object returned by the function
                        $listemovie = $listemovieQuery->fetchAll(PDO::FETCH_ASSOC); // fetch the results and store them in an array
                        
                        $total = 0;
                        $numItems = count($listemovie);
                    
                        ?>
  <div class="cart_section">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="cart_container">
                    <div class="cart_title">Shopping Cart<small> (<?php echo $numItems; ?> item in your cart) </small></div>
                    <div class="cart_items">
                      
                         <?PHP


foreach($listemovie as $row)
{
  $total += $row['prix'];
?>


                        <ul class="cart_list">
                       
                            <li class="cart_item clearfix">
                                <div class="cart_item_image">    <img src="../Back/maryem/images/<?php echo $row['img'];?>" alt="streamlab-image" style="width: 200px; padding:20px; height:150px "></div>
                                <div class="cart_item_info d-flex flex-md-row flex-column justify-content-between">
                                    <div class="cart_item_name cart_info_col">
                                        <div class="cart_item_title">Name</div>
                                        <div class="cart_item_text"><?php echo $row['nom'];?></div>
                                       
                                    </div>
                                    <div class="cart_item_color cart_info_col">
                                        <div class="cart_item_title">Genre</div>
                                        <div class="cart_item_text"><span style="background-color:#999999;"></span><?php echo $row['genre'];?></div>
                                    </div>
                                   
                                    <div class="cart_item_price cart_info_col">
                                        <div class="cart_item_title">Price</div>
                                        <div class="cart_item_text"><?php echo $row['prix'];?>Dt</div>
                                    </div>
                                    
                                </div>
                            </li>
                        </ul>
                        
                        <?PHP
              
            }
            ?>
           
                    </div>
                    <div class="order_total">
                        <div class="order_total_content text-md-right">
                            <div class="order_total_title">Order Total:</div>
                            <div class="order_total_amount"><?php echo $total;?> DT</div>
                        </div>
                    </div>

          
                    <button type="button" class="button cart_button_clear" onclick="addOrder()">Place Order</button>


                    <div class="cart_buttons"> 
                    <button type="button" class="button cart_button_clear" id="continueShoppingButton">Continue Shopping</button>

<script>
document.getElementById("continueShoppingButton").addEventListener("click", function() {
  window.location.href = "Produit.php";
});
</script>


<script>
function addOrder() {
    // Define an empty array to store the IDs of the products in the cart
    var productIDs = [];
    
    // Loop through the list of products in the cart
    <?php foreach($listemovie as $row) { ?>
        // Add the current product ID to the array
        productIDs.push(<?php echo $row['product_id']; ?>);
    <?php } ?>
    
    // Hide the button
    document.querySelector(".cart_button_clear").style.display = "none";

    // Show a popup message indicating that the order has been placed
    var popup = document.createElement("div");
    popup.classList.add("popup");
    popup.innerText = "Order placed!";
    document.body.appendChild(popup);

    // Store a flag in local storage indicating that the order has been placed
    localStorage.setItem("orderPlaced", "true");

    // Redirect the user to the addcomande.php page with the product IDs as a query parameter after a delay
    setTimeout(function() {
        window.location.href = "addcomande.php?id=" + productIDs.join(",");
    }, 2000); // Wait for 2 seconds before redirecting
}

// Check local storage on page load to see if an order has already been placed
window.addEventListener("load", function() {
    if (localStorage.getItem("orderPlaced") === "true") {
        // Hide the button
        document.querySelector(".cart_button_clear").style.display = "none";
    }
});
</script>




                    <!-- HTML code for the button -->
<!-- HTML code for the button -->
<button type="button" class="button cart_button_checkout" onclick="sendEmail(); printAndSavePDF();">Commandé</button>



<script>
function printAndSavePDF() {
  // Print the page
  window.print();
  
  // Wait for the print dialog to close
  setTimeout(function() {
    // Use html2canvas to capture a screenshot of the content
    html2canvas(document.getElementById("content")).then(function(canvas) {
      // Create a new jsPDF instance
      var pdf = new jsPDF('p', 'mm', 'a4');
      
      // Add the screenshot to the PDF
      pdf.addImage(canvas.toDataURL('image/png'), 'PNG', 0, 0, 211, 298);
      
      // Save the PDF
      pdf.save('page.pdf');
    });
  }, 1000); // Increase this delay if necessary
}
</script>

<!-- JavaScript code for sending the email -->
<script>
function sendEmail() {
  // create AJAX request object
  var xhttp = new XMLHttpRequest();

  // set callback function
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      // display success message
      alert(this.responseText);
    }
  };

  // send AJAX request to PHP script
  xhttp.open("GET", "send_email.php", true);
  xhttp.send();
}


</script>


                     </div>
                </div>
            </div>
        </div>
    </div>
</div>
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



</body>
</html>