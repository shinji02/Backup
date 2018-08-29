<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>{if isset($vars.nameSiteWeb)}{$vars.nameSiteWeb}{else}Sans titre{/if}</title>

    <!-- Bootstrap core CSS -->
	
    <link href="../templates/css/bootstrap/bootstrap.min.css" rel="stylesheet">
	<link href="../templates/css/fontawesomepro/css/all.css" rel="stylesheet">
	<script src="../templates/libs/jquery/jquery-3.2.1.min.js"></script>
    <!-- Custom styles for this template -->
    <link href="../templates/admin/css/dashboard.css" rel="stylesheet">
	<script src="../../libs/sweetAlert/sweetalert.min.js"></script>
	<link href="../../libs/sweetAlert/sweetalert.css" rel="stylesheet">
	 
  </head>

  <body>
    <nav class="navbar navbar-dark sticky-top bg-blue flex-md-nowrap p-0">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="index.php">{$vars.nameSiteWeb}</a>
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
						<a class="nav-link text-white" href="index.php">
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
						  <i class="far fa-server"></i> Gestion des serveurs de sauvegarde
					  </a>
					</li>
					<li class="nav-item">
					  <a class="nav-link text-white" href="index.php?page=Pgestion">
						  <i class="far fa-history"></i> Gestion des sauvegardes
					  </a>
					</li>
					<li class="nav-item">
						<a class="nav-link text-white blueac" href="index.php?page=Pcontrol">
							<i class="fas fa-cog"></i> Controle Avancée
						</a>
					</li>					
				</ul>        
			</div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
			<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
				<h1 class="h2">Controle Avancée</h1>
			 </div>

			<div class="row">
				<div class="swatches-col" style="width: 100%">
					<div class="pallete-item" style="width:22%">
						<dl class="palette palette-wet-asphalt">
							<dt>Paramétre du site</dt>
						</dl>
					</div>
					<div class="pallete-item" style="width: 22%">
						<dl class="palette palette-wet-asphalt">
							<dt>Paramètre des backups</dt>
                            <br>
                            <div class="row">
                                <div class="col-8">
                                    <h6>Activer auto backup</h6>
                                </div>
                                <div>
                                    <div class="col-4 text-center">
                                        <label class="label-switch switch-success">
                                            <input type="checkbox" class="switch-square switch-bootstrap status" name="activateAutoBackup" id="activateAutoBackup" value="{$vars['settings'][0].auto_backup}" {if $vars['settings'][0].auto_backup == 1}checked="checked"{/if}>
                                            <span class="lable"></span></label>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <a id="launchBackup" class="btn btn-block btn-custom">Lancer les backups</a>
                            </div>

						</dl>
					</div>
					<div class="pallete-item" style="width: 22%">
						<dl class="palette palette-wet-asphalt">
							<dt>Paramètre des emails</dt>
							<br>
							<div class="row">
								<div class="col-8">
									<h6>Email de réussite du backup</h6>
								</div>
								<div class="col-4 text-center">
									<label class="label-switch switch-success">																
									<input type="checkbox" class="switch-square switch-bootstrap status" name="emailSucess" id="emailSucess" value="{$vars['settings'][0].send_email_success}" {if $vars['settings'][0].send_email_success == 1}checked="checked"{/if}>
									<span class="lable"></span></label>
								</div>
							</div>
							<div class="row">
								<div class="col-8">
									<h6>Email d'échec du backup</h6>
								</div>
								<div class="col-4 text-center">
									<label class="label-switch switch-success">																
									<input type="checkbox" class="switch-square switch-bootstrap status" name="emailError" id="emailError" value="{$vars['settings'][0].send_email_error}" {if $vars['settings'][0].send_email_error == 1}checked="checked"{/if}>
									<span class="lable"></span></label>
								</div>
							</div>
							<div class="row">
								<div class="col-8">
									<h6>Email d'information</h6>
								</div>
								<div class="col-4 text-center">
									<label class="label-switch switch-success">																
									<input type="checkbox" class="switch-square switch-bootstrap status" name="emailInfo" id="emailInfo" value="{$vars['settings'][0].send_email_info}" {if $vars['settings'][0].send_email_info == 1}checked="checked"{/if}>
									<span class="lable"></span></label>
								</div>
							</div>
						</dl>
					</div>
					<div class="pallete-item" style="width:  22%">
						<dl class="palette palette-wet-asphalt">
							<dt>Base de données</dt>
                            <br>
                            <div>
                                <a id="purgeEchec" class="btn btn-block btn-custom">Purger les echec</a>
                            </div>
						</dl>
					</div>
				</div>
			</div>
        </main>
      </div>
    </div>
	<script>window.jQuery || document.write('<script src="../templates/admin/js/jquery-slim.min.js"><\/script>')</script>
    <script src="../templates/admin/js/popper.min.js"></script>
    <script src="../templates/admin/js/bootstrap.min.js"></script>	
	<script src="../templates/admin/js/gestion.js"></script>	
  </body>
</html>
</html>
