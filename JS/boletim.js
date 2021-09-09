function toogle_disabled(bool)
{
	var input = document.getElementsByTagName('input');

	for(var i=0; i<=(input.length-1); i++ )
	{
		if( input[i].type=='number' ) 
			input[i].disabled = bool;
	}
}

function cancel(bool) {
	var input = document.getElementsByTagName('input');

	for (var i = 0; i <= (input.length - 1); i++) {
		if (input[i].type == 'number') {
			input[i].value = "";
			input[i].disabled = bool;
		}
	}
}

