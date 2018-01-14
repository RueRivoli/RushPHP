<?PHP

session_start();
$serv = "localhost";
$user = "root";
$pass = "ok";
$db_name = "rush";
$db = mysqli_connect($serv, $user, $pass, $db_name);

$sql = "SELECT login FROM login";
$result = mysqli_query($db, $sql);

$sql = "INSERT INTO ".$_SESSION['login']."(nom) VALUES('".$_POST['acheter']."')";
mysqli_query($db, $sql);
mysqli_close($db);
header('Location: index.php');
exit;

?>
