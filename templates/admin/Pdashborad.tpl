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
	<link href="../templates/admin/css/circle.css" rel="stylesheet">
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
								<span class="h4 d-block font-weight-normal mb-2">{$vars.numberSie} - site enregistrer</span>
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
								<span class="h4 d-block font-weight-normal mb-2">{$vars.numberSrvSite} - Serveur de sauvegarde enregistrer</span>
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
							<div class="c100 {if $vars.percentage <= 50}green{else if $vars.percentage >= 51 && $vars.percentage <= 90}orange{else if $vars.percentage >= 91}red{/if} p{$vars.percentage}" style="left: 35%">
								<span>{$vars.percentage}%</span>
									<div class="slice">
									<div class="bar"></div>
									<div class="fill"></div>
								</div>
							</div>
						</div>
						Utiliser :  {$vars.diskusage}<br>
						Libre	 :	{$vars.diskFree}<br>
						Total	 :  {$vars.diskTotal}<br>
						{if $vars.percentage >= 91}
							<script>swal("Attention!", "Il ne reste plus beaucoup d'espace!", "error");</script>
						{/if}
					</div>
				</div>
			</div>
        </main>
      </div>
    </div>
	<script>window.jQuery || document.write('<script src="../templates/admin/js/jquery-slim.min.js"><\/script>')</script>
    <script src="../templates/admin/js/popper.min.js"></script>
    <script src="../templates/admin/js/bootstrap.min.js"></script>

  </body>
</html>
</html>
