"use strict";

// M413 - TD2
let message = 'JavaScript is ok :)';
// alert( message);
console.log( message);

function onLoad() {
	console.log( 'Processus de chargement du document terminé…');
	initSelect();
	//select();
	//select2();
	insertElement();
}

// Toute les ressources de la page sont complètement chargées.
window.onload = onLoad;

////
// 6.1
////
function initSelect() {
	
	/*
	var cherche = document.querySelector('body');
  
	cherche.addEventListener('click', function(event) {
	  event.preventDefault();
	  var couleur = event.target;
	  couleur.style.backgroundColor = 'pink';
	});
	*/
	
	var cherche = document.querySelector('body');
	//cherche.addEventListener('click', select);
	cherche.addEventListener('click', select2);
	
}

function select(event) {
	event.preventDefault();
	var couleur = event.target;
		if (couleur.style.backgroundColor === 'pink') {
		couleur.style.backgroundColor = '';
	} else {
		couleur.style.backgroundColor = 'pink';
	}
}


////
// 6.2
////
/*
document.addEventListener('DOMContentLoaded', function() {
    var div = document.createElement('div');
    div.id = 'insert-div';

	var select = document.createElement('select');
	select.id = 'insert-type';
	select.name = 'type';

	var option1 = document.createElement('option');
	option1.value = 'div';
	option1.text = 'div';
	document.body.appendChild(option1);

	var option2 = document.createElement('option');
	option2.value = 'p';
	option2.text = 'p';
	document.body.appendChild(option2);

	var option3 = document.createElement('option');
	option3.value = 'span';
	option3.text = 'span';
	document.body.appendChild(option3);

	document.body.appendChild(select);

	var input = document.createElement('input');
	input.id = 'insert-text';
	input.type = 'text';
	input.value = 'My New Text Element';
	document.body.appendChild(input);
 
    document.body.appendChild(div);
}, false);
*/

/*
function select2(event){
  var choix = event.target;

  if (choix.id === "insert-div" || choix.closest("#insert-div")) {
    return;
  }

  var selectedElements = document.querySelectorAll(".selected");
  for (var i = 0; i < selectedElements.length; i++) {
    selectedElements[i].classList.remove("selected");
    selectedElements[i].style.backgroundColor = "";
  }

  choix.classList.add("selected");
  choix.style.backgroundColor = "violet";

  insertElement(target);
}
*/

function select2(event){
	var no = document.getElementById(insert-type);
	var choix = target;

	if (choix.id == no || choix.id == no.children){
		return;
	}
	else {
		var select = document.querySelectorAll(".selection");
		for (var i=0; i<select.length; i++){
			select[i].classList.remove("selection");
			select[i].style.backgroundColor="violet";
		}

		choix.classList.add("selection");
		choix.style.backgroundColor="red";
	}
}


function insertElement(target){
	var elementType = document.querySelector("#insert-type").value;
	var elementText = document.querySelector("#insert-text").value;

	var newElement = document.createElement(elementType);
	newElement.textContent = elementText;

	target.parentNode.insertBefore(newElement, target);
}


/*
function select2(event) {
// Désélectionner tous les autres éléments sélectionnés
var selectedElements = document.querySelectorAll('.selected');
for (var i = 0; i < selectedElements.length; i++) {
	selectedElements[i].style.backgroundColor = ''; // Supprimer la couleur de fond
	selectedElements[i].classList.remove('selected');
}

// Récupérer l'élément qui a été cliqué
var targetElement = event.target;

// Ajouter la classe 'selected' et la couleur de fond à l'élément qui a été cliqué
targetElement.style.backgroundColor = 'blue';
targetElement.classList.add('selected');
}
*/
