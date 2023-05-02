
<?php

   session_start (); 
   ?>

   <head>
   <link href="./hi.css" rel="stylesheet" />

</head>
<body>
<?PHP
include "../entities/Product.php";
include "../core/ProductC.php";
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
</body>
