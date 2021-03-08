function countLines() {
  var divHeight = document.getElementById('content').offsetHeight
  var lineHeight = parseInt(document.getElementById('content').style.lineHeight);
  var lines = divHeight / lineHeight;
  alert("Lines: " + lines);
}

/*Ajax

function msgcmt(method,elem,url,param,box,btn){
	if(window.XMLHttpRequest){
		change = new XMLHttpRequest();
	}else{
		change = new ActiveXObject('Microsoft.XMLHttp');
	}
	
	change.onreadystatechange = function(){
		if(change.readyState==4 && change.Status==200){
			document.getElementById(elem).innerHTML = change.responseText;
		}
	}
	change.open(method,url,true);
	change.setRequestHeader('Content-type','application/xml-www-form-urlencoded');
	change.send(param);
	document.getElementById(box).value = '';
	document.getElementById(btn).setAttribute('disabled','disabled');
}
*/