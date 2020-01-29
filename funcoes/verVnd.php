<!DOCTYPE html>
<?php
header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1.
header("Pragma: no-cache"); // HTTP 1.0.
header("Expires: 0"); // Proxies.
require_once("../includes/configuracoes.php"); //ok
require_once("../includes/funcoes.php"); //ok
require_once("../includes/verificar.php");
require_once("../includes/conexao.php");
require_once("../includes/listVend.php");
require_once("../includes/listForm.php");
//require_once("../includes/listClie.php");

$session_usuarioLogado = isset ( $_SESSION ["nomeUsuarioSessao"] ) ? $_SESSION ['nomeUsuarioSessao'] : "";
$session_codUsuarioLogado = isset ( $_SESSION ["codUsuarioSessao"] ) ? $_SESSION ['codUsuarioSessao'] : "";
						
$codmovimento = $_GET['codmovimento'];

$sqlMov = "select 
	mov.codmovimento as numero,
	mov.datamov as datamov,
	mov.modalidade as modalidade,
	usu.nome as vendedor,
	cli.nome As cliente,
	mov.vlrtotal as vlrtotal,
	mvi.codproduto as codproduto,
	pro.descricao as produto,
	mvi.qntmov as qntmov,
	mvi.vlrunit vlrunit,
	mvi.vlrtotal totalitem
from movimento mov
inner join movimento_itens mvi ON mov.codmovimento = mvi.codmovimento
left join produtos pro ON pro.codproduto = mvi.codproduto 
left join usuarios usu on usu.codusuario = mov.codusuario
left join clientes cli ON cli.codcliente = mov.codcontato
where mov.codmovimento = " . $codmovimento;
			
$resultMov = pg_query ( $conexao, $sqlMov );
$resultMovItens = pg_query ( $conexao, $sqlMov );

?>	

 <div id="main" class="container-fluid">
  <h4 class="page-header">Visualização de Movimento: <?php echo $codmovimento; ?></h4>
		<table class="table table-striped" cellspacing="0" cellpadding="0">
			<thead>
				<tr>
					<th>Numero</th>
					<th>Modalidade:</th>
					<th>Vendedor:</th>
					<th>Cliente:</th>
					<th>Data:</th>
					<th>Valor Total Vnd:</th>
				</tr>
			</thead>

			<tbody>
				<?php
					$rs = pg_fetch_array($resultMov); 
				?>
				<tr>

					<td><?php print $rs['numero'];?></td>
					<td><?php print $rs['modalidade'];?></td>
					<td><?php print $rs['vendedor'];?></td>
					<td><?php print $rs['cliente'];?></td>
					<td><?php print formata_data($rs['datamov']); ?></td>
					<td><?php print formatarValor($rs['vlrtotal']); ?></td>
				</tr>
			</tbody>
		</table>			
 <hr />
 <h5 class="page-header">Itens da Venda</h5>
 		<table class="table table-striped" cellspacing="0" cellpadding="0">
			<thead>
				<tr>
					<th>CodProduto</th>
					<th>Descricao:</th>
					<th>Quantidade:</th>
					<th>Vlr Unit.:</th>
					<th>Total produto:</th>
				</tr>
			</thead>

			<tbody>
					<?php
						$i = 0;
						
							while ( $obj = pg_fetch_object ($resultMovItens) ) {
					?>
			<tr>
					<td><?php print $obj->codproduto; ?></td>
					<td><?php print $obj->produto; ?></td>
					<td><?php print $obj->qntmov; ?></td>
					<td><?php print formatarValor($obj->vlrunit); ?></td>
					<td><?php print formatarValor($obj->totalitem); ?></td>
 				<?php
					$i ++;
						}
				pg_close($conexao);	
				?>
				</tr>
			</tbody>
		</table>
 <hr />
 <div id="actions" class="row">
   <div class="col-md-12">
     <a href="listaVnd.php" class="btn btn-primary">Voltar</a>
	<!-- <a class="btn btn-default" onclick="return confirm('Tem certeza que deseja deletar este registro?')" href="cancel.php?codmovimento=<?php print $objMov->codmovimento; ?>">Cancelar</a>-->
   </div>
 </div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>