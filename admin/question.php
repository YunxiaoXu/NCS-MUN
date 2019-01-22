<?php
session_start();
if (!isset($_SESSION["userid"]) || $_SESSION['userrole']!=="admin") {
    header("Content-type:text/html;charset=uft-8");
    header("location:/login.php?from=".rawurlencode($_SERVER['REQUEST_URI']));
}

require "../sql/sql.php";

$email = $_GET["email"];
$question = $_GET["q"];

$select = "SELECT d.cname, d.ename, d.team, d.job, q.$question FROM volunteer d INNER JOIN question q ON d.id=q.id WHERE d.email='$email'";

$row = $conn->query($select)->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Question Viewer</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        .user { float: right;}
        table { border-collapse: collapse; margin:10px 16%;}
        td { border: solid 1px black; padding: 5px 6px;}
    </style>
</head>
<body>
    <span class="user">
        user: <?php echo $_SESSION['username'];?> |
        <a href='/login.php?logout=true'>logout</a>
    </span>
    <br/>
    <br/>
    <table>
    <tbody>

<?php

$sentences = array(
    "chief1"=>"Why are you qualified for this position?",
    "chief2"=>"What characteristic do you have for this position?",
    "vol"=>"Why are you applying for this position?"
);


echo <<<ET
<tr>
    <td>Chinese Name: {$row['cname']}</td>
    <td>English Name: {$row['ename']}</td>
    <td>Team: {$row['team']}</td>
    <td>Job: {$row['job']}</td>
    <td>Question: $question</td>
</tr>
<tr>
    <td colspan="5">Q: {$sentences[$question]}</td>
</tr>
<tr>
    <td colspan="5" style="white-space:pre-wrap">{$row[$question]}</td>
</tr>
ET;
?>

    </tbody>
    </table>
</body>
</html>
