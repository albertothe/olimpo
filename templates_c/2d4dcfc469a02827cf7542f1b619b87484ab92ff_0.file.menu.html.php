<?php
/* Smarty version 3.1.30, created on 2019-09-23 09:29:29
  from "/var/www/html/olimpo/templates/menu.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5d88baa9436034_86318609',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2d4dcfc469a02827cf7542f1b619b87484ab92ff' => 
    array (
      0 => '/var/www/html/olimpo/templates/menu.html',
      1 => 1569193091,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d88baa9436034_86318609 (Smarty_Internal_Template $_smarty_tpl) {
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
    Olimpo - Sistema de Controle
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <!-- CSS Files -->
  <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="assets/css/paper-dashboard.css?v=2.0.0" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="assets/demo/demo.css" rel="stylesheet" />
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="white" data-active-color="danger">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->
      <div class="logo">
        <a href="#" class="simple-text logo-mini">
          <div class="logo-image-small">
            <img src="../assets/img/logo-small.png">
          </div>
        </a>
        <a href="#" class="simple-text logo-normal">
          <?php echo $_smarty_tpl->tpl_vars['session_usuarioLogado']->value;?>

          <!-- <div class="logo-image-big">
            <img src="../assets/img/logo-big.png">
          </div> -->
        </a>
      </div>
	
      <div class="sidebar-wrapper">
        <ul class="nav dropdown">
		
			<li class="active">
				<a data-toggle="collapse" href="#dashboardOverview" aria-expanded="true">
					<i class="ti-panel"></i>
					<p>Cadastro
						<b class="caret"></b>
					</p>
				</a>
				<div class="collapse in" id="dashboardOverview">
					<ul class="nav">
						<li class="active">
							<a href="listClientes.php">
								<span class="sidebar-mini">-></span>
								<span class="sidebar-normal">Clientes</span>
							</a>
						</li>
						<li>
							<a href="listFormapagamentos.php">
								<span class="sidebar-mini">-></span>
								<span class="sidebar-normal">FormaPagamento</span>
							</a>
						</li>						
						<li>
							<a href="listFornecedores.php">
								<span class="sidebar-mini">-></span>
								<span class="sidebar-normal">Fornecedores</span>
							</a>
						</li>
						<li>
							<a href="listProdutos.php">
								<span class="sidebar-mini">-></span>
								<span class="sidebar-normal">Produtos</span>
							</a>
						</li>
						<li>
							<a href="listUsuarios.php">
								<span class="sidebar-mini">-></span>
								<span class="sidebar-normal">Usuarios</span>
							</a>
						</li>
					</ul>
				</div>
			</li>
					<li>
						<a data-toggle="collapse" href="#componentsExamples">
							<i class="ti-package"></i>
							<p>Movimentações
							   <b class="caret"></b>
							</p>
						</a>
						<div class="collapse" id="componentsExamples">
							<ul class="nav">
	                            <li>
									<a href="../components/buttons.html">
										<span class="sidebar-mini">-></span>
										<span class="sidebar-normal">Compras</span>
									</a>
								</li>
	                            <li>
									<a href="listEstoques.php">
										<span class="sidebar-mini">-></span>
										<span class="sidebar-normal">Estoques</span>
									</a>
								</li>
	                            <li>
									<a href="listVendas.php">
										<span class="sidebar-mini">-></span>
										<span class="sidebar-normal">Vendas</span>
									</a>
								</li>
	                        </ul>
						</div>
					</li>
					<li>
						<a data-toggle="collapse" href="#formsExamples">
	                        <i class="ti-clipboard"></i>
	                        <p>
								Financeiro
	                           <b class="caret"></b>
	                        </p>
	                    </a>
	                    <div class="collapse" id="formsExamples">
							<ul class="nav">
								<li>
									<a href="listFluxos.php">
										<span class="sidebar-mini">-></span>
										<span class="sidebar-normal">Caixas</span>
									</a>
								</li>
								<li>
									<a href="../forms/extended.html">
										<span class="sidebar-mini">-></span>
										<span class="sidebar-normal">Contas</span>
									</a>
								</li>
	                        </ul>
	                    </div>
	                </li>
	                <li>
						<a data-toggle="collapse" href="#tablesExamples">
	                        <i class="ti-view-list-alt"></i>
	                        <p>
								Relatorios
	                           <b class="caret"></b>
	                        </p>
	                    </a>
	                    <div class="collapse" id="tablesExamples">
							<ul class="nav">
								<li>
									<a href="../tables/regular.html">
										<span class="sidebar-mini">-></span>
										<span class="sidebar-normal">Relatorio de Caixas</span>
									</a>
								</li>
								<li>
									<a href="../tables/extended.html">
										<span class="sidebar-mini">-></span>
										<span class="sidebar-normal">Relatorio de Compras</span>
									</a>
								</li>
								<li>
									<a href="../tables/bootstrap-table.html">
										<span class="sidebar-mini">-></span>
										<span class="sidebar-normal">Relatorio de Estoque</span>
									</a>
								</li>
								<li>
									<a href="../tables/datatables.net.html">
										<span class="sidebar-mini">-></span>
										<span class="sidebar-normal">Relatorio de Vendas</span>
									</a>
								</li>
	                        </ul>
	                    </div>
	                </li>
        </ul>
      </div>
	  
    </div>

<?php }
}
