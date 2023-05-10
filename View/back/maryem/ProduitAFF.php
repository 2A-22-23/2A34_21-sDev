
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


<?php
session_start (); 
?>


<!DOCTYPE html>
<html>
<head>
  <title>Admin</title>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
       <link rel="stylesheet" href="./assets/css/style.css"></link>
       <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="print.css" media="print">
  </head>
</head>

<body>
  <?php
                include_once "./adminHeader.php";
                include_once "./sidebar.php";
  ?>

    <h2>Products</h2>

        <?php
        // Include the ProductC class
        
      include "../../../controller/ProductC.php";

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
                        <td><a><img class="" src="./images/<?= $row['img'] ?>" style="width: 100px; height:100px;"></a></td>
                        <td><?= $row['prix'] ?> DT</td>
                        <td><?= $row['descriptions'] ?></td>
                        <td><?= $row['genre'] ?></td>
                        <td>
                            <button style="background: none; border: none;">
                                <a href="modifierpros.php?id=<?= $row['id'] ?>" style="color: black; display: inline-block;">
                                    <img class="" src="../assets/img/pencill.png" style="margin-right: 5px; vertical-align: middle;">
                                    Modifier
                                </a>
                            </button>

                            <form method="POST" action="suppP.php" style="margin-top:30px">
                                <input type="hidden" value="<?= $row['id'] ?>" name="id">
                                <button type="submit" name="supprimer" style="background: none; border: none;">
                                    <img class="" src="../assets/img/trash.png" style="margin-right: 5px; vertical-align: middle;">
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


  <div class="container" style="width:1360px;">
   <h2 align="center">voici notre statistique</h2>
   <h3 align="center">statistique de notation </h3>   
   <br /><br />
   <div id="chart"></div>
  </div>

    <script type="text/javascript" src="./assets/js/ajaxWork.js"></script>    
    <script type="text/javascript" src="./assets/js/script.js"></script>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
  </body>




</html>