
<?php

   session_start (); 
   ?>

   <head>
   <link href="./hi.css" rel="stylesheet" />
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

</head>
<body>

    <div id="wrapper">
        <h2 id="titleRegistration">ADD FORM</h2>
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

</body>