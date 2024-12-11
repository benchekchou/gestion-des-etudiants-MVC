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
<header>
  <div class="t1">
    <p>SMI6 <br>
      faculter des Sciences Dhar elmhraz</p>
    </div><br>
    <div class="image btn"><img  id="im" src="public\FS-Fes-Dhar-el-mehraz.jpg" alt="logo" width="80px"><span id="dat"> <?=afficherDate("FR")?> </span></div>
  </header><br>
