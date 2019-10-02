<html>
<head>
<script type="text/javascript" src="jquery.js"></script>
<script>
document.addEventListener('click', function(e) {
	  
	  var self = e.target;
	  
	  if(['entrada','saida'].indexOf(self.id) !== -1) {
	    var el = document.getElementById(self.id === 'entrada' ? 'saida' : 'entrada');
	    
	    self.removeAttribute('disabled');
	    
	    el.setAttribute('disabled','');
	    el.value = "";
	  }
	})
</script>
</head>
<body>
<input type="text" id="entrada" name="entrada">     
<input type="text" id="saida" name="saida">
</body>
</html>