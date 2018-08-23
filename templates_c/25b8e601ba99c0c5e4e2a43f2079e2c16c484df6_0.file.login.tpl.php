<?php
/* Smarty version 3.1.32, created on 2018-08-03 15:45:37
  from '/var/www/BackupManagement/templates/login.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5b645c81e4f1d7_26829804',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '25b8e601ba99c0c5e4e2a43f2079e2c16c484df6' => 
    array (
      0 => '/var/www/BackupManagement/templates/login.tpl',
      1 => 1533303937,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b645c81e4f1d7_26829804 (Smarty_Internal_Template $_smarty_tpl) {
?><!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="">
		<meta name="author" content="">
		<link rel="icon" href="../../../../favicon.ico">
		<?php echo '<script'; ?>
 type='text/javascript' src='templates/libs/jquery.particleground.js'><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 type='text/javascript' src='templates/libs/demo.js'><?php echo '</script'; ?>
>
		<title>SiteConseil BackupMaganement</title>

		<!-- Bootstrap core CSS -->
		<link href="templates/css/bootstrap/bootstrap.min.css" rel="stylesheet">

		<!-- Custom styles for this template -->
		<link href="templates/css/cssPage/signin.css" rel="stylesheet">
		<?php echo '<script'; ?>
 src="templates/libs/jquery/jquery-3.2.1.min.js"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"><?php echo '</script'; ?>
>
		<link rel="stylesheet" href="templates/css/style.css"/>
		<link rel="stylesheet" href="templates/css/flat-ui.css"/>
		<link rel="stylesheet" href="templates/css/bootstrap.min.css"/>
		<link rel="stylesheet" href="templates/css/mystyle.css"/>
	</head>
	<body>
		<div id="particles" class="back_cus">
			<div id="intro" class="intro">
				<form id="formConnect" class="form-signin" action="" method="POST">
					<h2> Site Conseil <br> BackupManagement</h2>
					<hr class="style-three">
					<label for="passwordConnect" class="sr-only">Email address</label>
					<input id="passwordConnect" name="passwordConnect" type="password" class="form-control" placeholder="Mot de pase" required autofocus><br>
					<button class="btn btn-lg btn-primary btn-block" id="formConnectSend" type="submit">Connection</button>
				</form>
				<p class="text-center font-italic">Version 1.0</p>
			</div>
		</div>
	</body>
		
	<?php echo '<script'; ?>
>
		$("#formConnect").submit(function(e) {
			var url = "index.php?connect=1"; // the script where you handle the form input.

			$.ajax({
				   type: "POST",
				   url: url,
				   data: $("#formConnect").serialize(), // serializes the form's elements.
				   success: function(data)
				   {
					   eval(data); // show response from the php script.
				   }
				 });

			e.preventDefault(); // avoid to execute the actual submit of the form.
		});
	<?php echo '</script'; ?>
>-
</html>

<?php }
}
