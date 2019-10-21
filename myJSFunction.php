<html>
<head>
<script>
function myValidation(inputEle, checkValue){
	let name = inputEle.name;
	let vid = "validation." + name;
	let vele = documents.getElementById(vid);
	let value = inputEle.value;
	if(value == checkValue){
		if(vele){
			vele.remove();

		}
	}
	else{
		if(!vele){
			vele = decument.createElement("span");
			vele.id = vid;
			document.body.appendChild(vele);

		}
		vele.innerText = name + "has an invalid value";
	}
	return false;
}
</script>
</head>
</html>

