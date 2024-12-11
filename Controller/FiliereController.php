<?php
require_once "baseController.php";
require_once "Models\FiliereManager.php";
function ListeFiliere(){
  $view="views\Filiere\vListeFilieres.php";
 $var=["filieres"=>getfiliere()];
 rendre($view,$var);
}
function SupprimerF(){
  $id=GetId();
  supprimerEtudiants($id);
  header ("location : index.php?module=Filiere&action=ListeFiliere");
}
function editerFiliere(){
    $id=GetId();
    
}
