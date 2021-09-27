/**
* Authors: Charlie Sargeant, Ed Sargeant, Jack Swanton, Kelvin Fu, Riley Hempel
* Target: PHP-SRePS
* Purpose: This file is for validating on the forum page.
*/


 "use strict";

 function validate() {

	var errMsg = "";
		var result = true;
		
		if (errMsg != ""){
			alert(errMsg);
		}
	
		var item = document.getElementById("item").value;

		if (!item.match(/^[a-zA-Z]+$/)){
			errMsg = errMsg + "Your first name must only contain alpha characters\n";
			result = false;
		}

		var qty = document.getElementById("qty").value;

		if (isNaN(qty)){
			errMsg = errMsg + "Your quantity must be a number\n";
			result = false;
		}

		var price = document.getElementById("price").value;

		if (isNaN(qty)){
			errMsg = errMsg + "Your price must be a number\n";
			result = false;
		}
	
	return result;
 }

 function init(){
	var addsales = document.getElementById("addsales");
	addsales.onsubmit = validate;
	}


	window.onload = init;