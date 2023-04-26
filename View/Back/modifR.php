
<?php

   session_start (); 
   ?>

   <head>
   <link href="./hi.css" rel="stylesheet" />
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
<?PHP
include "../../Modal/Role.php";
include "../../Controller/RoleC.php";
if (isset($_GET['id'])){
    $RoleC = new RoleC();
    $result=$RoleC->recupererole($_GET['id']);
    foreach($result as $row){
        $roles=$row['roles'];
      

        
    
?>
    <div id="wrapper">
        <h2 id="titleRegistration">Modifier Role</h2>
        <form method="POST" action="updateR.php" enctype="multipart/form-data" name="myForm" onsubmit="return validateForm()">
            <fieldset id="userInformation">
                <legend>Role  Information</legend>

                <div class="divInformation">
                    <label class="label" for="username">Role:</label>
                    <input type="text" id="roles" name="roles" value="<?PHP echo $roles ?>" class="input" placeholder="From 3 to 20 letters " autocomplete="off" autofocus="autofocus"
                    />
                   
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
