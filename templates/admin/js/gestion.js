/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$("#siteName").change(function(event){
	if($("#siteName").val()!=0)
	{
		window.location.href ="index.php?page=Pgestion&idSite="+$("#siteName").val();
	}
	else
	{
		window.location.href ="index.php?page=Pgestion";
	}
});

$("#date").change(function(event){
	if($("#date").val()!=0)
	{
		window.location.href ="index.php?page=Pgestion&date="+$("#date").val();
	}
	else
	{
		window.location.href ="index.php?page=Pgestion";
	}
});

$("#emailSucess").change(function (event){
	if ($("#emailSucess").val()  == 1)
		$("#emailSucess").val("0");
	else
		$("#emailSucess").val("1");
});

$("#emailError").change(function (event){
	if ($("#emailError").val()  == 1)
		$("#emailError").val("0");
	else
		$("#emailError").val("1");
});