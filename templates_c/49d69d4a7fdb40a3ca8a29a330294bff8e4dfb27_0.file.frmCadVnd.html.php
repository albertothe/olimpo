<?php
/* Smarty version 3.1.30, created on 2019-10-06 00:25:01
  from "c:\xampp\htdocs\olimpo\templates\frmCadVnd.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5d99183d60e3c1_73552635',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '49d69d4a7fdb40a3ca8a29a330294bff8e4dfb27' => 
    array (
      0 => 'c:\\xampp\\htdocs\\olimpo\\templates\\frmCadVnd.html',
      1 => 1570314078,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d99183d60e3c1_73552635 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!--
=========================================================
 Paper Dashboard 2 - v2.0.0
=========================================================

 Product Page: https://www.creative-tim.com/product/paper-dashboard-2
 Copyright 2019 Creative Tim (https://www.creative-tim.com)
 Licensed under MIT (https://github.com/creativetimofficial/paper-dashboard/blob/master/LICENSE)

 Coded by Creative Tim

=========================================================

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. -->



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Olimpo - Sistema de controle
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <!-- CSS Files -->
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="../assets/css/paper-dashboard.css?v=2.0.0" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="../assets/demo/demo.css" rel="stylesheet" />
    <?php echo '<script'; ?>
 src="../assets/js/core/jquery.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="../assets/js/core/bootstrap.min.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="../js/jquery-3.3.1.min.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="../js/jquery-ui.min.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="../js/autoProduto.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="../js/autoCliente.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="../js/calculosDesconto.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 type="text/javascript">
	$(document).ready(function(){
		$('#nomeBusca').change(function(){
			$('#grade').load('../includes/listGrad.php?codproduto='+$('#codproduto').val());
		});
	});
	<?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
>
		document.addEventListener('click', function(e) {
		  
		  var self = e.target;
		  
		  if(['percdesc','vlrdesc'].indexOf(self.id) !== -1) {
		    var el = document.getElementById(self.id === 'percdesc' ? 'vlrdesc' : 'percdesc');
		    
		    self.removeAttribute('disabled');
		    
		    el.setAttribute('disabled','');
		    el.value = "";
		  }
		})
	<?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 type="text/javascript">
	function id(el) {
	  return document.getElementById( el );
	}
	function total( un, qnt ) {
	  return parseFloat(un.replace(',', '.'), 10) * parseFloat(qnt.replace(',', '.'), 10);
	}
	window.onload = function() {
	  id('vlrvnd_rev').addEventListener('keyup', function() {
	    var result = total( this.value , id('quant').value );
	    id('total').value = String(result.toFixed(2)).formatMoney();
	  });
	
	  id('qnt').addEventListener('keyup', function(){
	    var result = total( id('vlrvnd_rev').value , this.value );
	    id('total').value = String(result.toFixed(2)).formatMoney();
	  });
	}
	
	String.prototype.formatMoney = function() {
	  var v = this;
	
	  if(v.indexOf('.') === -1) {
	    v = v.replace(/([\d]+)/, "$1,00");
	  }
	
	  v = v.replace(/([\d]+)\.([\d]<?php echo 1;?>
)$/, "$1,$20");
	  v = v.replace(/([\d]+)\.([\d]<?php echo 2;?>
)$/, "$1,$2");
	  v = v.replace(/([\d]+)([\d]<?php echo 3;?>
),([\d]<?php echo 2;?>
)$/, "$1.$2,$3");
	
	  return v;
	};
	<?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 type="text/javascript" src="../js/mask/dist/jquery.mask.min.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
>
		jQuery(function($){
			$("#total").mask("###0,00" , { reverse:true});
			$("#celular").mask("(99) 99999-9999");
			$("#vlrvnd_rev").mask("###.000,00" , { reverse:true});
			$("#dataCadastro").mask("99/99/9999");
		});
				
	<?php echo '</script'; ?>
>
</head>

<body class="">
  <div class="wrapper ">
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" href="#pablo">Olimpo Teresina</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <form>
              <div class="input-group no-border">
                <input type="text" value="" class="form-control" placeholder="Buscar...">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <i class="nc-icon nc-zoom-split"></i>
                  </div>
                </div>
              </div>
            </form>
            <ul class="navbar-nav">
			  <li class="nav-item btn-rotate dropdown">
                <a class="nav-link dropdown-toggle" href="http://45.79.24.109/olimpo/" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="nc-icon nc-settings-gear-65"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Some Actions</span>
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="frmCadUsua.php?operacao=ver&codusuario=<?php echo $_smarty_tpl->tpl_vars['session_codUsuarioLogado']->value;?>
">Perfil</a>
                  <a class="dropdown-item" href="logout.php">Sair</a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>

	<div class="content">
      
		<div class="row">
			<div class="col-md-12">
			
				<div class="card">
					<div class="card-header">
						    <h5 class="card-title">Nova Venda - Nº. <?php echo $_smarty_tpl->tpl_vars['codmovimento']->value;?>
</h5>
    						<h6 class="card-subtitle text-right mb-2 text-muted">Status: Pendente</h6>
						<hr>
					</div>
					        
					<div class="card-body pt-1">

						<form action="cadMov.php" method="post">
						  <div class="form-row">
							<div class="form-group col-md-2">
							  <label for="inputAddress">Data</label>
							  <input type="Date" class="form-control" id="inputAddress" name="datamov" value="<?php echo $_smarty_tpl->tpl_vars['dataMov']->value;?>
" placeholder="">
							</div>
							<div class="form-group col-md-2">
						      <label for="inputEstado">Vendedor</label>
						      <select name="vendedor" id="inputEstado" class="form-control">
						        <option selected>Escolher...</option>
								<?php
$__section_i_0_saved = isset($_smarty_tpl->tpl_vars['__smarty_section_i']) ? $_smarty_tpl->tpl_vars['__smarty_section_i'] : false;
$__section_i_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['codVendedor']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_i_0_total = $__section_i_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_i'] = new Smarty_Variable(array());
if ($__section_i_0_total != 0) {
for ($__section_i_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] = 0; $__section_i_0_iteration <= $__section_i_0_total; $__section_i_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']++){
?>
						        <?php if ($_smarty_tpl->tpl_vars['nomeVendedor']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)] == $_smarty_tpl->tpl_vars['vendedor']->value) {?>								
								<option value="<?php echo $_smarty_tpl->tpl_vars['codVendedor']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)];?>
" selected><?php echo $_smarty_tpl->tpl_vars['nomeVendedor']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)];?>
</option>
								<?php } else { ?>
								<option value="<?php echo $_smarty_tpl->tpl_vars['codVendedor']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)];?>
"><?php echo $_smarty_tpl->tpl_vars['nomeVendedor']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)];?>
</option>
								<?php }?>
								<?php
}
}
if ($__section_i_0_saved) {
$_smarty_tpl->tpl_vars['__smarty_section_i'] = $__section_i_0_saved;
}
?>
						      </select>
							</div>
							<div class="form-group col-md-2">
						      <label for="inputEstado">FormaPag</label>
						      <select name="formapagamento" id="inputEstado" class="form-control">
						        <option selected>Escolher...</option>
								<?php
$__section_i_1_saved = isset($_smarty_tpl->tpl_vars['__smarty_section_i']) ? $_smarty_tpl->tpl_vars['__smarty_section_i'] : false;
$__section_i_1_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['codForma']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_i_1_total = $__section_i_1_loop;
$_smarty_tpl->tpl_vars['__smarty_section_i'] = new Smarty_Variable(array());
if ($__section_i_1_total != 0) {
for ($__section_i_1_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] = 0; $__section_i_1_iteration <= $__section_i_1_total; $__section_i_1_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']++){
?>
								<?php if ($_smarty_tpl->tpl_vars['nomeForma']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)] == $_smarty_tpl->tpl_vars['forma']->value) {?>
								<option value="<?php echo $_smarty_tpl->tpl_vars['codForma']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)];?>
" selected><?php echo $_smarty_tpl->tpl_vars['nomeForma']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)];?>
</option>
								<?php } else { ?>
								<option value="<?php echo $_smarty_tpl->tpl_vars['codForma']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)];?>
"><?php echo $_smarty_tpl->tpl_vars['nomeForma']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)];?>
</option>
								<?php }?>
								<?php
}
}
if ($__section_i_1_saved) {
$_smarty_tpl->tpl_vars['__smarty_section_i'] = $__section_i_1_saved;
}
?>
						      </select>
							</div>
							<div class="form-group col-md-3">
							  <label for="inputAddress2">Cliente</label>
							  <?php if ($_smarty_tpl->tpl_vars['operacao']->value != "editar") {?>
							  <input type="text" class="form-control" id="EditboxCliente" placeholder="Digite o cliente">
							  <input type="hidden" id="codcliente" name="codcliente" value="">
							  <?php } else { ?>
							  <input type="text" class="form-control" id="EditboxCliente" value="<?php echo $_smarty_tpl->tpl_vars['cliente']->value;?>
" placeholder="Digite o cliente">
							  <input type="hidden" id="codcliente" name="codcliente" value="<?php echo $_smarty_tpl->tpl_vars['codCli']->value;?>
">
							  <?php }?>		
							</div>
							<div class="btn-group btn-group-sm" role="group">
								<button type="submit" class="btn btn-outline-primary btn-sm">Incluir</button>
								<input type="hidden" id="codmovimento" name="codmovimento" value="<?php echo $_smarty_tpl->tpl_vars['codmovimento']->value;?>
">
								<input type="hidden" id="modulo" name="modulo" value="capavenda">
							</div>
						  </div>
						  <div class="form-row">
						    <div class="form-group col-md-2">
						      <label for="inputCity">Telefone</label>
						      <?php if ($_smarty_tpl->tpl_vars['operacao']->value != "editar") {?>
						      <input class="form-control" type="text" id="celular" name="celular" readonly>
						      <?php } else { ?>
						      <input class="form-control" type="text" id="celular" name="celular" value="<?php echo $_smarty_tpl->tpl_vars['celular']->value;?>
" readonly>
						      <?php }?>
						    </div>
						    <div class="form-group col-md-3">
						      <label for="inputState">Endereço</label>
						      <?php if ($_smarty_tpl->tpl_vars['operacao']->value != "editar") {?>
						      <input class="form-control" type="text" id="endereco" name="endereco" readonly>
						      <?php } else { ?>
						      <input class="form-control" type="text" id="endereco" name="endereco" value="<?php echo $_smarty_tpl->tpl_vars['endereco']->value;?>
" readonly>
						      <?php }?>
						    </div>
						    <div class="form-group col-md-2">
						      <label for="inputZip">Bairro</label>
						      <?php if ($_smarty_tpl->tpl_vars['operacao']->value != "editar") {?>
						      <input class="form-control" type="text" id="bairro" name="bairro" readonly>
						      <?php } else { ?>
						      <input class="form-control" type="text" id="bairro" name="bairro" value="<?php echo $_smarty_tpl->tpl_vars['bairro']->value;?>
" readonly>
						      <?php }?>
						    </div>
						    <div class="form-group col-md-2">
						      <label for="inputZip">Cidade</label>
						      <?php if ($_smarty_tpl->tpl_vars['operacao']->value != "editar") {?>
						      <input class="form-control" type="text" id="cidade" name="cidade" readonly>
						      <?php } else { ?>
						      <input class="form-control" type="text" id="cidade" name="cidade" value="<?php echo $_smarty_tpl->tpl_vars['cidade']->value;?>
" readonly>
						      <?php }?>
						    </div>
						    <div class="form-group col-md-1">
						      <label for="inputZip">UF</label>
						      <?php if ($_smarty_tpl->tpl_vars['operacao']->value != "editar") {?>
						      <input class="form-control" type="text" id="uf" name="uf" readonly>
						      <?php } else { ?>
						      <input class="form-control" type="text" id="uf" name="uf" value="<?php echo $_smarty_tpl->tpl_vars['uf']->value;?>
" readonly>
						      <?php }?>
						    </div>
						  </div>
						  <hr>
						</form>
						<?php if ($_smarty_tpl->tpl_vars['operacao']->value != "novo") {?>
						<form id="FormGeral" action="cadMov.php" method="post">
						  <div class="form-row">
							<div class="form-group col-md-3">
							  <label for="inputAddress2">Produto</label>
							  <input type="text" class="form-control" id="nomeBusca" placeholder="Digite o produto">
							  <input type="hidden" id="codproduto" name="codproduto" value="">
							</div>
							<div class="form-group col-md-1">
								<label>Grade</label>
								<select name="grade" id="grade" class="browser-default custom-select">
								  <?php
$__section_i_2_saved = isset($_smarty_tpl->tpl_vars['__smarty_section_i']) ? $_smarty_tpl->tpl_vars['__smarty_section_i'] : false;
$__section_i_2_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['idGrade']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_i_2_total = $__section_i_2_loop;
$_smarty_tpl->tpl_vars['__smarty_section_i'] = new Smarty_Variable(array());
if ($__section_i_2_total != 0) {
for ($__section_i_2_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] = 0; $__section_i_2_iteration <= $__section_i_2_total; $__section_i_2_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']++){
?>
								  <option value="<?php echo $_smarty_tpl->tpl_vars['idGrade']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)];?>
"><?php echo $_smarty_tpl->tpl_vars['grade']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)];?>
</option>
								  <?php
}
}
if ($__section_i_2_saved) {
$_smarty_tpl->tpl_vars['__smarty_section_i'] = $__section_i_2_saved;
}
?>
								</select>
							</div>
							<div class="form-group col-md-1">
							  <label for="inputAddress">Quant.</label>
							  <input type="text" class="form-control" id="quant" name="quant" placeholder="">
							</div>
							<div class="form-group col-md-1">
							  <label for="inputAddress">Vlr unit.</label>
							  <input type="text" class="form-control" id="vlrvnd_rev" name="vlrunit" placeholder="">
							</div>
							<div class="form-group col-md-1">
							  <label for="inputAddress">$ Desc.</label>
							  <input onkeyup="calcularDescontoValor()" type="text" class="form-control" id="vlrdesc" name="vlrdesc" placeholder="">
							</div>
							<div class="form-group col-md-1">
							  <label for="inputAddress">% Desc.</label>
							  <input onkeyup="calcularDescontoPerc()" type="text" class="form-control" id="percdesc" name="percdesc" placeholder="">
							</div>
							<div class="form-group col-md-1">
							  <label for="inputAddress">Vlr Total</label>
							  <input type="text" class="form-control" id="total" name="total" placeholder="">
							</div>		
							<div class="btn-group btn-group-sm" role="group" aria-label="Exemplo básico">
							  <button type="submit" class="btn btn-outline-primary btn-sm">Incluir</button>
							  <input type="hidden" id="codmovimento" name="codmovimento" value="<?php echo $_smarty_tpl->tpl_vars['codmovimento']->value;?>
">
							  <input type="hidden" id="modulo" name="modulo" value="itemvenda">
							</div>						
						  </div>
						
						  <hr>

						</form>
 						
		 				<div class="table-responsive">
		                  <table class="table">
		                    <thead class=" text-primary">
		                      <th>
		                        Codigo
		                      </th>
		                      <th>
		                        Produto
		                      </th>
		                      <th class="text-center">
		                        Grade
		                      </th>		           
		                      <th class="text-center">
		                        Unidade
		                      </th>
		                      <th class="text-right">
		                        Quant.
		                      </th>
		                      <th class="text-right">
		                        Vlr Unit.
		                      </th>
		                      <th class="text-right">
		                        Vlr Desc.
		                      </th>		                  
		                      <th class="text-right">
		                        Vlr Total
		                      </th>		                      		                      
		                    </thead>
							<?php
$__section_i_3_saved = isset($_smarty_tpl->tpl_vars['__smarty_section_i']) ? $_smarty_tpl->tpl_vars['__smarty_section_i'] : false;
$__section_i_3_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['listcodproduto']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_i_3_total = $__section_i_3_loop;
$_smarty_tpl->tpl_vars['__smarty_section_i'] = new Smarty_Variable(array());
if ($__section_i_3_total != 0) {
for ($__section_i_3_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] = 0; $__section_i_3_iteration <= $__section_i_3_total; $__section_i_3_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']++){
?>
		                    <tbody>
		                      <tr>
		                        <td>
		                         <?php echo $_smarty_tpl->tpl_vars['listcodproduto']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)];?>

		                        </td>
		                        <td>
		                          <?php echo $_smarty_tpl->tpl_vars['listproduto']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)];?>

		                        </td>
		                        <td class="text-center">
		                          <?php echo $_smarty_tpl->tpl_vars['listgrade']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)];?>

		                        </td>		                        
		                        <td class="text-center">
		                          <?php echo $_smarty_tpl->tpl_vars['listunidade']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)];?>

		                        </td>
		                        <td class="text-right">
		                          <?php echo $_smarty_tpl->tpl_vars['listquant']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)];?>

		                        </td>
		                        <td class="text-right">
		                          <?php echo $_smarty_tpl->tpl_vars['listunit']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)];?>

		                        </td>
		                        <td class="text-right">
		                          <?php echo $_smarty_tpl->tpl_vars['lisdesc']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)];?>

		                        </td>
		                        <td class="text-right">
		                          <?php echo $_smarty_tpl->tpl_vars['listtotal']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)];?>

		                        </td>
		                      </tr>
		                    </tbody>
							<?php
}
}
if ($__section_i_3_saved) {
$_smarty_tpl->tpl_vars['__smarty_section_i'] = $__section_i_3_saved;
}
?>
							<TFOOT>
							<TR class="table-active">
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td class="text-right"><strong>Total: <?php echo $_smarty_tpl->tpl_vars['totalVnd']->value;?>
<strong></td>
							</TR>
							</TFOOT>
		                  </table>
						</div>
		                <a href="cadMov.php?modulo=finalizavenda&codmovimento=<?php echo $_smarty_tpl->tpl_vars['codmovimento']->value;?>
" class="btn btn-outline-danger pull-right btn-sm btn-round">Finalizar</a>
		                <a href="listVendas.php" class="btn btn-outline-warning pull-right btn-sm btn-round">Cancelar</a>
		  				<?php } else { ?>
 						<a href="listVendas.php" class="btn btn-outline-warning pull-right btn-sm btn-round">Cancelar</a>
 						<?php }?>		              
					</div>
				</div>  
            
          </div>
          
        </div>
        
      </div>
      <footer class="footer footer-black  footer-white ">
        <div class="container-fluid">
          <div class="row">
            <div class="credits ml-auto">
              <span class="copyright">
                ©
                <?php echo '<script'; ?>
>
                  document.write(new Date().getFullYear())
                <?php echo '</script'; ?>
> - 7Nove Tecnologia
              </span>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </div>
  <!--   Core JS Files   -->

  <?php echo '<script'; ?>
 src="../assets/js/core/popper.min.js"><?php echo '</script'; ?>
>
  <!-- Chart JS -->
  <?php echo '<script'; ?>
 src="../assets/js/plugins/chartjs.min.js"><?php echo '</script'; ?>
>
  <!--  Notifications Plugin    -->
  <?php echo '<script'; ?>
 src="../assets/js/plugins/bootstrap-notify.js"><?php echo '</script'; ?>
>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <?php echo '<script'; ?>
 src="../assets/js/paper-dashboard.min.js?v=2.0.0" type="text/javascript"><?php echo '</script'; ?>
>
  <!-- Paper Dashboard DEMO methods, don't include it in your project! -->
  <?php echo '<script'; ?>
 src="../assets/demo/demo.js"><?php echo '</script'; ?>
>
  <!-- <?php echo '<script'; ?>
 src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"><?php echo '</script'; ?>
>  -->
</body>

</html>
<?php }
}
