
function allLetter(word) {
    var letters = /^[A-Za-z]+$/;
    if (word.match(letters)) {
        return true;
    }
    else {
        return false;
    }

    
}

function verif() {
    let titre = document.getElementById("titre").value;
    let type = document.getElementById("type").value;
    let fondateur = document.getElementById("fondateur").value;
    let date = document.getElementById("date").value;

    if (titre === "") {
        console.log("Title cannot be empty");
        return false;
    }

    if (allLetter(titre) === false) {
        console.log("Title can only contain alphabets");
        return false;
    }
    if (type === "") {
        console.log("type cannot be empty");
        return false;
    }

    if (fondateur === "") {
        console.log("fondateur cannot be empty");
        return false;
    }


    if (date === "") {
        console.log("date cannot be empty");
        return false;
    }

    return true;
}
function verif1() {
    let bloc = document.getElementById("bloc").value;
    let numero = document.getElementById("numero").value;
    let etage = document.getElementById("etage").value;


    if (bloc === "") {
        console.log("bloc cannot be empty");
        return false;
    }

    if (allLetter(bloc) === false) {
        console.log("bloc can only contain alphabets");
        return false;
    }

    if (numero === "") {
        console.log("numero cannot be empty");
        document.getElementById("errtel").innerHTML
        return false;
    }
    if (etage === "") {
        console.log("etage cannot be empty");
        return false;
    }

    if (isNaN(etage)) {
        console.log("etage must be a number");
        return false;
    }
    if (isNaN(numero)) {
        console.log("numero must be a number");
        return false;
    }


    return true;
}


