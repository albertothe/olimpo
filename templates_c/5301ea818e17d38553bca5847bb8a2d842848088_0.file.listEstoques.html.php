<?php
/* Smarty version 3.1.30, created on 2019-09-26 14:55:45
  from "c:\xampp\htdocs\olimpo\templates\listEstoques.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5d8cb5514f3ac8_64796263',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5301ea818e17d38553bca5847bb8a2d842848088' => 
    array (
      0 => 'c:\\xampp\\htdocs\\olimpo\\templates\\listEstoques.html',
      1 => 1569502538,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d8cb5514f3ac8_64796263 (Smarty_Internal_Template $_smarty_tpl) {
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
                <h4 class="card-title">Lista de Estoques - $ Total: <?php echo $_smarty_tpl->tpl_vars['estTotal']->value;?>
 - Qnt Total: <?php echo $_smarty_tpl->tpl_vars['qntTotal']->value;?>
</h4>
				<a href="frmCadAvarias.php" class="btn btn-outline-primary pull-right btn-sm btn-round">Lanç.Avaria</a>
				<a href="frmCadOutrosMov.php" class="btn btn-outline-primary pull-right btn-sm btn-round">Outros Mov.</a>
              </div>
			  
	         <div class="card-body pt-5">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      <th>
                        Cod.
                      </th>
                      <th>
                        Produto
                      </th>
                      <th>
                        Qnt.Est.
                      </th>
                      <th>
                        Qnt.Avaria
                      </th>
                      <th>
                        Est.Minimo
                      </th>
                      <th>
                        Vlr.Custo
                      </th>
                      <th>
                        Vlr.Atacado
                      </th>
                      <th>
                        Vlr.Varejo
                      </th>
                      <th>
                        Markup(%)
                      </th>
                      <th>
                        MdaVndDia
                      </th>
                      <th>
                        Curva
                      </th>
                      <th>
                        Ações
                      </th>
                    </thead>
					<?php
$__section_i_0_saved = isset($_smarty_tpl->tpl_vars['__smarty_section_i']) ? $_smarty_tpl->tpl_vars['__smarty_section_i'] : false;
$__section_i_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['idEstoque']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_i_0_total = $__section_i_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_i'] = new Smarty_Variable(array());
if ($__section_i_0_total != 0) {
for ($__section_i_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] = 0; $__section_i_0_iteration <= $__section_i_0_total; $__section_i_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']++){
?>
                    <tbody>
                      <tr>
                        <td>
                         <?php echo $_smarty_tpl->tpl_vars['codigo']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)];?>

                        </td>
                        <td>
                          <?php echo $_smarty_tpl->tpl_vars['descricao']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)];?>

                        </td>
						<td class="text-right">
                          <?php echo $_smarty_tpl->tpl_vars['qntestoque']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)];?>

                        </td>
						<td class="text-right">
                          <?php echo $_smarty_tpl->tpl_vars['qntavaria']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)];?>

                        </td>
						<td class="text-right">
                          <?php echo $_smarty_tpl->tpl_vars['qntminima']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)];?>

                        </td>
						<td class="text-right">
                          <?php echo $_smarty_tpl->tpl_vars['vlrcusto']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)];?>

                        </td>
						<td class="text-right">
                          <?php echo $_smarty_tpl->tpl_vars['vlrvnd_ata']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)];?>

                        </td>
						<td class="text-right">
                          <?php echo $_smarty_tpl->tpl_vars['vlrvnd_rev']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)];?>

                        </td>
						<td class="text-right">
                          <?php echo $_smarty_tpl->tpl_vars['markup']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)];?>

                        </td>
						<td class="text-right">
                          <?php echo $_smarty_tpl->tpl_vars['medvnddia']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)];?>

                        </td>						
						<td>
                          <?php echo $_smarty_tpl->tpl_vars['curva_fin']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)];?>

                        </td>
						<td>
							<a class="btn btn-outline-danger btn-sm" href="javascript:displaylightbox('../funcoes/modalGrades.php?codproduto=<?php echo $_smarty_tpl->tpl_vars['codigo']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)];?>
',{})" target="_self">Grades</a>
						</td>
                      </tr>
                    </tbody>
					<?php
}
}
if ($__section_i_0_saved) {
$_smarty_tpl->tpl_vars['__smarty_section_i'] = $__section_i_0_saved;
}
?>
                  </table>
                </div>
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
