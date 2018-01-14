<?php
session_start();
?>
<HTML>

<Head>

<meta charset= "UTF-8" name = "yguzman fgallois" content = "The new sport">
<TITLE>See your dreams</TITLE>
<link rel="stylesheet" type="text/css" href="style.css" media="all"/>
<?PHP include 'install.php' ?>

</Head>



<header>
    <span class= "bigtitle">
    <img src="img/cinema.png" alt="Cinema" >
    So moovy!

</span><br/><br/><br/><br/>

<form class="research" method="post" action="single.php">
 Recherche ton film <input type="search" placeholder="Entrez un mot-clef" name="search" value="poci">
</form>
<?PHP
if (isset($_SESSION['login']) && $_SESSION['login'] !== "")
{
?>
	<span class="welcome">Sois le bienvenu <?PHP echo $_SESSION["login"]?>!</span>
<span class="deconnection"><form method="post" action='sedelog.php'><button type="submit" value="Deconnection">Se deconnecter</button></form>
<br/>
<br/>
<?PHP
}
if (isset($_SESSION['login']) && $_SESSION['login'] != "admin")
{
?>
<div class=".count"><form method="post" action='myaccount.php'><button type="submit" value="Mon compte">Mon compte</button></form></div>
</span>
<?PHP
}
else if (isset($_SESSION['login']) && $_SESSION['login'] === "admin")
{
?>
<div class=".count"><form method="post" action='admin.php'><button type="submit" value="Mon compte">Gerer les stocks</button></form></div>
</span>

<?PHP
}
?>

</header>


<form method="post" action="categorie.php">
</br>
<div class="header2">

    <div class="element"><input type="hidden" name="action1" value= "all"/><button type="submit"><h1>all</h1></button></div>
    <div class="element"><input type="hidden" name="action2" value= "aventure"/><button type="submit"><h1>aventure</h1></button></div>
    <div class="element"><input type="hidden" name="action3" value= "musical"/><button type="submit"><h1>musical</h1></button></div>
    <div class="element"><input type="hidden" name="action4" value= "comedie"/><button type="submit"><h1>comedie</h1></button></div>
    <div class="element"><input type="hidden" name="action5" value= "fiction"/><button type="submit"><h1>fiction</h1></button></div>
    <div class="element"><input type="hidden" name="action6" value= "thriller"/><button type="submit"><h1>thriller</h1></button></div>
    <div class="element"><input type="hidden" name="action7" value= "animation"/><button type="submit"><h1>animation</h1></button></div>
    <div class="element"><input type="hidden" name="action8" value= "historique"/><button type="submit"><h1>historique</h1></button></div>
    <div class="element"><input type="hidden" name="action9" value= "action"/><button type="submit"><h1>action</h1></button></div>
    <div class="element"><input type="hidden" name="action10" value= "fantastique"/><button type="submit"><h1>fantastique</h1></button></div>
</div>
</form>

<div id="conteneur">

<?PHP

if (!isset($_SESSION['login']) || $_SESSION['login'] === "")
{
?>
<nav>
	se connecter
	<form method="post" action="selog.php">
    <div class="rect">
    <label><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="uname" required>
    <br/>
    <br/> <label><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>
    <br/>
    <br/>
    <button type="submit">Login</button>
	</form>
    <label>
      <input type="checkbox" checked="checked">
    </label>
	<?PHP if ($_SESSION['log_err'] === "err") echo "login or psw false"; else echo ""; $_SESSION['log_err'] = NULL;?>
  </div>

	se creer un compte
	<form method="post" action="createlog.php">
    <div class="rect">
    <label><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="uname" required>
    <br/>
    <br/>
    <label><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>
    <br/>
    <br/>
    <button type="submit">Login</button>
	</form>
    <label>
      <input type="checkbox" checked="checked">
    </label>
	<?PHP if ($_SESSION['create_err'] == "err") echo "login already exist"; else if ($_SESSION['create_err'] == "ok") echo "login create"; else echo ""; $_SESSION['create_err'] = NULL;?>
  </div>
</nav>
<?PHP
}
?>
<?php
if (isset($_SESSION['login']) && $_SESSION['login'] !== "")
{
?>
<section class="wide">
<?php
}
else
{
?>
<section>
<?php
}
?>

<?PHP

$serv = "localhost";
$user = "root";
$pass = "ok";
$db_name = "rush";
$db = mysqli_connect($serv, $user, $pass, $db_name);
$sql = "SELECT nom, prix, lien, categorie1,categorie2,categorie3 FROM article";
$result = mysqli_query($db, $sql);

if (mysqli_num_rows($result) > 0) 
	while($row = mysqli_fetch_assoc($result))
	{
		echo "<div class=\"article\"><img src=\"".$row['lien']."\" title=\"film\"><h2>".$row['nom']."<br/>  ".$row['prix']."boulesse"."</h2>";
		if (isset($_SESSION['login']) && $_SESSION['login'] !== "")
		{
			echo "<form method=\"post\" action=\"achat.php\">";
    		echo "<input type=\"hidden\" name=\"acheter\" value= \"".$row['nom']."\"/><button type=\"submit\">acheter</button>";
			echo "</form>";
		}
		echo "</div>";
	}
?>

</section>
</div>




<footer>
   Byebye ! <!-- Placez ici le contenu du pied de page -->
</footer>

</HTML>
