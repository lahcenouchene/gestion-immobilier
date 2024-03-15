var hide=document.getElementById("hide");
hide.style.display = 'none';
var hide2=document.getElementById("hide2");
hide2.style.display = 'none';



var type=document.getElementById("type");

var nomS=document.getElementById("nomS");
var numR=document.getElementById("numR");
var numG=document.getElementById("numG");


var nomS=document.getElementById("nomE");
var numR=document.getElementById("numIN");
var numG=document.getElementById("staus_juridique");
var gridCheck=document.getElementById("gridCheck");


/* 
function verif_formulaire1()
{
	if(gridCheck.checked==false){ 
		alert("veuillez accepter nos conditions d'utilisations");
		return false;
	}else{
		return true;
	}
   

} */
function verif_formulaire1() {
	if (gridCheck.checked == false) { 
	  Swal.fire({
		icon: 'error',
		title: 'Oops...',
		text: "Veuillez accepter nos conditions d'utilisation",
	  });
	  return false;
	} else {
	  return true;
	}
  }
  

type.addEventListener("click", function () {
	if (type.options[type.selectedIndex].value == "agence") {
		hide.style.display = 'inline';
		hide2.style.display='none';
	} else if (type.options[type.selectedIndex].value == "client") {
		hide.style.display = 'none';
		hide2.style.display='none';
	} else if (type.options[type.selectedIndex].value == "particulier") {
		hide.style.display = 'none';
		hide2.style.display='none';
	} else if(type.options[type.selectedIndex].value =="promoteur") {
		hide2.style.display = 'inline';
		hide.style.display='none';
	}else{
		hide2.style.display = 'none';
		hide.style.display='none';
	}
})


