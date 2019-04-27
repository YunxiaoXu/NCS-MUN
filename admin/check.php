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
    <title>check page</title>
    <style>
        .option { float:left;}
        .user { float: right; }
        table { border-collapse: collapse;}
        td { border: solid 1px black; padding: 5px 10px}
    </style>
</head>
<body>

<?php
$db = isset($_GET["db"])?$_GET["db"]:"delegate";

echo "<span class='option'>";
echo "<a href='download.php?db=$db";
echo isset($_GET["filter"])?"&filter=".$_GET["filter"]:"";
echo "'>Download</a>";
echo "</span>";

echo "<span class='user'>";
echo "user:".$_SESSION['username'];
echo " | <a href='/login.php?logout=true'>logout</a>";
echo "</span>";
?>

    <br/>
    <h1>all <?php echo $db;?> requests</h1>
    <div>
        <a href="check.php?db=delegate">delegate</a>
        <a href="check.php?db=volunteer">volunteer</a>
    </div>
    <form method="GET" action="check.php">
        <input type='hidden' name="db" value="<?php echo $db;?>">
        <input type="text" id="filter" name="filter"/>
        <button type="submit">search</button>
    </form>
    <table>

<?php
require "../sql/sql.php";
$queryString = "SELECT * FROM $db";
if ($filter = $_GET["filter"]) {
    $queryString = "$queryString where $filter";
}
//echo $queryString;
$query = $conn->query($queryString);
$data = $query->fetch_assoc();

echo "<tr>";
foreach($data as $k=>$v) {
    echo "<th>$k</th>";
}
echo "</tr>";

do {
    echo "<tr>";
    foreach($data as $v) {
        echo "<td>$v</td>";
    }
    echo "</tr>";
} while($data = $query->fetch_assoc());

?>

    </table>
</body>
</html>
