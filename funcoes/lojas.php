<?php
header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1.
header("Pragma: no-cache"); // HTTP 1.0.
header("Expires: 0"); // Proxies.
require_once("../includes/configuracoes.php"); //ok
require_once("../includes/funcoes.php"); //ok
require_once("../includes/verificar.php");
require_once("../includes/conexao.php");

//Usuario da sessão

$session_usuarioLogado = isset ( $_SESSION ["nomeUsuarioSessao"] ) ? $_SESSION ['nomeUsuarioSessao'] : "";

$postTipoAcao = isset ( $_POST ['tipoacao'] ) ? $_POST ['tipoacao'] : "";
$getTipoAcao = isset ( $_GET ['tipoacao'] ) ? $_GET ['tipoacao'] : "";

$postIdLoja = isset ( $_POST ['idloja'] ) ? $_POST ['idloja'] : "";
$getIdLoja = isset ( $_GET ['idloja'] ) ? $_GET ['idloja'] : "";

$idLoja;
if ($postIdLoja == "") {
	$idLoja = $getIdLoja;
} else {
	$idLoja = $postIdLoja;
}

//Coletando dados do formulario
$loja = isset ( $_POST ['loja'] ) ? $_POST ['loja'] : "";
$endereco = isset ( $_POST ['endereco'] ) ? $_POST ['endereco'] : "";
$bairro = isset ( $_POST ['bairro'] ) ? $_POST ['bairro'] : "";
$cidade = isset ( $_POST ['cidade'] ) ? $_POST ['cidade'] : "";
$uf = isset ( $_POST ['uf'] ) ? $_POST ['uf'] : "";
$gerente = isset ( $_POST ['gerente'] ) ? $_POST ['gerente'] : "";
$fone = isset ( $_POST ['fone'] ) ? $_POST ['fone'] : "";
$celular = isset ( $_POST ['celular'] ) ? $_POST ['celular'] : "";
$longitude = isset ( $_POST ['longitude'] ) ? $_POST ['longitude'] : "";
$latitude = isset ( $_POST ['latitude'] ) ? $_POST ['latitude'] : "";
$observacao = isset ( $_POST ['observacao'] ) ? $_POST ['observacao'] : "";
$dataatual = date('Y-m-d');

//Upload da foto
if(isset($_FILES['fotoloja'])){
	
	$extensao = strtolower(substr($_FILES['fotoloja']['name'], -5));
	$fotoLoja = md5(time()) . $extensao;
	$diretorio = "../fotos/lojas/";

	move_uploaded_file($_FILES['fotoloja']['tmp_name'], $diretorio.$fotoLoja);
}

//convertendo para caixa alta
$loja = strtoupper($loja);
$endereco = strtoupper($endereco);
$bairro = strtoupper($bairro);
$cidade = strtoupper($cidade);
$uf = strtoupper($uf);
$gerente = strtoupper($gerente);
$observacao = strtoupper($observacao);

$op;
if ($postTipoAcao == "") {
	$op = $getTipoAcao;
} else {
	$op = $postTipoAcao;
}

