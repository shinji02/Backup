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
	  	<link href="../templates/admin/css/sb-admin.css" rel="stylesheet">
		<link href="../templates/admin/css/circle.css" rel="stylesheet">
	  <script src="../../libs/sweetAlert/sweetalert.min.js"></script>
	  <link href="../../libs/sweetAlert/sweetalert.css" rel="stylesheet">
  </head>

  <body id="page-top">
	  <nav class="navbar navbar-expand navbar-dark bg-primary static-top">
		  <a class="navbar-brand mr-1" href="index.html">{$vars.nameSiteWeb}</a>
		  <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
			  <i class="fas fa-bars"></i>
		  </button>
		  <div class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
			  <a title="Deconnection" class="nav-link text-light" href="../index.php?deconnect=1"><i class="far fa-power-off"></i></a>
		  </div>

	  </nav>
	  <div id="wrapper">
		  <ul class="sidebar navbar-nav custom-na color_nav_cus">
			  <li class="nav-item active">
				  <a class="nav-link" href="index.php">
					  <i class="far fa-home"></i> Panel administration <span class="sr-only">(current)</span>
				  </a>
			  </li>
			  <li class="nav-item ">
				  <a class="nav-link" href="index.php?page=PsiteWeb">
					  <i class="far fa-browser"></i> Gestion des sites <span class="sr-only">(current)</span>
				  </a>
			  </li>
			  <li class="nav-item ">
				  <a class="nav-link" href="index.php?page=Psrv">
					  <i class="far fa-server"></i> Gestion des serveurs de sauvegarde <span class="sr-only">(current)</span>
				  </a>
			  </li>
			  <li class="nav-item ">
				  <a class="nav-link" href="index.php?page=Pgestion">
					  <i class="far fa-history"></i> Gestion des sauvegardes<span class="sr-only">(current)</span>
				  </a>
			  </li>
			  <li class="nav-item ">
				  <a class="nav-link" href="index.php?page=Pcontrol">
					  <i class="fas fa-cog"></i> Controle Avancée
				  </a>
			  </li>
		  </ul>
		  <div id="content-wrapper">
			  <div class="container-fluid">
				  <div class="row">
					  <div class="col-xl-6 col-sm-6 mb-3">
						  <div class="card text-white bg-dark o-hidden h-100">
							  <div class="card-body">
								  <div class="card-body-icon">
									  <i class="fas fa-fw fa-browser"></i>
								  </div>
								  <div class="mr-5">{$vars.numberSie} Site Web</div>
							  </div>
						  </div>
					  </div>
					  <div class="col-xl-6 col-sm-6 mb-3">
						  <div class="card text-white bg-dark o-hidden h-100">
							  <div class="card-body">
								  <div class="card-body-icon">
									  <i class="fas fa-fw fa-server"></i>
								  </div>
								  <div class="mr-5">{$vars.numberSrvSite} - Serveur de sauvegarde enregistrer</div>
							  </div>
						  </div>
					  </div>
				  </div>
				  <br>
				  <div class="row">
					  <div class="col-md-12">
						  <div class="card text-white bg-dark o-hidden h-100">
							  <div class="card-body">
								  <h3 class="text-center">Espace de stockage</h3>
								  <div class="row">
									  <div class="col-sm">
									  </div>
									  <div class="col-sm text-center">
										  <div class="c100 center_progree {if $vars.percentage <= 50}green{else if $vars.percentage >= 51 && $vars.percentage <= 90}orange{else if $vars.percentage >= 91}red{/if} p{$vars.percentage}">
											  <span>{$vars.percentage}%</span>
											  <div class="slice">
												  <div class="bar"></div>
												  <div class="fill"></div>
											  </div>
										  </div>
										  Utiliser :  {$vars.diskusage}<br>
										  Libre	 :	{$vars.diskFree}<br>
										  Total	 :  {$vars.diskTotal}<br>
										  {if $vars.percentage >= 91}
											  <script>swal("Attention!", "Il ne reste plus beaucoup d'espace!", "error");</script>
										  {/if}
									  </div>
									  <div class="col-sm">
									  </div>
								  </div>
							  </div>
						  </div>
					  </div>
				  </div>
			  </div>
		  </div>
	  </div>
    </div>
	<script>window.jQuery || document.write('<script src="../templates/admin/js/jquery-slim.min.js"><\/script>')</script>
    <script src="../templates/admin/js/popper.min.js"></script>

	  <script src="../templates/admin/js/sb-admin.js"></script>
	-->
  </body>
</html>
