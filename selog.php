<?PHP 

session_start();

$serv = "localhost";
$user = "root";
$pass = "ok";
$db_name = "rush";
$db = mysqli_connect($serv, $user, $pass, $db_name);
$_SESSION["log_err"] = "ok";
$sql = "SELECT login, mdp FROM login";
$result = mysqli_query($db, $sql);

if (mysqli_num_rows($result) > 0)
{
    while($row = mysqli_fetch_assoc($result))
    {
        if ($row['login'] === $_POST['uname'] && $row['mdp'] === $_POST['psw'])
        {
            $_SESSION['login'] = $_POST['uname'];
            $_SESSION['mdp'] = $_POST['psw'];
			$_SESSION["log_err"] = "ok";
			header('Location: index.php');
			exit;
        }
    }
}
$_SESSION["log_err"] = "err";
header('Location: index.php');
exit;
?>
