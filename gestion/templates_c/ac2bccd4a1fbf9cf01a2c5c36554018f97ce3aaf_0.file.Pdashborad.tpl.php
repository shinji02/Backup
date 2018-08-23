<?php
/* Smarty version 3.1.32, created on 2018-07-26 08:59:53
  from 'C:\wamp64\www\BackupManagement\templates\admin\Pdashborad.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5b598d89d1ea30_68628185',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ac2bccd4a1fbf9cf01a2c5c36554018f97ce3aaf' => 
    array (
      0 => 'C:\\wamp64\\www\\BackupManagement\\templates\\admin\\Pdashborad.tpl',
      1 => 1532593749,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b598d89d1ea30_68628185 (Smarty_Internal_Template $_smarty_tpl) {
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
  </head>

  <body>
    <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
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
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link active" href="index.php">
                  <i class="far fa-home"></i> Panel administration <span class="sr-only">(current)</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="index.php?page=PsiteWeb">
					<i class="far fa-book"></i> Gestion des site
				</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="index.php?page=Pbackup">
					<i class="fas fa-file-download"></i> Gestion des sauvegarde
				</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="index.php?page=HistoricsBackup">
					<i class="far fa-history"></i> Historique des sauvegarde
                </a>
              </li>			  
			  <li class="nav-item">
                <a class="nav-link" href="index.php?page=Psettings">
					<i class="far fa-cog"></i> Paramétrage
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
				<div class="col">
					<div class="card card-inverse card-primary ">
						<blockquote class="card-blockquote p-3">
							<h4><?php echo $_smarty_tpl->tpl_vars['vars']->value['numberSie'];?>
 - site enregistrer</h4>
						</blockquote>
					</div>
				</div>
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