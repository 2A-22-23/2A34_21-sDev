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
<form method="POST" action="cud_ajou.php" name="myForm" onsubmit="return validateForm()">
<table id="example1" class="table table-striped">
<caption></caption>
<tr>
<td>Role</td>
<td><input type="text" name="roles"></td>
</tr>

</tr>
<tr>
<td></td>
<td><input type="submit" value="ajouter" class="btn btn-danger"></td>
</tr>
</table>
</form>