if ($op == 'insert'){
	$frmVisualizar = '';

	$smarty->assign ( "FrmVisualizar", $frmVisualizar );
	$smarty->assign('data_hoje',data_extenso());
	$smarty->assign ('session_usuarioLogado', $session_usuarioLogado );
	$smarty->display('topo.html');
	$smarty->display('frmLoja.html');
} elseif ($op == 'inserir') {

	$camposInserir = "('$loja','$endereco','$bairro','$cidade','$uf','$gerente','$fone','$celular','$longitude','$latitude','$observacao','$dataatual','$fotoLoja')";

	$sqlInserir = 'INSERT INTO lojas (loja,endereco,bairro,cidade,uf,gerente,fone,celular,longitude,latitude,obs,datacadastro,fotos) VALUES '.$camposInserir;
		
	$resultInserir = pg_query ( $conexao, $sqlInserir );
	
	$qntlinha = pg_affected_rows( $resultInserir );
		
	pg_close($conexao);
	
	if ($qntlinha == 1){
		echo "<script>
		    window.location='listLojas.php';
		    alert('Loja cadastrada com sucesso!');
		    </script>";
	} else {
		echo "<script>
	    window.location='listLojas.php';
	    alert('Loja não cadastrada!');
	    </script>";
	}
} elseif ($op == 'exibir'){

	$sqlExibir = 'SELECT idloja,loja,endereco,bairro,fone,celular,gerente,cidade,uf,longitude,latitude,obs,fotos FROM lojas WHERE idloja = '.$idLoja;
		
	$resultExibir = pg_query ( $conexao, $sqlExibir );
	
	$qntlinha = pg_num_rows( $resultExibir );
		
	pg_close($conexao);
	
	if ($qntlinha == 1){
		$arr = pg_fetch_array($resultExibir);
		
		$idLoja = $arr['idloja'];
		$loja = $arr['loja'];
		$endereco = $arr['endereco'];
		$bairro = $arr['bairro'];
		$fone = $arr['fone'];
		$celular = $arr['celular'];
		$gerente = $arr['gerente'];
		$cidade = $arr['cidade'];
		$uf = $arr['uf'];
		$longitude = $arr['longitude'];
		$latitude = $arr['latitude'];
		$observacao = $arr['obs'];
		$fotoLoja = "../fotos/lojas/".$arr['fotos'];
        
		$frmVisualisar = 'S';
		$frmEditar = '';
		
		$smarty->assign ( "FrmVisualizar", $frmVisualisar );
		$smarty->assign ( "FrmEditar", $frmEditar );
		$smarty->assign ( "idLoja", $idLoja );
		$smarty->assign ( "Loja", $loja );
		$smarty->assign ( "Endereco", $endereco );
		$smarty->assign ( "Bairro", $bairro );
		$smarty->assign ( "Fone", $fone );
		$smarty->assign ( "Celular", $celular );
		$smarty->assign ( "Gerente", $gerente );
		$smarty->assign ( "Cidade", $cidade );
		$smarty->assign ( "UF", $uf );
		$smarty->assign ( "Longitude", $longitude );
		$smarty->assign ( "Latitude", $latitude );
		$smarty->assign ( "Observacao", $observacao);
		$smarty->assign ( "FotoLoja", $fotoLoja);
		$smarty->assign('data_hoje',data_extenso());
		$smarty->assign ('session_usuarioLogado', $session_usuarioLogado );
		$smarty->display('topo.html');
		$smarty->display('frmLoja.html');
		
	} else {
		echo "<script>
	    window.location='listLojas.php';
	    alert('Loja não localizada!');
	    </script>";
	}
} elseif ($op == 'excluir'){
	$sqlExcluir = 'DELETE FROM lojas WHERE idloja = '.$idLoja;
		
	$resultExcluir = pg_query ( $conexao, $sqlExcluir );
	
	$qntlinha = pg_affected_rows( $resultExcluir );
		
	pg_close($conexao);
	
	if ($qntlinha == 1){
		echo "<script>
		    window.location='listLojas.php';
		    alert('Loja excluida com sucesso!');
		    </script>";
	} else {
		echo "<script>
	    window.location='listLojas.php';
	    alert('Loja não excluida!');
	    </script>";
	}
} elseif ($op == 'editar'){
	$sqlEditar = 'SELECT idloja,loja,endereco,bairro,fone,celular,gerente,cidade,uf,longitude,latitude,obs FROM lojas WHERE idloja = '.$idLoja;
		
	$resultEditar = pg_query ( $conexao, $sqlEditar );
	
	$qntlinha = pg_num_rows( $resultEditar );
		
	pg_close($conexao);
	
	if ($qntlinha == 1){
		$arr = pg_fetch_array($resultEditar);
		
		$idLoja = $arr['idloja'];
		$loja = $arr['loja'];
		$endereco = $arr['endereco'];
		$bairro = $arr['bairro'];
		$fone = $arr['fone'];
		$celular = $arr['celular'];
		$gerente = $arr['gerente'];
		$cidade = $arr['cidade'];
		$uf = $arr['uf'];
		$longitude = $arr['longitude'];
		$latitude = $arr['latitude'];
		$observacao = $arr['obs'];
        
		$frmVisualizar = 'S';
		$frmEditar = 'S';
		
		$smarty->assign ( "FrmVisualizar", $frmVisualizar );
		$smarty->assign ( "FrmEditar", $frmEditar );
		$smarty->assign ( "idLoja", $idLoja );
		$smarty->assign ( "Loja", $loja );
		$smarty->assign ( "Endereco", $endereco );
		$smarty->assign ( "Bairro", $bairro );
		$smarty->assign ( "Fone", $fone );
		$smarty->assign ( "Celular", $celular );
		$smarty->assign ( "Gerente", $gerente );
		$smarty->assign ( "Cidade", $cidade );
		$smarty->assign ( "UF", $uf );
		$smarty->assign ( "Longitude", $longitude );
		$smarty->assign ( "Latitude", $latitude );
		$smarty->assign ( "Observacao", $observacao );
		$smarty->assign('data_hoje',data_extenso());
		$smarty->assign ('session_usuarioLogado', $session_usuarioLogado );
		$smarty->display('topo.html');
		$smarty->display('frmLoja.html');
	}

} elseif ($op == 'atualizar'){
	
	$sqlAtualizar = 'update "lojas" set "loja" = ' . "'$loja'" . 
	', "endereco" = ' . "'$endereco'" .
	', "bairro" = ' . "'$bairro'" .
	', "cidade" = ' . "'$cidade'" .
	', "uf" = ' . "'$uf'" .
	', "gerente" = ' . "'$gerente'" .
	', "fone" = ' . "'$fone'" .
	', "celular" = ' . "'$celular'" .
	', "longitude" = ' . "'$longitude'" .
	', "latitude" = ' . "'$latitude'" .
	', "obs" = ' . "'$observacao'" .
	' where "idloja" = ' . "'$idLoja'";


		
	$resultInserir = pg_query ( $conexao, $sqlAtualizar );
	
	$qntlinha = pg_affected_rows( $resultInserir );
		
	pg_close($conexao);
	
	if ($qntlinha == 1){
		echo "<script>
		    window.location='listLojas.php';
		    alert('Loja atualizada com sucesso!');
		    </script>";
	} else {
		echo "<script>
	    window.location='listLojas.php';
	    alert('Loja nao Atualizada!');
	    </script>";
	}
} 
		
?>