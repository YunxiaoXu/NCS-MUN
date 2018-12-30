<?php
session_start();
echo "user:".$_SESSION['username'];
echo " | <a href='/login.php?logout=true'>logout</a>";
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
        table { border-collapse: collapse;}
        td { border: solid 1px black; padding: 5px 10px}
    </style>
</head>
<body>
    <h1>all delegate requests</h1>
    <form method="GET" action="check.php">
        <input type="text" id="filter" name="filter"/>
        <button type="submit">search</button>
    </form>
    <table>

<?php
require "../sql/sql.php";
$queryString = "SELECT * FROM delegate";
if ($filter = $_GET["filter"]) {
    $queryString = "$queryString where $filter";
}
//echo $queryString;
$query = $conn->query($queryString);
$delegate = $query->fetch_assoc();

echo "<tr>";
foreach($delegate as $k=>$v) {
    echo "<th>$k</th>";
}
echo "</tr>";

do {
    echo "<tr>";
    foreach($delegate as $v) {
        echo "<td>$v</td>";
    }
    echo "</tr>";
} while($delegate = $query->fetch_assoc());

?>

    </table>
</body>
</html>
