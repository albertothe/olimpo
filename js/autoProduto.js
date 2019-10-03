$(document).ready(function(){ 
    // Atribui evento e função para limpeza dos campos
    $('#nomeBusca').on('input', limpaCampos);
 
    // Dispara o Autocomplete a partir do segundo caracter
    $( "#nomeBusca" ).autocomplete({
	    minLength: 1,
	    source: function( request, response ) {
	        $.ajax({
	            url: "../includes/autoProduto.php",
	            dataType: "json",
	            data: {
	            	acao: 'autocomplete',
	                parametro: $('#nomeBusca').val()
	            },
	            success: function(data) {
	               response(data);
	            }
	        });
	    },
	    focus: function( event, ui ) {
	        $("#nomeBusca").val( ui.item.descricao );
	        carregarDados();
	        return false;
	    },
	    select: function( event, ui ) {
	        $("#nomeBusca").val( ui.item.descricao );
	        return false;
	    }
    })
    .autocomplete( "instance" )._renderItem = function( ul, item ) {
      return $( '<li class="bg-white text-dark">' )
       	.append( '<a class="bg-white text-dark">' + item.descricao)
        .appendTo( ul );
    };
   
 
    // Função para carregar os dados da consulta nos respectivos campos
    function carregarDados(){
    	
    	var valor = $('#nomeBusca').val();
 
		$.ajax({
            url: "../includes/autoProduto.php",
            dataType: "json",	
            data: {
            	acao: 'consulta',
                parametro: $('#nomeBusca').val()
            },
            success: function( data ) {
               $('#codproduto').val(data[0].codproduto);
               $('#vlrvnd_rev').val(data[0].vlrvnd_rev);
               $('#nomeBusca').val(data[0].descricao);
            }
        });
    }
    
    // Função para limpar os campos caso a busca esteja vazia
    function limpaCampos(){
       var busca = $('#nomeBusca').val();
 
       if(busca == ""){
	  	   $('#codproduto').val('');
	  	   $('#vlrvnd_rev').val('');
           $('#nomeBusca').val('')
       }
    }
    
});

