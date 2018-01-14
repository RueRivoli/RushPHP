<?php
session_start();
?>
<HTML>

<Head>

<meta charset= "UTF-8" name = "yguzman fgallois" content = "The new sport">
<TITLE>See your dreams</TITLE>
<link rel="stylesheet" type="text/css" href="style.css" media="all"/>

</Head>



<header>
    <span class= "bigtitle"> 
    <a href="index.php"><img src="img/cinema.png" alt="Cinema"> </a>
    So moovy!
           
</span><br/><br/><br/><br/>

    <span class= "bigtitle"> 
	Section admin
</span>
</header>

<nav>
<div id="conteneur">
	<form method="post" action="push_film.php">
	<div class="rect">
	<label><b>name</b></label>
	<input type="text" placeholder="Enter film name" name="name" required>
	<br/>
	<br/>
	<label><b>Prix</b></label>
	<input type="text" placeholder="enter prix" name="prix" required>
	<br/>
	<br/>
	<label><b>cat.1</b></label>
	<input type="text" placeholder="enter categorie" name="cat1" required>
	<br/>
	<br/>
	<label><b>cat.2</b></label>
	<input type="text" placeholder="enter categorie" name="cat2">
	<br/>
	<br/>
	<label><b>cat.3</b></label>
	<input type="text" placeholder="enter categorie" name="cat3">
	<br/>
	<br/>
	<label><b>lien image</b></label>
	<input type="text" placeholder="enter lien img" name="image">
	<br/>
	<br/>
	<button type="submit">ajoute</button>
	</form>
	<?PHP if ($_SESSION['push_err'] === "err") echo "this moovie already exist"; else if ($_SESSION['push_err'] == "ok") echo "elem add in data base"; $_SESSION['push_err'] = NULL;?>
  </div>
</nav>

<nav>
<div id="conteneur">
<?PHP 
$serv = "localhost";
$user = "root";
$pass = "ok";
$db_name = "rush";
$db = mysqli_connect($serv, $user, $pass, $db_name);
$sql = "SELECT nom FROM article";
$result = mysqli_query($db, $sql);

if (mysqli_num_rows($result) > 0) 
{
	echo "<form method=\"post\" action=\"delete_film.php\">";
	echo "liste de tout les films";
	echo "</br>";
	while($row = mysqli_fetch_assoc($result))
	{
		echo "<label><b>".$row['nom']."</b></label>";
		echo "<input type=\"hidden\" name=\"nom\" value= \"".$row['nom']."\"/>";
		echo "<button type=\"submit\">delete</button>";
		echo "</br>";
	}
	echo "</form>";
}
if ($_SESSION['del_err'] === "ok") echo "elem del in data base"; $_SESSION['del_err'] = NULL;?>
