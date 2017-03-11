<?php
    $email = $_COOKIE["Email"];
    $con = mysql_connect("","schoolhunter_admin","admin123");
    if (!$con){
        die('Could not connect: ' . mysql_error());
    }

    $db_selected = mysql_select_db('schoolhunter_DataBase', $con);

    if (!$db_selected) {
        die ('Can\'t use schoolhunter_DataBase : ' . mysql_error());
    }


    $query = sprintf("SELECT `Password`, `Gender`, `GRE_V`, `GRE_Q`, `GRE_AW`, `GPA`, `TOEFL` FROM Users WHERE Email='%s' LIMIT 1;",
        mysql_real_escape_string($email));
    $result = mysql_query($query, $con);
    $row = mysql_fetch_assoc($result);
    mysql_close($con);
    $password = $row["Password"];
    $gender = $row["Gender"];
    $gre_v = $row["GRE_V"];
    $gre_q = $row["GRE_Q"];
    $gre_aw =$row["GRE_AW"];
    $gpa = $row["GPA"];
    $toefl = $row["TOEFL"];

    function is_male($gender) {
        if ($gender == "M") {
            return "checked";
        } else {
            return "";
        }
    }

    function is_female($gender) {
        if ($gender == "F") {
            return "checked";
        } else {
            return "";
        }
    }
?>

<html>
<head>
    <meta charset= 'utf-8'>
    <title> Welcome to schoolHunter</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="user.css" rel="stylesheet">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>

<body>
<div class="container">

<nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">School Hunter</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="/">Home</a></li>
                <li><a href="/user.php">User</a></li>
            </ul>
        </div><!--/.nav-collapse -->
</nav>



<div class="container">
    <div class="row">
        <div class="col-md-2 offset-md-5">
            <div class="btn-group-vertical" role="group" aria-label="">
                <button type="button" class="btn btn-primary" onclick = "window.location = 'user_edit.php'">Edit</button>
                <button type="button" class="btn btn-danger" onclick = "window.location = 'user_remove.php'"> Delete Account </button>
            </div>
        </div>

        <div class="col-md-4">
            <div class="panel panel-primary">
                <!-- Default panel contents -->
                <div class="panel-heading">Profile</div>

                <!-- Table -->
                <table class="table">
                    <tr>
                        <td>Email</td>
                        <td><?=$email?></td>
                    </tr>

                    <tr>
                        <td>Gender</td>
                        <td><?=$gender?></td>
                    </tr>

                    <tr>
                        <td>GRE Verval</td>
                        <td><?=$gre_v?></td>
                    </tr>

                    <tr>
                        <td>GRE Quantitative</td>
                        <td><?=$gre_q?></td>
                    </tr>

                    <tr>
                        <td>GRE Analytical Writing</td>
                        <td><?=$gre_aw?></td>
                    </tr>

                    <tr>
                        <td>GPA</td>
                        <td><?=$gpa?></td>
                    </tr>

                    <tr>
                        <td>TOEFL</td>
                        <td><?=$toefl?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
