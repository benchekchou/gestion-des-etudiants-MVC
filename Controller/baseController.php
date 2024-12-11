<?php
date_default_timezone_set('Africa/Casablanca');
function render($vue,array $var=array()){
  ob_start();
  require_once($vue);
  $view=ob_get_clean();
  require_once("views/template.php");
}
function GetId(){
  try{
    $id=$_GET["id"]??"";
    if(empty($id))
      throw new Exception("Vous n'avez pas fourni l'id  voulu!!");
       if (!is_numeric($id)) throw new Exception ("l'id fourni est non valide!!") ;
    }catch(Exception $e){
      $view="views/erreur.php";
      $var=["message" => $e->getMessage()];
      render($view,$var);
    }
    return $id;
}
