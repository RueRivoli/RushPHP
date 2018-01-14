<?PHP
session_start();

$serv = "localhost";
$user = "root";
$pass = "ok";
$db_name = "rush";
$db = mysqli_connect($serv, $user, $pass, $db_name);

//$sql = "SELECT nom FROM article";
$sql = "SELECT categorie1 FROM article WHERE nom=\"".$_POST['search']."\"";
//$sql = "SELECT articles FROM articles WHERE nom=\"".$_POST['search']."\"";
$result = mysqli_query($db, $sql);
$data = mysqli_fetch_array($result);
echo $data['categorie1'];

if ($data['categorie1'] != "")
{
    echo "FPR";
    $_SESSION['mode'] = "single";
}

$sql = "SELECT categorie2 FROM article WHERE nom=\"".$_POST['search']."\"";
$result = mysqli_query($db, $sql);
$data = mysqli_fetch_array($result);
echo $data['categorie2'];

?>

<?php $data['categorie1'];?>