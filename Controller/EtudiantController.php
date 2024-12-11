
<?php
 require_once "Models/EtudiantManager.php";
 require_once "baseController.php";
 require_once "Models/FiliereManager.php";

function liste(){
  $var=["etudiant"=>getListeEtudiant()];
  render("views/Etudiant/vListe.php",$var);
}
function detail(){
$id=GetId();
$var=["etudiant"=>getDetailEtudiants($id)];
render("views/Etudiant/vDetail.php",$var);
 }
function supprimer(){
  $id=GetId();
   supprimerEtudiants($id);
   $var=["etudiant"=>getListeEtudiant()];
   render("views/Etudiant/vListe.php",$var);
}
function  ajouter(){
  $etudiant=array("code"=>"","nom"=>"","prenom"=>"","filiere"=>"","note"=>"");
  if($_SERVER["REQUEST_METHOD"]=="POST"){
    $etudiant=$_POST;
    if(empty($etudiant["code"])) $erreur["code"]="le code est vide";
    if(empty($etudiant["nom"])) $erreur["nom"]="le nom est vide";
    if(empty($etudiant["prenom"])) $erreur["prenom"]="le prenom est vide";
    if(empty($etudiant["filiere"])) $erreur["filiere"]="la filiere est vide";
    if(empty($etudiant["note"])) $erreur["note"]="la note est vide";
    elseif(!is_numeric($etudiant["note"])) $erreur["note"]="la note dois etre un nombre";
    elseif($etudiant["note"]>20 or $etudiant["note"]<0) $erreur["note"]=" le  note dois etre entre 0 et 20";
     if(!isset($erreur)){
    ajouterEtudiant($etudiant);
    header("location: index.php?module=Etudiant&action=liste");
    }
  }
    $var["etudiant"]=$etudiant;
    $var["erreur"]=$erreur ?? [] ;
    $var["filiere"]=getfiliere();
    render("views/Etudiant/vFormAjouter.php",$var);
$var["erreur"]=$erreur ?? [];
 render("views/User/vFormLogin.php", $var);
}

function modifier(){
$id=GetId();
$etudiant=getDetailEtudiants($id);
  if($_SERVER["REQUEST_METHOD"]=="POST"){
    $etudiant=$_POST;
    if(empty($etudiant["code"])) $erreur["code"]="le code est vide";
    if(empty($etudiant["nom"])) $erreur["nom"]="le nom est vide";
    if(empty($etudiant["prenom"])) $erreur["prenom"]="le prenom est vide";
    if(empty($etudiant["filiere"])) $erreur["filiere"]="la filiere est vide";
    if(empty($etudiant["note"])) $erreur["note"]="la note est vide";
    elseif(!is_numeric($etudiant["note"])) $erreur["note"]="la note dois etre un nombre";
    elseif($etudiant["note"]>20 or $etudiant["note"]<0) $erreur["note"]=" le  note dois etre entre 0 et 20";
     if(!isset($erreur)){
    modifierEtudiant($etudiant);
    header("location: index.php?module=Etudiant&action=liste");
    }
  }
    $var["etudiant"]=$etudiant;
    $var["erreur"]=$erreur ?? [] ;
    $var["filiere"]=getfiliere();
    render("views/vFormModifier.php",$var);
}
