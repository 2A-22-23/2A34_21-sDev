
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
<?PHP
include "./adminHeader.php";
include "./sidebar.php";
include "../../../model/Product.php";
include "../../../controller/ProductC.php";
if (isset($_GET['id'])){
    $ProductC = new ProductC();
    $result=$ProductC->recupereproduit($_GET['id']);
    foreach($result as $row){
        $nom=$row['nom'];
        $descriptions=$row['descriptions'];
        $genre=$row['genre'];
        $prix=$row['prix'];
        $img=$row['img'];

        
    
?>
    <div id="wrapper">
        <h2 id="titleRegistration">Modifier FORM</h2>
        <form method="POST" action="modifierpro.php" enctype="multipart/form-data">
            <fieldset id="userInformation">
                <legend>Produit  Information</legend>

                <div class="divInformation">
                    <label class="label" for="username">Nom:</label>
                    <input type="text" id="nom" name="nom" value="<?PHP echo $nom ?>" class="input" placeholder="From 3 to 20 letters or numbers" autocomplete="off" autofocus="autofocus"
                    />
                   
                </div>

                <div class="divInformation">
                    <label class="label" for="firstName">Description:</label>
                    <textarea type="text" id="descriptions" name="descriptions" value="<?PHP echo $descriptions ?>" class="input" placeholder="From 3 to 20 letters or numbers" autocomplete="off" style="resize: none; width :50%;   height: 60px; " > <?PHP echo $descriptions ?> </textarea>
                    
                </div>

                <div class="divInformation">
                    <label class="label" for="lastName">genre:</label>
                    <input type="text" id="genre" name="genre" value="<?PHP echo $genre ?>" class="input" placeholder="Only letters allowed" autocomplete="off" />
                  
                </div>

                <div class="divInformation">
                    <label class="label" for="email">prix:</label>
                    <input type="text" id="prix" name="prix"  value="<?PHP echo $prix ?>" class="input" placeholder="Only Numbers allowed" autocomplete="off" />
                    
                </div>
                <div class="divInformation">
                    <label class="label" for="img">Current Image:</label>
                    <img src="../images/<?php echo $row['img'];?>"   style="  width:100px; height:55%; margin-left:170px; ">
                  
                </div>

                <div class="divInformation">
                    <label class="label" for="img">Image:</label>
                    <input type="file" id="img" name="img" value="<?php echo $img; ?>" class="input" placeholder="Between 5 and 15 symbols" autocomplete="off" />
                  
                </div>

            </fieldset>

            <fieldset id="nextStep">
                <button type="submit" name="modifier" value="modifier">Modifier</button>
                <input type="hidden" name="id" value="<?PHP echo $_GET['id'];?>">
            </fieldset> 
        </form>
    </div>
    <?PHP
    }
}


?>
<style>
    form {
        margin: 0 auto;
        width: 50%;
        text-align: center; /* Ajout d'un alignement centré pour les boutons */
    }
    label {
        display: inline-block;
        width: 20%;
        margin-bottom: 5px;
        text-align: right; /* Ajout d'un alignement à droite pour les labels */
    }
    input[type="text"], textarea, input[type="number"] {
        display: inline-block;
        width: 75%;
        padding: 5px;
        border-radius: 5px;
        border: 1px solid #ccc;
        margin-bottom: 10px;
    }
    #alerte {
        display: inline-block;
        color: red;
        margin-bottom: 10px;
        text-align: center;
    }
    .btn-container {
        margin-top: 10px; /* Ajout d'une marge supérieure pour le conteneur */
        text-align: center; /* Ajout d'un alignement centré pour le conteneur */
    }
    input[type="submit"], input[type="reset"] {
        background-color: #3b3131;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        margin-right: 10px;
    }
    label[for="contenu"], #contenu {
        display: inline-block;
        vertical-align: top;
    }
</style>

<script type="text/javascript" src="./assets/js/ajaxWork.js"></script>    
    <script type="text/javascript" src="./assets/js/script.js"></script>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
</body>
