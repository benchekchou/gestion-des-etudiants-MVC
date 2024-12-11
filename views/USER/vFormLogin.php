<h1>bonjour</h1>
<hr>
  <form id="myform" action="" name="myform" method="POST">
    <span><?=$var["erreur"]["User"]?? ""?></span>
    <label for="Email"><b>Email:</b></label>
    <input id="Email" type="text" name="Email" ><span><?=$var["erreur"]["Email"]?? ""?></span><br><br>

     <label for="PASSWORD"><b>PASSWORD:</b></label>
      <input id="code" type="password" name="PW" ><span><?=$var["erreur"]["PW"]?? ""?></span><br><br>
      <label for="ResterConnecte"><b>ResterConnecte</b></label>
      <input id="ResterConnecte" type="checkbox" name="ResterConnecte"><br><br>
      <input type="submit" value="ce connecter">
      <input type="reset" value="annuler"><br><br>
      <a href="index.php?module=User&action=inscription">inscrire</a>
        <a href="index.php?module=User&action=resetPassword">reset</a>


  </form>
