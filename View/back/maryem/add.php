
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
            include "./adminHeader.php";
            include "./sidebar.php";
            ?>


    <script>
        function validateForm() {
            var nom = document.forms["myForm"]["nom"].value;
            var descriptions = document.forms["myForm"]["descriptions"].value;
            var genre = document.forms["myForm"]["genre"].value;
            var prix = document.forms["myForm"]["prix"].value;
            var img = document.forms["myForm"]["img"].value;
            
            var errorMessages = document.getElementsByClassName("error-message");
        while (errorMessages.length > 0) {
            errorMessages[0].parentNode.removeChild(errorMessages[0]);
        }



            if (nom == "") {
            var errorMessage = document.createElement("div");
            errorMessage.className = "error-message";
            errorMessage.innerHTML = "Le champ nom est obligatoire.";
            document.getElementsByName("nom")[0].parentNode.appendChild(errorMessage);
        }
        if (descriptions == "") {
            var errorMessage = document.createElement("div");
            errorMessage.className = "error-message";
            errorMessage.innerHTML = "Le champ descriptions est obligatoire.";
            document.getElementsByName("descriptions")[0].parentNode.appendChild(errorMessage);
        }
        if (genre == "") {
            var errorMessage = document.createElement("div");
            errorMessage.className = "error-message";
            errorMessage.innerHTML = "Le champ genre est obligatoire.";
            document.getElementsByName("genre")[0].parentNode.appendChild(errorMessage);
        }
        var prixRegex = /^\d+(\.\d{1,2})?$/;
        if (prix == "" || !prixRegex.test(prix)) {
    var errorMessage = document.createElement("div");
    errorMessage.className = "error-message";
    errorMessage.innerHTML = "Le champ prix est obligatoire et doit être un nombre ou une valeur flottante (ex: 12.50).";
    document.getElementsByName("prix")[0].parentNode.appendChild(errorMessage);
}
        if (img == "") {
            var errorMessage = document.createElement("div");
            errorMessage.className = "error-message";
            errorMessage.innerHTML = "Le champ image est obligatoire.";
            document.getElementsByName("img")[0].parentNode.appendChild(errorMessage);
        }

        if (nom == "" || descriptions == "" || genre == "" || prix == "" || img == "") {
            return false;
        }
    }
</script>
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

    <div id="wrapper">
        <h2 id="titleRegistration">ADD PRODUCT</h2>
        <form method="POST" action="cud_ajou.php" enctype="multipart/form-data" name="myForm" onsubmit="return validateForm()">
            <fieldset id="userInformation">
                <legend>Produit  Information</legend>

                <div class="divInformation">
                    <label class="label" for="username">Nom:</label>
                    <input type="text" id="nom" name="nom" class="input" placeholder="From 3 to 20 letters or numbers" autocomplete="off" autofocus="autofocus"
                    />
                   
                </div>

                <div class="divInformation">
                    <label class="label" for="firstName">Description:</label>
                    <textarea type="text" id="descriptions" name="descriptions" class="input" placeholder="From 3 to 20 letters or numbers" autocomplete="off" style="resize: none; width :50%;   height: 60px; " ></textarea>
                    
                </div>

                <div class="divInformation">
                    <label class="label" for="lastName">genre:</label>
                    <input type="text" id="genre" name="genre" class="input" placeholder="Only letters allowed" autocomplete="off" />
                  
                </div>

                <div class="divInformation">
                    <label class="label" for="email">prix:</label>
                    <input type="text" id="prix" name="prix" class="input" placeholder="Only Numbers allowed" autocomplete="off" />
                    
                </div>

                <div class="divInformation">
                    <label class="label" for="password">Image:</label>
                    <input type="file" id="img" name="img" class="input" placeholder="Between 5 and 15 symbols" autocomplete="off" />
                  
                </div>

            </fieldset>

            <fieldset id="nextStep">
                <button type="submit" value="ajouter" class="btn btn-danger">Ajouter</button>
            </fieldset> 
        </form>
    </div>
    <script type="text/javascript" src="./assets/js/ajaxWork.js"></script>    
    <script type="text/javascript" src="./assets/js/script.js"></script>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>

</body>