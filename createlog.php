<?PHP
session_start();
$serv = "localhost";
$user = "root";
$pass = "ok";
$db_name = "rush";
$db = mysqli_connect($serv, $user, $pass, $db_name);

$_SESSION["create_err"] = "ok";
$sql = "SELECT login FROM login";
$result = mysqli_query($db, $sql);

if (mysqli_num_rows($result) > 0) 
{
	while($row = mysqli_fetch_assoc($result))
	{
		if ($row["login"] == $_POST['uname'])
		{
			$_SESSION['create_err'] = "err";
			header('Location: index.php');
			exit;
		}
	}
}

$sql = "INSERT INTO login(id, login, mdp) VALUES(NULL,'".$_POST['uname']."', '".$_POST['psw']."')";
$_SESSION['create_err'] = "ok";
mysqli_query($db, $sql);
$sql = "CREATE TABLE ".$_POST['uname']."(
		nom VARCHAR(40)
		)";
mysqli_query($db, $sql);
mysqli_close($db);
header('Location: index.php');
exit;
?>
