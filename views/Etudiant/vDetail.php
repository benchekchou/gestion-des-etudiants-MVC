<h1> détail l'étudiant : </h1>
<hr>
<b> code   :<?=$var["etudiant"]["code"]?></b><br>
<b> nom    :<?=$var["etudiant"]["nom"]?></b><br>
<b>prenom  :<?=$var["etudiant"]["prenom"]?></b><br>
<b> filiere:<?=$var["etudiant"]["filiere"]?></b><br>
<b> note   :<?=$var["etudiant"]["note"]?></b><br>
<a href="index.php?module=Etudiant&action=modifier&id=<?=$var["etudiant"]["id"]?>">modifier</a>
<a href="index.php?module=Etudiant&action=supprimer&id=<?=$var["etudiant"]["id"]?>">supprimer</a>
