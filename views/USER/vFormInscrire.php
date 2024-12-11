<h1>bonjour</h1>
<hr>
  <form id="myform" action="" name="myform" method="POST">

    <label for="Email"><b> entre votre nom:</b></label>
    <input id="Email" type="text" name="Email" ><span><?=$var["erreur"]["Email"]?? ""?></span><br><br>

     <label for="PASSWORD"><b>entre votre un PASSWORD:</b></label>
      <input id="code" type="password" name="PW" ><span><?=$var["erreur"]["PW"]?? ""?></span><br><br>

      <input type="submit" value="inscrire">



  </form>
