<?php
session_start();
if (!isset($_SESSION["userid"]) || $_SESSION['userrole']!=="admin") {
    header("Content-type:text/html;charset=uft-8");
    header("location:/login.php?from=".rawurlencode($_SERVER['REQUEST_URI']));
}

$file_dir = "/var/www/tmp/";
$file_name = $_GET["db"].".csv";

require "../sql/sql.php";
$queryString = "SELECT * FROM ".$_GET["db"];
if ($filter = $_GET["filter"]) {
    $queryString = "$queryString WHERE $filter";
}
$queryString .= " INTO OUTFILE '$file_dir$file_name'";
// $queryString .= " FIELDS TERMINATED BY ',' OPTIONALLY ENCLOSED BY '\"'";
// $queryString .= " ESCAPED BY '#' LINES TERMINATED BY '\\n'";
$query = $conn->query($queryString);

$file = fopen($file_dir . $file_name, "rb");

Header( "Content-type: " . mime_content_type( $file_dir . $file_name ) );
Header( "Accept-Ranges: bytes" );
Header( "Accept-Length: " . filesize ( $file_dir . $file_name ) );
Header( "Content-Disposition: attachment; filename=" . end(explode("/",$file_name)));

echo fread($file, filesize($file_dir . $file_name));
fclose($file);
unlink($file_dir . $file_name);
?>
