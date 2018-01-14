<?PHP
session_start();

$serv = "localhost";
$user = "root";
$pass = "ok";
$db_name = "rush";
$db = mysqli_connect($serv, $user, $pass, $db_name);
$sql = "SELECT nom FROM article";
$result = mysqli_query($db, $sql);

if (mysqli_num_rows($result) > 0)
{
    while($row = mysqli_fetch_assoc($result))
    {
        if ($row['nom'] === $_POST['nom'])
        {
			$_SESSION["del_err"] = "ok";
			$sql = "DELETE FROM article WHERE nom = '".$_POST['nom']."'";
			mysqli_query($db, $sql);
			header('Location: admin.php');
			exit;
        }
    }
}
$_SESSION["del_err"] = "err";
header('Location: admin.php');
exit;
?>
