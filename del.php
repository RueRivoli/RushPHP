<?PHP

session_start();
$serv = "localhost";
$user = "root";
$pass = "ok";
$db_name = "rush";

$db = mysqli_connect($serv, $user, $pass, $db_name);
$sql = "DELETE FROM login WHERE login=\"".$_SESSION['login']."\"";
$_SESSION['login'] = "";
$result = mysqli_query($db, $sql);
session_destroy();

header('Location: index.php');
exit;
?>