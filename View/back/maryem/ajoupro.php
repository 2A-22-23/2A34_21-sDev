<?php

   session_start (); 
   ?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .error-message {
            color: red;
            font-size: 12px;
            margin-top: 5px;
        }
    </style>
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
        if (prix == "") {
            var errorMessage = document.createElement("div");
            errorMessage.className = "error-message";
            errorMessage.innerHTML = "Le champ prix est obligatoire.";
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

</head>
<form method="POST" action="cud_ajou.php" enctype="multipart/form-data" name="myForm" onsubmit="return validateForm()">
<table id="example1" class="table table-striped">
<caption></caption>
<tr>
<td>nom</td>
<td><input type="text" name="nom"></td>
</tr>
<tr>
<td>descriptions</td>
<td><input type="text" name="descriptions"></td>
</tr>
<tr>
<td>genre</td>
<td><input type="text" name="genre"></td>
</tr>
<tr>
<td>prix</td>
<td><input type="text" name="prix"></td>
</tr>
<tr>
<td>img</td>
<td><input type="file" name="img"></td>
</tr>

</tr>
<tr>
<td></td>
<td><input type="submit" value="ajouter" class="btn btn-danger"></td>
</tr>
</table>
</form>