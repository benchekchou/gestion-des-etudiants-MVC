<h1> ajouter un etudiant </h1>

<hr>

  <form id="myform" action="" name="myform" method="POST">

    <input id="code" type="hidden" name="id" value="<?=$var["etudiant"]["id"]?>">

    <label for="code"><b>entre votre code:</b></label>
     <input id="code" type="text" name="code" value="<?=$var["etudiant"]["code"]?>"><span><?=$var["erreur"]["code"]?? ""?></span><br><br>

     <label for="nom"><b>entre votre nom:</b></label>
      <input id="nom" type="text" name="nom" value="<?=$var["etudiant"]["nom"]?>"><span><?=$var["erreur"]["nom"]?? ""?></span><br><br>

       <label for="prenom"><b>entre votre prenom:</b></label>
        <input id="prenom" type="text" name="prenom" value="<?=$var["etudiant"]["prenom"]?>"><span><?=$var["erreur"]["prenom"]?? ""?></span><br><br>

       <label for="note"><b>entre votre note:</b></label>
        <input id="note" type="text" name="note" value="<?=$var["etudiant"]["note"]?>"><span><?=$var["erreur"]["note"]?? ""?></span><br><br>
        <label for="filiere"><b>filiere:</b></label>
      <select id="filiere" class="op" name="filiere">
        <option value="" selected>___</option>
        <?php foreach($var["filiere"] as $f){ ?>
        <option value="<?=$f["codeF"]?>" 	<?= ($f['codeF']==$var["etudiant"]["filiere"])? "selected" :"" ?>><?=$f["IntituleF"]?></option>
      <?php } ?>
    </select><span><span><?=$var["erreur"]["filiere"]?? ""?></span></span><br><br>
        <input type="submit" id="env" name="Envoyer" value="Envoyer">
        <input type="submit" onclick='window.location.reload(false)' value="annuler">
    </form>
