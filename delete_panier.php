<?PHP
session_start();

$serv = "localhost";
$user = "root";
$pass = "ok";
$db_name = "rush";
$db = mysqli_connect($serv, $user, $pass, $db_name);
$sql = "SELECT nom FROM ".$_SESSION['login'];
$result = mysqli_query($db, $sql);

if (mysqli_num_rows($result) > 0)
{
    while($row = mysqli_fetch_assoc($result))
    {
        if ($row['nom'] === $_POST['nom'])
        {
			$sql = "DELETE FROM ".$_SESSION['login']."  WHERE nom = '".$_POST['nom']."'";
			mysqli_query($db, $sql);
			header('Location: myaccount.php');
			exit;
        }
    }
}
header('Location: myaccount.php');
exit;
?>
