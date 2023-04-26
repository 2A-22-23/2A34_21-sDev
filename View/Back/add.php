
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
    var roles = document.forms["myForm"]["roles"].value;
    
    var errorMessages = document.getElementsByClassName("error-message");
    while (errorMessages.length > 0) {
        errorMessages[0].parentNode.removeChild(errorMessages[0]);
    }
    
    if (roles == "") {
        var errorMessage = document.createElement("div");
        errorMessage.className = "error-message";
        errorMessage.innerHTML = "Le champ role est obligatoire.";
        document.getElementsByName("roles")[0].parentNode.appendChild(errorMessage);
        return false;
    } else if (!/^[a-zA-Z]+$/.test(roles)) {
        var errorMessage = document.createElement("div");
        errorMessage.className = "error-message";
        errorMessage.innerHTML = "Le champ role ne doit contenir que des lettres.";
        document.getElementsByName("roles")[0].parentNode.appendChild(errorMessage);
        return false;
    }
}
</script>


</head>
<body>

    <div id="wrapper">
        <h2 id="titleRegistration">Ajouter un Role</h2>
        <form method="POST" action="cud_ajou.php"  name="myForm" onsubmit="return validateForm()">
            <fieldset id="userInformation">
                <legend>Role  Information</legend>

                <div class="divInformation">
                    <label class="label" for="username">Role:</label>
                    <input type="text" id="roles" name="roles" class="input" placeholder="De 3 à 20 letters " autocomplete="off" autofocus="autofocus"
                    />
                   
                </div>

             

            </fieldset>

            <fieldset id="nextStep">
                <button type="submit" value="ajouter" class="btn btn-danger">Ajouter</button>
            </fieldset> 
        </form>
    </div>

</body>