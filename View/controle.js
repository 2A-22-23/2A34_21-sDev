const bloc=document.getElementById('bloc');
const num=document.getElementById('numero');
const etage=document.getElementById('etage');
document.querySelector('form').addEventListner('submit',function(e)
{
    e.preventDefault();
if(!/^[a-zA-Z]+$/.test(bloc.value)){

        alert('bloc doit etre une lettre');
        return;
}
if(!/^\d+$/.test(num.value)){

    alert('bloc doit etre un NUM');
    return;
}

if(!/^[a-zA-Z]+$/.test(etage.value)){

    alert('etage doit etre une lettre');
    return;
}


this.submit();


});