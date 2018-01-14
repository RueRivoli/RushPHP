<?PHP 
session_start();
$serv = "localhost";
$user = "root";
$pass = "ok";
$db_name = "rush";
$db = mysqli_connect($serv, $user, $pass, $db_name);


$sql = "SELECT login, mdp FROM login";
$result = mysqli_query($db, $sql);

if (mysqli_num_rows($result) > 0)
{
    
    while($row = mysqli_fetch_assoc($result))
    {
        
            //$_SESSION['login'] = "";
            //$_SESSION['mdp'] = "";
            session_destroy();
            header('Location: index.php');
            exit;
    }
}
header('Location: index.php');
exit;
?>