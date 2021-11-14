var theme = document.getElementById('theme');
theme.addEventListener('click', function(){
	// document.cookie = "theme="+this.getAttribute("data-change-theme")+"; expires=Mon, 30 Sep 2019 12:00:00 UTC; path=/";
	document.cookie = "theme="+this.getAttribute("data-change-theme")+"; max-age="+60*60*24*7+"; path=/";
	window.location.href = window.location.href;
});



var dropDownButton = document.getElementsByClassName('dropdown-button');
for(var k = 0; k < dropDownButton.length; k++){
	dropDownButton[k].addEventListener('click', dropDown);
}
function dropDown(e){
	e.stopPropagation();
	this.nextElementSibling.classList.toggle("hide");
	var pos = this.clientWidth - this.nextElementSibling.clientWidth;
	this.nextElementSibling.style.left = pos + "px";
}
var dropdownBox = document.getElementsByClassName('dropdown-box');
window.addEventListener('click', function(e){
	for(var j = 0; j < dropdownBox.length; j++){
		dropdownBox[j].classList.add('hide');
	}
});


var form = document.forms[0];
var submitButtons = form.querySelector('input[type="submit"]');



function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            input.previousElementSibling.setAttribute('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}

var inputFiles = document.getElementsByClassName('hidden-file');
for(var l = 0; l < inputFiles.length; l++){
	inputFiles[l].addEventListener('change', function(){
    	readURL(this);
	});
}

function searchSubmit(){
	if(document.getElementById('searchbox').value.trim() != ''){
		var searchform = document.getElementById('searchform');
		searchform.submit();
	}
}