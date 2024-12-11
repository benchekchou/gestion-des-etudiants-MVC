 ﻿<?php
 require_once "Models/UserModels.php";
 require_once "baseController.php";
  function login(){
$user=["Email"=>"","PW"=>""];
if($_SERVER["REQUEST_METHOD"]=="POST"){
  $user=$_POST;
  if(empty($user["Email"])) $erreur["Email"]="le Email est vide";
  if(empty($user["PW"])) $erreur["PW"]="le password est vide";
  elseif(!user_exists($user)) $erreur["User"]="password or user incorrect";

  if(!isset($erreur)){

    $_SESSION["Email"]=$user["Email"];
    if(isset($user["ResterConnecte"])){
      $userToken=password_hash($user["Email"].$user["PW"].time(),PASSWORD_DEFAULT);
      setcookie("userToken",$userToken,time() +3600*24*15);
      $session=[ "Email"=>$user["Email"],"token"=>$userToken,"expire"=>time() +3600*24*15];
      saveSession($session);
    }
    header("location: index.php?module=Index&action=index");
  }
}
$variables["erreur"]= $erreur ?? [];
render("views/USER/vFormlogin.php", $variables);
}
function inscription(){
  if($_SERVER["REQUEST_METHOD"]=="POST"){
    $login=$_POST;
    if(empty($login["Email"])) $erreur["Email"]="le login est vide";
    if(empty($login["PW"])) $erreur["PW"]="le password est vide";
    elseif(!isset($erreur)){
      $_SESSION["Email"]=$login["Email"];
      $pw=password_hash($login["PW"],PASSWORD_DEFAULT);
      $t=["Email"=>$login["Email"],"PW"=>$pw];
      creeUser($t);
      header("location: index.php?module=Index&action=index");
       }
  }
  $variables["erreur"]= $erreur ?? [];
  render("views/USER/vFormInscrire.php", $variables);
}
function deconnexion(){
  session_destroy();
	header("location: index.php");
  exit;
}
function resetPassword(){
  $login=["Email"=>""];
  if($_SERVER["REQUEST_METHOD"]=="POST"){
    $login=$_POST;
    if(empty($login["Email"])) $erreur["Email"]="le login est vide";
    elseif(!user_exist($login["Email"])) $erreur["Email"]="le login no valide";
    if(!isset($erreur)){
      $token=password_hash($login["Email"].time(),PASSWORD_DEFAULT);
      $url="http://localhost:8080/hamza/index.php?module=User&action=Password&token=$token";
      $message="bonjour, voici voitre lien pour la réinitialisation du mot de passe:$url";
      $headers='Content -Type: text/plain; charset="utf-8"'." ";
      if(mail($login["Email"],'mot de passe oublier',$message,$headers)){
        $t=[$token,$login["Email"],date("Y-m-d H:i:s")];
        resetPW($t);
      }
     }
  }
  $variables["erreur"]= $erreur ?? [];
  render("views/USER/resetPassword.php",$variables);
}

function Password(){
  $t =$_GET["token"];
  if(!empty(token_exists($t))){
    extract(token_exists($t));
    $d = date('Y-m-d H:i:s',strtotime("-120 minutes",strtotime(date('Y-m-d H:i'))));
    // if($expire > $d){
    //            die("erreur");
    //            echo "erreur";
    // }

  if($_SERVER["REQUEST_METHOD"]=="POST"){
    $pw=$_POST;
            if(empty($pw["PW"])) $erreur["PW"]="le chemps est vide";
            elseif(!isset($erreur)){
              $P=password_hash($pw["PW"],PASSWORD_DEFAULT);
              $tab=["PW"=>$P,"Email"=>$Email];
              updatePW($tab);
              $_SESSION["Email"]=$Email;
                header("location: index.php?module=Index&action=index");}
              }
  $variables["erreur"]= $erreur ?? [];
  render("views\USER\NewPassword.php",$variables);
}
else{
}

}

// function Password(){
// $t =$_GET["token"];
// try{
//   if(!empty($t)){
//      $Email=newPW($t);
//      if($Email){
//        if($_SERVER["REQUEST_METHOD"]=="POST"){
//          $pw=$_POST;
//          if(empty($pw["PW"])) $erreur["PW"]="le chemps est vide";
//          elseif(!isset($erreur)){
//            $P=password_hash($pw["PW"],PASSWORD_DEFAULT);
//
//            $tab=["PW"=>$pw["PW"],"Email"=>$Email];
//            updatePW($tab);
//            $_SESSION["Email"]=$Email;
//            header("location: index.php?module=Index&action=index");
//          }
//        }
//          $variables["erreur"]= $erreur ?? [];
//          render("views\USER\NewPassword.php",$variables);
//      }else
//       throw new Exception("Email ne trouve pas");
//     }else
//     throw new Excaption("token n ai pas valide");
//   }catch(Exception $e){
//     $view="views/Error/erreur.php";
//     $var=["message" => $e->getMessage()];
//     render($view,$var);
//   }
// }
