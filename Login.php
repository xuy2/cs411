<?php
$Email = $_POST['Email'];
$Password = $_POST['Password'];
$Gender = $_POST['Gender'];
$GRE_V = $_POST['GRE_V'];
$GRE_Q = $_POST['GRE_Q'];
$GRE_AW = $_POST['GRE_AW'];
$GPA = $_POST['GPA'];
$TOEFL = $_POST['TOEFL'];
$isRegister = $_POST['Register'];
$con = mysql_connect("","schoolhunter_admin","admin123");
if (!$con){
	die('Could not connect: ' . mysql_error());
}
// make schoolhunter_DataBase as the current db
$db_selected = mysql_select_db('schoolhunter_DataBase', $con);
if (!$db_selected) {
	die ('Can\'t use schoolhunter_DataBase : ' . mysql_error());
}
// check register or login
if($isRegister){
	$result = mysql_query("SELECT * FROM Users WHERE Email ='".$Email."'");
	$row = mysql_fetch_array($result);
	if($row){
		echo "Email already registered";
	}else{
		mysql_query("INSERT INTO Users (Email, Password, Gender, GRE_V, GRE_Q, GRE_AW, GPA, TOEFL) VALUES ('".$Email."', '".$Password."', '".$Gender."', '".$GRE_V."', '".$GRE_Q."', '".$GRE_AW."', '".$GPA."', '".$TOEFL."')");
		setcookie("Email", $Email, time() + 3600);
		header('Location: main.html');
	}
}else{
	$result = mysql_query("SELECT * FROM Users WHERE Email ='".$Email."'AND Password ='".$Password."'");
	$row = mysql_fetch_array($result);
	if ($row){
		setcookie("Email", $Email, time() + 3600);
		header('Location: main.html');
		
	}else{
		echo "Wrong email address or password";
	}
}
mysql_close($con);
?>
<html>
<head>
<title>
Main Page
</title>
</head>
<body>
</body>
</html>