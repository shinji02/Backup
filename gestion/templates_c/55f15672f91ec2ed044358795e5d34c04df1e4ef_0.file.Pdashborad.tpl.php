<?php
/* Smarty version 3.1.32, created on 2018-08-27 10:44:28
  from 'C:\wamp64\www\BackupManagement\templates\admin\Pdashborad.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5b83d60c5761a3_41164462',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '55f15672f91ec2ed044358795e5d34c04df1e4ef' => 
    array (
      0 => 'C:\\wamp64\\www\\BackupManagement\\templates\\admin\\Pdashborad.tpl',
      1 => 1535114594,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b83d60c5761a3_41164462 (Smarty_Internal_Template $_smarty_tpl) {
?><!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title><?php if (isset($_smarty_tpl->tpl_vars['vars']->value['nameSiteWeb'])) {
echo $_smarty_tpl->tpl_vars['vars']->value['nameSiteWeb'];
} else { ?>Sans titre<?php }?></title>

    <!-- Bootstrap core CSS -->
    <link href="../templates/css/bootstrap/bootstrap.min.css" rel="stylesheet">
	<link href="../templates/css/fontawesomepro/css/all.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="../templates/admin/css/dashboard.css" rel="stylesheet">
	<link href="../templates/admin/css/circle.css" rel="stylesheet">
	<?php echo '<script'; ?>
 src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"><?php echo '</script'; ?>
>
  </head>

  <body>
    <nav class="navbar navbar-dark sticky-top bg-blue flex-md-nowrap p-0">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="index.php"><?php echo $_smarty_tpl->tpl_vars['vars']->value['nameSiteWeb'];?>
</a>
      <ul class="navbar-nav px-3">
        <li class="nav-item text-light">
          <a class="nav-link text-light" href="../index.php?deconnect=1"><i class="far fa-power-off"></i> Deconnection</a>
        </li>
      </ul>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <nav class="col-md-2 d-none d-md-block sidebar bg-blue">
			<div class="sidebar-sticky">
				<ul class="nav flex-column">
					<li class="nav-item">
						<a class="nav-link active" href="index.php">
							<i class="far fa-home"></i> Panel administration <span class="sr-only">(current)</span>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link text-white blueac" href="index.php">
						<i class="far fa-home"></i> Panel administration <span class="sr-only">(current)</span>
						</a>
					</li>
					<li class="nav-item">
					  <a class="nav-link text-white" href="index.php?page=PsiteWeb">
						  <i class="far fa-book"></i> Gestion des sites
					  </a>
					</li>		  
					<li class="nav-item">
					  <a class="nav-link text-white" href="index.php?page=Psrv">
						  <i class="far fa-cog"></i> Gestion des serveurs de sauvegarde
					  </a>
					</li>
					<li class="nav-item">
					  <a class="nav-link text-white" href="index.php?page=Pgestion">
						  <i class="far fa-history"></i> Gestion des sauvegardes
					  </a>
					</li>
					<li class="nav-item">
						<a class="nav-link text-white" href="index.php?page=Pcontrol">
							<i class="fas fa-cog"></i> Controle Avancée
						</a>
					</li>					
				</ul>        
			</div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h1 class="h2">Panel administration</h1>
          </div>
			<div class="row">
				<div class="col-md-4">
					<div class="card p-4">
						<div class="card-body d-flex justify-content-between align-items-center">
							<div>
								<span class="h4 d-block font-weight-normal mb-2"><?php echo $_smarty_tpl->tpl_vars['vars']->value['numberSie'];?>
 - site enregistrer</span>
							</div>
							<div class="h2 text-muted">
								<i class="far fa-browser"></i>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="card p-4">
						<div class="card-body d-flex justify-content-between align-items-center">
							<div>
								<span class="h4 d-block font-weight-normal mb-2"><?php echo $_smarty_tpl->tpl_vars['vars']->value['numberSrvSite'];?>
 - Serveur de sauvegarde enregistrer</span>
							</div>

							<div class="h2 text-muted">
								<i class="fal fa-server"></i>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4">
					<div class="card p-4">
						<div class="card-body">
							<h3 class="text-center">Espace de stockage</h3>
							<div class="c100 <?php if ($_smarty_tpl->tpl_vars['vars']->value['percentage'] <= 50) {?>green<?php } elseif ($_smarty_tpl->tpl_vars['vars']->value['percentage'] >= 51 && $_smarty_tpl->tpl_vars['vars']->value['percentage'] <= 90) {?>orange<?php } elseif ($_smarty_tpl->tpl_vars['vars']->value['percentage'] >= 91) {?>red<?php }?> p<?php echo $_smarty_tpl->tpl_vars['vars']->value['percentage'];?>
" style="left: 35%">
								<span><?php echo $_smarty_tpl->tpl_vars['vars']->value['percentage'];?>
%</span>
									<div class="slice">
									<div class="bar"></div>
									<div class="fill"></div>
								</div>
							</div>
						</div>
						Utiliser :  <?php echo $_smarty_tpl->tpl_vars['vars']->value['diskusage'];?>
<br>
						Libre	 :	<?php echo $_smarty_tpl->tpl_vars['vars']->value['diskFree'];?>
<br>
						Total	 :  <?php echo $_smarty_tpl->tpl_vars['vars']->value['diskTotal'];?>
<br>
						<?php if ($_smarty_tpl->tpl_vars['vars']->value['percentage'] >= 91) {?>
							<?php echo '<script'; ?>
>swal("Attention!", "Il ne reste plus beaucoup d'espace!", "error");<?php echo '</script'; ?>
>
						<?php }?>
					</div>
				</div>
			</div>
        </main>
      </div>
    </div>
	<?php echo '<script'; ?>
 src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
>window.jQuery || document.write('<?php echo '<script'; ?>
 src="../templates/admin/js/jquery-slim.min.js"><\/script>')<?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="../templates/admin/js/popper.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="../templates/admin/js/bootstrap.min.js"><?php echo '</script'; ?>
>

  </body>
</html>
</html>
<?php }
}
