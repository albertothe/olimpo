<?php
/* Smarty version 3.1.30, created on 2019-09-13 17:51:52
  from "c:\xampp\htdocs\olimpo\templates\frmCadForn.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5d7bbb18166c01_01473214',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '59c9b593c3d7ea4ec77df1cab4e6c6ea695b5d82' => 
    array (
      0 => 'c:\\xampp\\htdocs\\olimpo\\templates\\frmCadForn.html',
      1 => 1568389908,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d7bbb18166c01_01473214 (Smarty_Internal_Template $_smarty_tpl) {
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
            <div class="card card-user">
              <div class="card-header">
                <h5 class="card-title">Cadastro de fornecedor</h5>
              </div>
              <div class="card-body pt-5">
                <form action="cadForn.php" method="post">
                  <div class="row">
                    <div class="col-md-1 pr-1">
                      <div class="form-group">
                        <label>Codigo</label>
                        <input type="text" value="<?php echo $_smarty_tpl->tpl_vars['codFornecedor']->value;?>
" class="form-control" disabled="">
                      </div>
                    </div>
                    <div class="col-md-4 px-1">
                      <div class="form-group">
                        <label>Nome</label>
						<?php if ($_smarty_tpl->tpl_vars['estatus']->value == "ver") {?>
                        <input type="text" required="required" class="form-control" id="fornecedor" disabled name="fornecedor" value="<?php echo $_smarty_tpl->tpl_vars['fornecedor']->value;?>
" placeholder="Nome do fornecedor">
						<?php } else { ?>
                        <input type="text" required="required" class="form-control" id="fornecedor" name="fornecedor" value="<?php echo $_smarty_tpl->tpl_vars['fornecedor']->value;?>
" placeholder="Nome do fornecedor">
						<?php }?>
                      </div>
                    </div>
                    <div class="col-md-2 pl-1">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Telefone</label>
						<?php if ($_smarty_tpl->tpl_vars['estatus']->value == "ver") {?>
                        <input required="required" onkeypress="$(this).mask('(00) 00000-0009')" class="form-control" id="fone" disabled name="fone" value="<?php echo $_smarty_tpl->tpl_vars['fone']->value;?>
">
						<?php } else { ?>
                         <input type="text" class="form-control" id="fone" name="fone" value="<?php echo $_smarty_tpl->tpl_vars['fone']->value;?>
" placeholder="Digite o fone" onkeypress="$(this).mask('(00) 00000-0009')" required>
						<?php }?>
                      </div>
                    </div>
                  </div>
                  <?php if ($_smarty_tpl->tpl_vars['estatus']->value == "novo") {?>
                  <?php } else { ?>
                  <div class="row">
                  	<div class="col-md-1 pr-1">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Status</label>
                        <?php if ($_smarty_tpl->tpl_vars['estatus']->value == "ver") {?>
						<p> <?php if ($_smarty_tpl->tpl_vars['status']->value == "A") {?>
						    <label><input type="radio" disabled checked name="status" value="A"/>Ativo</label>
						    <label><input type="radio" disabled name="status" value="I"/>Inativo</label>
						    <?php } else { ?>
						    <label><input type="radio" disabled name="status" value="A"/>Ativo</label>
						    <label><input type="radio" disabled checked name="status" value="I"/>Inativo</label>
						    <?php }?>
						</p>
						<?php } else { ?>
						<p> <?php if ($_smarty_tpl->tpl_vars['status']->value == "A") {?>
						    <label><input type="radio"  checked name="status" value="A"/>Ativo</label>
						    <label><input type="radio" name="status" value="I"/>Inativo</label>
						    <?php } else { ?>
						    <label><input type="radio" name="status" value="A"/>Ativo</label>
						    <label><input type="radio" checked name="status" value="I"/>Inativo</label>
						    <?php }?>
						</p>
						<?php }?>
                      </div>
					</div>
                  </div>
                  <?php }?>
                  <div class="row">
                    <div class="update ml-auto mr-auto">
					  <?php if ($_smarty_tpl->tpl_vars['estatus']->value == "novo") {?>
					  <input type="hidden" name="tipo_op" value="inserir">
					  <?php } else { ?>
					  <input type="hidden" name="tipo_op" value="atualizar">
					  <input type="hidden" name="codfornecedor" value="<?php echo $_smarty_tpl->tpl_vars['codFornecedor']->value;?>
">
					  <?php }?>
					  <?php if ($_smarty_tpl->tpl_vars['estatus']->value == "ver") {?>
					  <a href="listFornecedores.php" class="btn btn-primary btn-round">Cancelar</a>
					  <?php } else { ?>
                      <button type="submit" class="btn btn-primary btn-round">Salvar</button>
					  <a href="listFornecedores.php" class="btn btn-primary btn-round">Cancelar</a>
					  <?php }?>
                    </div>
                  </div>
                </form>
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
 src="../assets/js/core/jquery.min.js"><?php echo '</script'; ?>
>
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
  <?php echo '<script'; ?>
 src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"><?php echo '</script'; ?>
>
</body>

</html>
<?php }
}
