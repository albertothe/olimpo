function calcularDescontoVenda(){
				//--------------- digitando o valor de desconto geral ---------------------
				var valorPadrao = FormGeral.total.value;
				var valorPadrao = parseFloat(valorPadrao);
				
				var quantidadePadrao = FormGeral.quant.value;
				var quantidadePadrao = parseFloat(quantidadePadrao);
				
				var valorUnitarioPadrao = FormGeral.vlrvnd_rev.value;
				var valorUnitarioPadrao = parseFloat(valorUnitarioPadrao);

				var descontoPercentualVendaGet = FormGeral.percdesc.value;
				var descontoPercentualVendaGet = parseFloat(descontoPercentualVendaGet);
				
				if(descontoPercentualVendaGet > valorPadrao){
					alert(descontoGetF);
					alert('Desconto maior que o valor da venda não permitido!')
					FormGeral.valorLiquido.value = valorLiquidoPadrao;
					FormGeral.saldo_a_pagar.value = valorLiquidoPadrao.toFixed(2);
					return false;
				}
				
				if(descontoPercentualVendaGet > 0){

					var valorDesconto = ((descontoPercentualVendaGet / 100) * (valorUnitarioPadrao * quantidadePadrao));
					var valorLiquidoFin = ((valorUnitarioPadrao * quantidadePadrao) - valorDesconto);
					
					valorDesconto = parseFloat(valorDesconto);
					FormGeral.vlrdesc.value = valorDesconto.toFixed(2);

					valorLiquidoFin = parseFloat(valorLiquidoFin);
					FormGeral.total.value = valorLiquidoFin.toFixed(2);
					
				}else{
					FormGeral.valorLiquido.value = valorLiquidoPadrao;
				}

}
