<?php
session_start();
if (!isset($_SESSION["userid"]) || $_SESSION['userrole']!=="admin") {
    header("Content-type:text/html;charset=uft-8");
    header("location:/login.php?from=".rawurlencode($_SERVER['REQUEST_URI']));
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin System</title>
    <style>
        .option { float:left;}
        .user { float: right; }
        table { border-collapse: collapse;}
        td { border: solid 1px black; padding: 5px 10px}
    </style>
</head>
<body>

<?php
echo "<span class='option'>";
// echo "<a href='download.php?db=volunteer";
// echo isset($_GET["filter"])?"&filter=".$_GET["filter"]:"";
// echo "'>Download</a>";
echo "<span>NorthCross Model UN Conference</span>";
echo "</span>";

echo "<span class='user'>";
echo "user:".$_SESSION['username'];
echo " | <a href='/login.php?logout=true'>logout</a>";
echo "</span>";
?>

    <br/>
    <h1>Admin System</h1>

    <ul>
        <li><a href="check.php">check.php</a> Check applications.</li>
        <li><a href="addNews.php">addNews.php</a> Add news.</li>
    </ul>

</body>
</html>