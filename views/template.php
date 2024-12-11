<?php function afficherDate($lang) {
$jours["AR"] = array("الأحد","الإثنين","الثلاثاء","الأربعاء","الخميس","الجمعة","السبت");
$jours["FR"] = array("Dimanche","Lundi","Mardi","Mercredi","Jeudi","Vendredi","Samedi");
$jours["EN"] = array("Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday");

$months["AR"]=["يناير ", "فبراير", "مارس ", "أبريل", "ماي ", "يونيو" , "يوليوز" , "غشت ", "شتنبر" ,"أكتوبر" , "نونبر" , "دجنبر"];

$months["EN"]= ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];

$months["FR"]= ["Janvier","Février","Mars", "Avril","Mai","juin","Juillet","Aôut","Septembre","Octobre","Novembre","Décembre"];


$d = getdate();

$wj = $d["wday"];
$mj = $d["mday"];
$m = $d["mon"];
$y = $d["year"];

$d= $jours[$lang][$wj]. " " . $mj . " " . $months[$lang][$m-1] . " " . $y;
return $d;
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="public/style.css">
  <title>liste</title>
</head>
<body>
  <header>
    <div class="t1">
      <p>SMI6 <br>
        faculter des Sciences Dhar elmhraz</p>
      </div><br>
      <div class="image btn"><img  id="im" src="public\FS-Fes-Dhar-el-mehraz.jpg" alt="logo" width="80px"><span id="dat"> <?=afficherDate("FR")?> </span></div>
    </header><br>
    <div class="deconnexion" >
      <?=date('Y-m-d H:i:s',strtotime("+120 minutes",strtotime(date('Y-m-d H:i'))))?>

      <?php  if(isset($_SESSION["Email"])){?>
      vous etes connecte en tant que :<?= strtoupper($_SESSION["Email"])?> &nbsp;&nbsp;&nbsp;&nbsp;
      <a href="index.php?module=User&action=deconnexion">Déconnexion</a>
    <?php } else {?> no connecter <?php }?>&nbsp;&nbsp; || &nbsp;&nbsp;
    </div>




<?=$view?>






<hr>






<nav class="liste">
    <ul>
      <li><a href="index.php?module=Index&action=index">acceuil</a></li>
      <li><a href="index.php?module=Etudiant&action=liste">liste de etudiants</a></li>
      <li><a href="index.php?module=Etudiant&action=ajouter">ajouter un etudiants</a></li>
    </ul>
</nav>
<hr>






<footer >
  <p>  &copycopyright:SMI6 2022<br>
  faculter des Sciences Dhar Mehraze<br>
        smi6@fsdmfes.ac.ma<p>
  </footer>
</body>
</html>
