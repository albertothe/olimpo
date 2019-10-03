<html>
<head>
<script type="text/javascript" src="jquery.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>
$(document).ready(function() {
	  var $txtEntrada = $("#txtEntrada");
	  var $txtSaida = $("#txtSaida");

	  $txtEntrada.on('click', function() {
	    $txtSaida.attr('disabled', 'disabled');
	  });

	  $txtSaida.on('click', function() {
	    $txtEntrada.attr('disabled', 'disabled');
	  });
	});
</script>
</head>
<body>

<input type="text" id="txtEntrada" name="entrada">
<input type="text" id="txtSaida" name="saida">
</body>
</html>