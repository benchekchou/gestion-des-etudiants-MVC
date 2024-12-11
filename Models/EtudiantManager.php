<?php
require_once "baseManager.php";
function getListeEtudiant(){
  $cn=getCn();
  $resulta=$cn->query("select * from etudiant")->fetchall();
  return $resulta;
}
function getDetailEtudiants($id){
  $cn=getCn();
  $resulta=$cn->prepare("select * from etudiant where id=?");
  $resulta->execute([$id]);
  return $resulta->fetch();
}
function supprimerEtudiants($id){
  $cn=getCn();
$resulta=$cn->prepare("delete from etudiant where etudiant.id=?");
$resulta->execute([$id]);
return $resulta;
}
function ajouterEtudiant(array $t){
  $cn=getCn();
  $etudiant = [$t["code"],$t["nom"],$t["prenom"],$t["filiere"],$t["note"]];
  $resulta=$cn->prepare("insert INTO etudiant(code, nom,prenom,filiere, note) VALUES (?,?,?,?,?)");
  $resulta->execute($etudiant);
  return $resulta;
}
function modifierEtudiant(array $t){
   $cn=getCn();
  $etudiant = [$t["code"],$t["nom"],$t["prenom"],$t["filiere"],$t["note"],$t["id"]];
  $resulta=$cn->prepare("update etudiant set code=?,nom=?,prenom=?,filiere=?,note=? where id=?");
  $resulta->execute($etudiant);
  return $resulta;
}
