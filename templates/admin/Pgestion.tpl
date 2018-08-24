
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
    <!-- Custom styles for this template -->
    <link href="../templates/admin/css/dashboard.css" rel="stylesheet">
	<script src="../templates/libs/jquery/jquery-3.2.1.min.js"></script>
  </head>

  <body>
    <nav class="navbar navbar-dark sticky-top bg-blue flex-md-nowrap p-0">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="index.php">{$vars.nameSiteWeb}</a>
      <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
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
						  <i class="far fa-cog"></i> Gestion des serveurs de sauvegarde
					  </a>
					</li>
					<li class="nav-item">
						<a class="nav-link text-white blueac" href="index.php?page=Pgestion">
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
				<h1 class="h2">Gestion  des sauvegarde</h1>
			</div>
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
			<div id="listeSire">
				<div class="d-flex p-2 bg-light text-white fexwid table-Gestion" >
					<table class="table borderTable">
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
								<tr>
									<td class="siteTitle" colspan="5">{$foo['name']}</td>
								</tr>
								{foreach from=$backup key=k2 item=foo2}

									{if $foo2['id_site'] eq $foo['id']}
										<tr>
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
        </main>
      </div>
    <script src="../templates/admin/js/popper.min.js"></script>
    <script src="../templates/admin/js/bootstrap.min.js"></script>
	<script src="../templates/admin/js/gestion.js"></script>
  </body>
</html>
</html>
