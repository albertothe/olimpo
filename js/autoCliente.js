$(document).ready(function(){ 
    // Atribui evento e função para limpeza dos campos
    $('#EditboxCliente').on('input', limpaCampos);
 
    // Dispara o Autocomplete a partir do segundo caracter
    $( "#EditboxCliente" ).autocomplete({
	    minLength: 1,
	    source: function( request, response ) {
	        $.ajax({
	            url: "../includes/autoCliente.php",
	            dataType: "json",
	            data: {
	            	acao: 'autocomplete',
	                parametro: $('#EditboxCliente').val()
	            },
	            success: function(data) {
	               response(data);
	            }
	        });
	    },
	    focus: function( event, ui ) {
	        $("#EditboxCliente").val( ui.item.nome );
	        carregarDados();
	        return false;
	    },
	    select: function( event, ui ) {
	        $("#EditboxCliente").val( ui.item.nome );
	        return false;
	    }
    })
    .autocomplete( "instance" )._renderItem = function( ul, item ) {
      return $( '<li class="bg-white text-dark">' )
       	.append( '<a class="bg-white text-dark">' + item.nome)
        .appendTo( ul );
    };
   
 
    // Função para carregar os dados da consulta nos respectivos campos
    function carregarDados(){
    	
    	var valor = $('#EditboxCliente').val();
 
    	if(valor != "" && valor.length >= 1){
    		$.ajax({
	            url: "../includes/autoCliente.php",
	            dataType: "json",	
	            data: {
	            	acao: 'consulta',
	                parametro: $('#EditboxCliente').val()
	            },
	            success: function( data ) {
	               $('#codcliente').val(data[0].codcliente);
	               $('#nome').val(data[0].nome);
	               $('#endereco').val(data[0].endereco);
	               $('#cidade').val(data[0].cidade);
	               $('#uf').val(data[0].uf);
	               $('#bairro').val(data[0].bairro);
	               $('#celular').val(data[0].celular);
	               $('#status').val(data[0].status);
	            }
	        });
    	}else if (valor <= 0){
    		alert('Selecione um cliente...');
    	}
    }
    
    // Função para limpar os campos caso a busca esteja vazia
    function limpaCampos(){
       var busca = $('#EditboxCliente').val();
 
       if(busca == ""){
	  	   $('#nome').val('');
           $('#endereco').val('')
           $('#cidade').val('');
           $('#uf').val('');
           $('#bairro').val('');
           $('#celular').val('');
           $('#uf').val('');
           $('#codcliente').val('');
       }
    }
    
});

