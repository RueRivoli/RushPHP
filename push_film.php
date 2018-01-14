<?PHP
session_start();


$serv = "localhost";
$user = "root";
$pass = "ok";
$db_name = "rush";
$db = mysqli_connect($serv, $user, $pass, $db_name);

$_SESSION["push_err"] = "ok";
$sql = "SELECT nom FROM article";
$result = mysqli_query($db, $sql);

if (mysqli_num_rows($result) > 0) 
{
	while($row = mysqli_fetch_assoc($result))
	{
		if ($row['nom'] === $_POST['name'])
		{
			$_SESSION["push_err"] = "err";
			mysqli_close($db);
			header('Location: admin.php');
			exit;
		}
	}
}
$_SESSION["push_err"] = "ok";
$sql = "INSERT INTO article(id, nom, prix, categorie1,categorie2, categorie3, lien) VALUES(NULL,'".$_POST['name']."', ".$_POST['prix'].", '".$_POST['cat1']."', '".$_POST['cat2']."', '".$_POST['cat3']."', '".$_POST['image']."')";
mysqli_query($db, $sql);
mysqli_close($db);
header('Location: admin.php');
exit;
?>
