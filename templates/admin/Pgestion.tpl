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
		<link href="../templates/admin/css/switch.css" rel="stylesheet">
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
			  <li class="nav-item">
				  <a class="nav-link" href="index.php">
					  <i class="far fa-home"></i> Panel administration <span class="sr-only">(current)</span>
				  </a>
			  </li>
			  <li class="nav-item">
				  <a class="nav-link" href="index.php?page=PsiteWeb">
					  <i class="far fa-browser"></i> Gestion des sites <span class="sr-only">(current)</span>
				  </a>
			  </li>
			  <li class="nav-item ">
				  <a class="nav-link" href="index.php?page=Psrv">
					  <i class="far fa-server"></i> Gestion des serveurs de sauvegarde <span class="sr-only">(current)</span>
				  </a>
			  </li>
			  <li class="nav-item active">
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
			<div class="row">
				<div class="col-xs-12 col-sm-6">
					<div class="form-group">
						<label for="" class="col-2 col-form-label">Site</label>
						<div class="col-10">
							<select id="siteName" class="form-control" name="nameSite">
								<option value="0" selected>Tout les sites</option>
								{foreach from=$listSite key=k item=nameSite}
									<option value="{$nameSite.id}"{if isset($smarty.get.idSite) && ($smarty.get.idSite == $nameSite.id)}selected{/if}>{$nameSite.name}</option>
								{/foreach}
							</select>
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-sm-6">
					<div class="form-group">
						<label for="example-date-input" class="col-2 col-form-label">Date</label>
						<div class="col-10">
							<input id="date" class="form-control" value="{if isset($smarty.get.date)}{$smarty.get.date|date_format:"%Y-%m-%d"}{else}{$smarty.now|date_format:"%Y-%m-%d"}{/if}" type="date">
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-12">
				<div class="backgroundBlack tableHeight">
					<table class="table backgroundBlack">
						<thead class="thead-dark">
							<tr>
								<th scope="col">#</th>
								<th scope="col">Date</th>
								<th scope="col">Fichier</th>
								<th scope="col">Status</th>
								<th scope="col">Gestion</th>
							</tr>
						</thead>
						<tbody>
							{foreach from=$site key=k item=foo}
								<tr class="">
									<td class="siteTitle text-center" colspan="5">{$foo['name']}</td>
								</tr>
								{foreach from=$backup key=k2 item=foo2}

									{if $foo2['id_site'] eq $foo['id']}
										<tr class="tr-black">
											<th class="" scope="row">{$foo2['id']}</th>
											<td class="">{$foo2['date']}</td>
											<td class="">{$foo2['name_file']}</td>
											<td class="text-white">
												{if $foo2['status'] eq "ok"} 
													<button type="button" class="btn btn-success">Réussie</button>
												{else}
													<button type="button" class="btn btn-danger">Echec</button>
												{/if}
											</td>
											<td>
												<div class="row">
													<div class="col-sm-12">
														{if $foo2['status'] eq "ok"} 													
															<a href="{$foo2['link_file']}" class="btn btn-dark" style="width:100%"><i class="fa fa-download" download></i></a>
														{/if}
													</div>
												</div>
											</td>
										</tr>
									{/if}
								{/foreach}
							{/foreach}			
						</tbody>
					</table>
				</div>
			</div>				
		</div>
		<script src="../templates/admin/js/popper.min.js"></script>
		<script src="../templates/admin/js/bootstrap.min.js"></script>
		<script src="../templates/admin/js/gestion.js"></script>
	  </body>
	</html>
	</html>
