<?php
/* Smarty version 3.1.30, created on 2019-09-23 19:18:12
  from "c:\xampp\htdocs\olimpo\templates\principal.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5d88fe54634886_17538260',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '89b9988c8c11e4dda36ec5ee23e6f46415b7a3ba' => 
    array (
      0 => 'c:\\xampp\\htdocs\\olimpo\\templates\\principal.html',
      1 => 1569194691,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d88fe54634886_17538260 (Smarty_Internal_Template $_smarty_tpl) {
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
<html lang="pt-br">

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
  <!-- Web Buider -->
  	<link href="../stylos/font-awesome.min.css" rel="stylesheet">
	<link href="../stylos/Untitled1.css" rel="stylesheet">
	<link href="../stylos/principal.css" rel="stylesheet">
  <!-- Fim Web Buider -->	
  <?php echo '<script'; ?>
 src="../assets/js/core/jquery.min.js"><?php echo '</script'; ?>
>
  <link rel="stylesheet" href="../templates/magnificpopup/magnific-popup.css">
  <?php echo '<script'; ?>
 src="../templates/magnificpopup/jquery.magnific-popup.min.js"><?php echo '</script'; ?>
>
  <link rel="stylesheet" href="../templates/fancybox/jquery.fancybox-1.3.4.css">
	<?php echo '<script'; ?>
>
		function displaylightbox(url, options){
		   options.items = { src: url };
		   options.type = 'iframe';
		   $.magnificPopup.open(options);
		}
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
      <!-- End Navbar -->
      <!-- <div class="panel-header panel-header-sm">
	  </div> -->
      <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
          
					<div id="wb_FontAwCliente">
					<a href="listClientes.php" title="Cadastro clientes"><div id="FontAwCliente"><i class="fa fa-users"></i></div></a></div>
					<div id="wb_TextClientes">
					<span style="color:#808080;font-family:Arial;font-size:13px;"><strong>Clientes</strong></span></div>
					<div id="wb_FontAwEstoque">
					<a href="listEstoques.php" title="Cadastro de produtos"><div id="FontAwEstoque"><i class="fa fa-database"></i></div></a></div>
					<div id="wb_TextEstoques">
					<span style="color:#808080;font-family:Arial;font-size:13px;"><strong>Estoques</strong></span></div>
					<div id="wb_FontAwEntradas">
					<a href="./topo.html" title="Entradas de mercadorias"><div id="FontAwEntradas"><i class="fa fa-shopping-basket"></i></div></a></div>
					<div id="wb_TextEntradas">
					<span style="color:#808080;font-family:Arial;font-size:13px;"><strong>Entradas Mercadorias</strong></span></div>
					<div id="wb_FontAwVendas">
					<a href="listVendas.php" title="Vendas"><div id="FontAwVendas"><i class="fa fa-shopping-cart"></i></div></a></div>
					<div id="wb_TextVendas">
					<span style="color:#808080;font-family:Arial;font-size:13px;"><strong>Vendas</strong></span></div>
					<div id="wb_FontAwRelatorios">
					<a href="./topo.html" title="Relatorios"><div id="FontAwRelatorios"><i class="fa fa-bar-chart"></i></div></a></div>
					<div id="wb_TextRelatorios">
					<span style="color:#808080;font-family:Arial;font-size:13px;"><strong>Relatorios</strong></span></div>
					<div id="wb_FontAwConfig">
					<a href="./topo.html" title="Configura&#231;&#245;es"><div id="FontAwConfig"><i class="fa fa-gear"></i></div></a></div>
					<div id="wb_TextConfig">
					<span style="color:#808080;font-family:Arial;font-size:13px;"><strong>Configurações</strong></span></div>
				
				</br></br></br></br></br></br></br></br></br>
				</br></br></br></br></br></br></br></br></br>
				</br></br></br></br></br></br></br></br></br>			
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
  <?php echo '<script'; ?>
 src="../assets/js/core/bootstrap.min.js"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"><?php echo '</script'; ?>
>
  <!--  Google Maps Plugin    -->
  <?php echo '<script'; ?>
 src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"><?php echo '</script'; ?>
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
</body>

</html>
<?php }
}
