<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="css/cssBox.css" /><style type="text/css">
body{
				  background-image:url("img/new1.jpg");
				  background-repeat: no-repeat;
				  background-attachment: fixed;
				  background-position: center center;
				  -webkit-background-size: cover;
				  -moz-background-size: cover;
				  background-size: cover;
				  -o-background-size: cover;
			}	form{	width:440px;	padding:25px;
	margin:auto;		}		input{	color: #fff;
  background-color: #337ab7;
  border-color: #2e6da4;		font-size:15px;
	padding-top:15px;
	padding-bottom:15px;
	padding-left:19px;
	padding-right:19px;	margin:6px;
	
	border-radius:5px;	}
		h2{	text-align:center;	}	
	
		.sc{	background:#fff;	color:#000;	}
</style><script>
function add_value(input, character) {
	if(input.value == null || input.value == "0")
		input.value = character
	else
		input.value += character
}

function cos(form) {
	form.display.value = Math.cos(form.display.value);
}

function sin(form) {
	form.display.value = Math.sin(form.display.value);
}

function tan(form) {
	form.display.value = Math.tan(form.display.value);
}

function sqrt(form) {
	form.display.value = Math.sqrt(form.display.value);
}

function ln(form) {
	form.display.value = Math.log(form.display.value);
}

function exp(form) {
	form.display.value = Math.exp(form.display.value);
}

function deleteChar(input) {
	input.value = input.value.substring(0, input.value.length - 1)
}

function changeSign(input) {
	if(input.value.substring(0, 1) == "-")
		input.value = input.value.substring(1, input.value.length)
	else
		input.value = "-" + input.value
}

function compute(form) {
	form.display.value = eval(form.display.value)
}

function square(form) {
	form.display.value = eval(form.display.value) * eval(form.display.value)
}

function checkNum(str) {
	for (var i = 0; i < str.length; i++) {
		var ch = str.substring(i, i+1)
		if (ch < "0" || ch > "9") {
			if (ch != "/" && ch != "*" && ch != "+" && ch != "-" && ch != "."
				&& ch != "(" && ch!= ")") {
				alert("invalid entry!")
				return false
				}
			}
		}
		return true
}
</script></head>
<body><br>
<form name="scientific_calculator" class="bg-black-fade border-shadow">
<div class="bg-black-fade"><h2 class="text-bold text-white pad-10 ">PHARMACY CALCULATOR</h2></div>

<table cellspacing="0" cellpadding="1">
<tr>
<td colspan="5" align="center"><input name="display" class="sc" value="0" size="44" maxlength="25"></td>
</tr>
<tr>                                  
<td align="center"><input type="button" value="Clear" onclick="this.form.display.value = 0 "></td>
<td align="center" colspan="2"><input type="button" value="        Cancel       " onclick="deleteChar(this.form.display)"></td>
<td align="center" colspan="2"><input type="button" value="              =             " NAME="Enter" onclick="if (checkNum(this.form.display.value)) { compute(this.form) }"></td>
</tr> 
<tr>
<td align="center"><input type="button" value=" exp " onclick="if (checkNum(this.form.display.value)) { exp(this.form) }"></td>
<td align="center"><input type="button" value="  7  " onclick="add_value(this.form.display, '7')"></td>
<td align="center"><input type="button" value="  8  " onclick="add_value(this.form.display, '8')"></td>
<td align="center"><input type="button" value="  9  " onclick="add_value(this.form.display, '9')"></td>
<td align="center"><input type="button" value="   /   " onclick="add_value(this.form.display, '/')"></td>
</tr>                                  
<tr>                                   
<td align="center"><input type="button" value="  ln   " onclick="if (checkNum(this.form.display.value)) { ln(this.form) }"></td>
<td align="center"><input type="button" value="  4  " onclick="add_value(this.form.display, '4')"></td>
<td align="center"><input type="button" value="  5  " onclick="add_value(this.form.display, '5')"></td>
<td align="center"><input type="button" value="  6  " onclick="add_value(this.form.display, '6')"></td>
<td align="center"><input type="button" value="   *   " onclick="add_value(this.form.display, '*')"></td>
</tr>                                   
<tr>                                    
<td align="center"><input type="button" value=" sqrt " onclick="if (checkNum(this.form.display.value)) { sqrt(this.form) }"></td>
<td align="center"><input type="button" value="  1  " onclick="add_value(this.form.display, '1')"></td>
<td align="center"><input type="button" value="  2  " onclick="add_value(this.form.display, '2')"></td>
<td align="center"><input type="button" value="  3  " onclick="add_value(this.form.display, '3')"></td>
<td align="center"><input type="button" value="   -   " onclick="add_value(this.form.display, '-')"></td>
</tr>                                  
<tr>                                   
<td align="center"><input type="button" value="  sq  " onclick="if (checkNum(this.form.display.value)) { square(this.form) }"></td>
<td align="center"><input type="button" value="  0  " onclick="add_value(this.form.display, '0')"></td>
<td align="center"><input type="button" value="   .  " onclick="add_value(this.form.display, '.')"></td>
<td align="center"><input type="button" value=" +/- " onclick="changeSign(this.form.display)"></td>
<td align="center"><input type="button" value="   +  " onclick="add_value(this.form.display, '+')"></td>
</tr>                                  
<tr>                                   
<td align="center"><input type="button" value="   (    " onclick="add_value(this.form.display, '(')"></td>
<td align="center"><input type="button" value="cos" onclick="if (checkNum(this.form.display.value)) { cos(this.form) }"></td>
<td align="center"><input type="button" value=" sin " onclick="if (checkNum(this.form.display.value)) { sin(this.form) }"></td>
<td align="center"><input type="button" value=" tan" onclick="if (checkNum(this.form.display.value)) { tan(this.form) }"></td>
<td align="center"><input type="button" value="   )   " onclick="add_value(this.form.display, ')')"></td>
</tr>                                 
</table>

</form>

</body>

</html>