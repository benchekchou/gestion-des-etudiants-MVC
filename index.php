<?php
try{

  session_start();
  require_once("Controller/UserController.php");

  $module= $_GET["module"] ?? "Index";
  $action=$_GET["action"] ?? "index";
  if(isset($_COOkIE["userToken"])&& ession_exists($_COOkIE["userToken"]))  $_SESSION["Email"]=ession_exists($_COOkIE["userToken"]);
  elseif(($action=="inscription" or $action=="Password" or $action=="resetPassword") and is_callable($action)){
    $action();
  }

  	  elseif(!isset($_SESSION["Email"]) ) {

      login(); exit();
    }



  $Module=ucfirst($module);

  if(file_exists("Controller/".$Module."Controller.php")){
  require_once("Controller/".$Module."Controller.php");

  if(is_callable($action)and $action!="inscription" and $action!="Password" and $action!="resetPassword"){
    $action();
  }
  else

  throw new Exception("erreur de définie l'action  ");
}else

  throw new EXception("ce module n'est pas pris en charge!...");
}catch(Exception $e){
  $view="views/Error/erreur.php";
  $var=["message" => $e->getMessage()];
  render($view,$var);
}
