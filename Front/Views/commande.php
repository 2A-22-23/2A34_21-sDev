<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Commande</title>
  <link href="./co.css" rel="stylesheet">
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="print.css" media="print">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>

    <style>
      .popup {
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background-color: #fff;
    border: 1px solid #000;
    padding: 10px;
    z-index: 9999;
}
      </style>
</head>
<body>

<?php
                        include "../core/ProductC.php";
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
                                <div class="cart_item_image">    <img src="../../../YouthSpace/Back/images/<?php echo $row['img'];?>" alt="streamlab-image" style="width: 200px; padding:20px; height:150px "></div>
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
</body>
</html>