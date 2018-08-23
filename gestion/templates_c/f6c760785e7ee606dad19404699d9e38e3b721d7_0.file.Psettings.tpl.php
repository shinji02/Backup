<?php
/* Smarty version 3.1.32, created on 2018-08-01 15:16:09
  from '/var/www/BackupManagement/templates/admin/Psettings.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5b61b299a8fa67_65931161',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f6c760785e7ee606dad19404699d9e38e3b721d7' => 
    array (
      0 => '/var/www/BackupManagement/templates/admin/Psettings.tpl',
      1 => 1533129368,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b61b299a8fa67_65931161 (Smarty_Internal_Template $_smarty_tpl) {
?>
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
  </head>

  <body>
    <nav class="navbar navbar-dark sticky-top bg-blue flex-md-nowrap p-0">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="index.php"><?php echo $_smarty_tpl->tpl_vars['vars']->value['nameSiteWeb'];?>
</a>
      <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
          <a class="nav-link" href="../index.php?deconnect=1"><i class="far fa-power-off"></i> Deconnection</a>
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
                <a class="nav-link text-white" href="index.php">
                  <i class="far fa-home"></i> Panel administration <span class="sr-only">(current)</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white" href="index.php?page=PsiteWeb">
					<i class="far fa-book"></i> Gestion des sites
				</a>
              </li>
			  </li>			  
			  <li class="nav-item">
                <a class="nav-link text-white" href="index.php?page=Psrv">
					<i class="far fa-cog"></i> Gestion des serveur de sauvegarde
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white" href="index.php?page=Pbackup">
					<i class="fas fa-file-download"></i> Gestion des sauvegardes
				</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white" href="index.php?page=HistoricsBackup">
					<i class="far fa-history"></i> Historique des sauvegardes
                </a>
              </li>			  
			  <li class="nav-item">
                <a class="nav-link text-white blueac" href="index.php?page=Psettings">
					<i class="far fa-cog"></i> Paramétrage
                </a>
              </li>
            </ul>        
          </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
			<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
				<h1 class="h2">Paramétres</h1>
			</div>
				<div class="row">			
				</div>
        </main>
      </div>
    </div>

	  
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
