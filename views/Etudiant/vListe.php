<h1>liste des etudiants de la filiére</h1>
<hr>
<div class="SectionTable">
  <table>
    <tr>
		<th>Nom</th>
		<th>Prenom</th>
		<th>Filiere</th>
		<th>Note</th>

  </tr>
  <?php foreach($var["etudiant"] as $i){ ?>
  <tr>
    <td><a href="index.php?module=Etudiant&action=detail&id=<?=$i["id"]?>"><?=$i["nom"]?></a></td>
    <td><a href="index.php?action=Etudiant&detail&id=<?=$i["id"]?>"><?=$i["prenom"]?></a></td>
    <td><a href="index.php?action=Etudiant&detail&id=<?=$i["id"]?>"><?=$i["filiere"]?></a></td>
    <td><a href="index.php?action=Etudiant&detail&id=<?=$i["id"]?>"><?=$i["note"]?></a></td>
     </tr>

<?php  }  ?>

  </table>
</div>
