// JavaScript Document
//Declare variables
var elList,addLink, newEl,newText, counter, listItems;
var nameId;
//Initialize variables to action elements
elList = document.getElementById('list');
addLink = document.getElementById('addToList');
counter = document.getElementById('counter');
nameId;
//Declare function to process newly added item

function addItem(e,s){
	var but;
	e.preventDefault();//Prevent link action if page is not ready
	but = document.createElement('button');
	but.setAttribute("type","button");
	but.classList.add("close");
	but.innerHTML = "<span>X</span>";
	but.addEventListener('click',remove,false);
	newEl = document.createElement('div'); //create new div inside shopping list
	newText = document.createTextNode(s); // Text to display inside div
	newEl.classList.add("alert"); //add alert class to div
	newEl.classList.add("alert-info"); //add alert-info to div
	newEl.appendChild(newText);//add text to div
	var newdiv = document.createElement('div');
	newdiv.appendChild(but);
	newdiv.appendChild(newEl);
	elList.appendChild(newdiv);
	updateCounter();
	
}

function remove(e){
	elList.removeChild(e.target.parentElement.parentElement);
	console.log("BRAH");
	updateCounter();
}
//create a function to update shopping list counter
function updateCounter(){
	console.log("BRAH");
	listItems = elList.getElementsByTagName('div').length/2; //get total number of divs in our list
	counter.innerHTML = listItems;//update the shopping list count
	
}

function check(e){
	var inp = document.getElementById('itemName');
	var s = inp.value;
	if (s.length===0){
		return;
	}
	
	addItem(e,s);
}
addLink.addEventListener('click', function(){check(event);}, false); // listen for the click event on the button
elList.addEventListener('DOMNodeInserted',updateCounter,false);// Listening for DOM to be updated


