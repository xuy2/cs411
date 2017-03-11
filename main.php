<?php
	$Email = $_COOKIE["Email"];
	$con = mysql_connect("","schoolhunter_admin","admin123");
	if (!$con){
		die('Could not connect: ' . mysql_error());
	}
	// make schoolhunter_DataBase as the current db
	$db_selected = mysql_select_db('schoolhunter_DataBase', $con);
	if (!$db_selected) {
		die ('Can\'t use schoolhunter_DataBase : ' . mysql_error());
	}
	$User_GRE_Q = mysql_query("SELECT GRE_Q FROM Users WHERE Email ='".$Email."'");
	$row = mysql_fetch_array($User_GRE_Q);
	$result = mysql_query("SELECT * FROM Program WHERE ".$row['GRE_Q']." > GRE_Q");
	while($result_row = mysql_fetch_array($result)){
  		echo $result_row['PName'];
	}
	mysql_close($con);

?>