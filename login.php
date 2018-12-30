<!DOCTYPE html>
<html>
<head>
    <title>login</title>
</head>
<body>

<?php
session_start();
$from = $_GET['from'] or $from = $_POST["from"] or $from = "/";

if ($_GET["logout"]=='true') {
    unset($_SESSION['userid']);
    unset($_SESSION['username']);
	unset($_SESSION['userrole']);
	echo "<script>alert('Successfully logout.');</script>";
}

if ($_POST["check"]=="true") {
	$username = $_POST["name"];
	$password = $_POST["pswd"];

	$username = htmlspecialchars($username);
	$password = MD5($password);

	require "sql/sql.php";
	$query = "SELECT id,name,role FROM user WHERE name='$username' and password='$password'";
	$result = $conn->query($query);
	if ($row = $result->fetch_assoc()) {
        	$_SESSION['userid'] = $row['id'];
        	$_SESSION['username'] = $row['name'];
        	$_SESSION['userrole'] = $row['role'];
        	header("location:".rawurldecode($from));
	}
    echo <<<ET
<script>
alert("Incorrect username or password!");
location.href="/login.php?from=$from";
</script>
ET;
    die();
}
?>
    <h1>login</h1>
    <form method='POST' action='login.php'>
        <input type='hidden' name='check' value='true'/>
	<input type='hidden' name='from' value='<?php echo $from;?>'/>
        <table>
        <tr>
            <td>username:</td>
            <td><input type='text' name='name' required='required'/></td>
        </tr>
        <tr>
            <td>password:</td>
            <td><input type='password' name='pswd' required='required'/></td>
        </tr>
        </table>
        <input type='submit' value='login'>
    </form>
</body>
</html>
