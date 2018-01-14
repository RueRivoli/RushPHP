<?PHP 
session_start();
?>

<html>


<Head>

<meta charset= "UTF-8" name = "yguzman fgallois" content = "The new sport">
<TITLE>See your dreams</TITLE>
<link rel="stylesheet" type="text/css" href="style.css" media="all"/>

</Head>



<header>
    <span class= "bigtitle"> 
    <img src="img/cinema.png" alt="Cinema" >     
    So moovy!
           
</span><br/><br/><br/><br/>


<span class="research">Recherche ton film <input type="search" placeholder="Entrez un mot-clef" name="the_search"></span>

<span class="welcome">Sois le bienvenu <?PHP echo $_SESSION['login']?>!</span>
<span class="deconnection"><form method="post" action='sedelog.php'><button type="submit" value="Deconnection">Se deconnecter</button></form>
<br/>
<br/>
<div class=".count"><form method="post" action='index.php'><button type="submit" value="Mon compte">Retour</button></form></div>
</span>
</span>

</header>


<div class="wide align">

<h3>Login: <?php echo $_SESSION['login'];?></h3>
<br/>
<div><form method="post" action='del.php'><button type="submit" value="Sup mon compte">Supprimer mon compte</button></form></div>
<?PHP
$serv = "localhost";
$user = "root";
$pass = "ok";
$db_name = "rush";
$db = mysqli_connect($serv, $user, $pass, $db_name);
$sql = "SELECT nom FROM ".$_SESSION['login'];
$result = mysqli_query($db, $sql);

if (mysqli_num_rows($result) > 0)
{
    echo "<form method=\"post\" action=\"delete_panier.php\">";
    echo "Panier";
    echo "</br>";
    while($row = mysqli_fetch_assoc($result))
    {
        echo "<label><b>".$row['nom']."</b></label>";
        echo "<input type=\"hidden\" name=\"nom\" value= \"".$row['nom']."\"/>";
        echo "<button type=\"submit\">delete</button>";
        echo "</br>";
    }
}
if ($_SESSION['del_err'] === "ok") echo "elem del in data base"; $_SESSION['del_err'] = NULL;?>
</div>


</html>
