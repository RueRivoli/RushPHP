<?PHP

$serv = "localhost";
$user = "root";
$pass = "ok";
$db_name = "rush";



$db = mysqli_connect($serv, $user, $pass);
if (!$db)
	die("Connection failed: " . mysqli_connect_error());

$sql = "CREATE DATABASE IF NOT EXISTS rush";
if (mysqli_query($db, $sql))
{
}
else 
	echo "Error creating database rush: " . mysqli_error($db);
mysqli_close($db);
$db = mysqli_connect($serv, $user, $pass, $db_name);
if (!$db)
	die("Connection failed: " . mysqli_connect_error());
$sql = "CREATE TABLE IF NOT EXISTS article (
		id SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT,
		nom VARCHAR(40) NOT NULL,
		prix INT NOT NULL,
		categorie1 VARCHAR(20) NOT NULL,
		categorie2 VARCHAR(20),
		categorie3 VARCHAR(20),
		lien VARCHAR(250),
		PRIMARY KEY (id)
	)";
if (mysqli_query($db, $sql))
{
}
else 
	echo "Error creating Table article: " . mysqli_error($db);
$sql = "CREATE TABLE IF NOT EXISTS login (
	id SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT,
	login VARCHAR(20),
	mdp VARCHAR(30),
	PRIMARY KEY (id)
)";
if (mysqli_query($db, $sql))
{
}
else 
	echo "Error creating Table login: " . mysqli_error($db);
mysqli_close($db);
?>
