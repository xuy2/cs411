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
</head>
<body>



<div class="container" align ='center'>
    <button onclick = "window.location = 'user_edit.php'">Edit</button>
    <table>
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
