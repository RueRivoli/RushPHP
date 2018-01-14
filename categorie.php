<?PHP
session_start();
echo $_POST['action'];
$_SESSION['action'] = $_POST['action'];
header('Location: index.php');
exit;
?>
 