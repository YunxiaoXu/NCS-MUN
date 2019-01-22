<!DOCTYPE html>
<html>
    <head>
        <title>submit</title>
        <style>
            table {
                border-collapse: collapse;
            }
            td {
                border: solid 1px black;
                padding: 5px 10px;
            }
        </style>
    </head>
    <body>
        <h1>submit</h1>
            <table>

<?php
foreach($_POST as $k=>$v) {
    echo "<tr>";
    echo "<td>$k</td><td>$v</td>";
    echo "</tr>";
}
?>

        </table>

<?php
$cname = $_POST["cname"];
$ename = $_POST["ename"];
$grade = $_POST["grade"];
$email = htmlspecialchars($_POST["email"]);
$wechat = htmlspecialchars($_POST["wechat"]);
$team = $_POST["team"];
$job = $_POST["job"];
$chief1 = htmlspecialchars($_POST["chief1"], ENT_QUOTES);
// $chief2 = htmlspecialchars($_POST["chief2"], ENT_QUOTES);
$vol1 = htmlspecialchars($_POST["vol1"], ENT_QUOTES);
//var_dump($vol1);

require "../sql/sql.php";

$select = "SELECT id FROM volunteer WHERE cname='$cname' and email='$email'";
$repeatingCheck = $conn->query($select);

if ($repeatingCheck->fetch_assoc()) {
    print("<script>alert('Same name and email already exit.');history.go(-1);</script>");
}

$insert = "INSERT INTO volunteer (cname, ename, grade, email,
 wechat, team, job, chief1, vol, submission_date) VALUES
 ('$cname', '$ename', $grade, '$email', '$wechat','$team', '$job', '".
 ($job=="chief"?"<a href=\'question.php?email=$email&q=chief1\'>chief1</a>":" - ")."', '".
 ($job=="vol"?"<a href=\'question.php?email=$email&q=vol\'>vol</a>":" - ")."', ".
 "now())";

if ($conn->query($insert) === true) {
    $id = $conn->query($select)->fetch_assoc()["id"];

    $insert2 = "INSERT INTO question (id, chief1, vol)
     VALUES ($id, '$chief1', '$vol1')";
    //echo $insert2;
    
    if ($conn->query($insert2)===true) {
        echo "<p>You have successfully signed up!</p>";
    } else {
        echo "<p>Sign up Failed. Please check the questions.</p>";
    }
} else {
        echo "<p>Sign up Failed. Please check the information.</p>";
}
?>
    </body>
</html>
