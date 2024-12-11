 <?php
 require_once "baseManager.php";
 function getfiliere(){
   $cn=getCn();
   $resulta=$cn->query("select * from filiere")->fetchall();
   return $resulta;
 }
function SupprimerFiliere($id){
  $cn=getCn();
  $result=$cn->prepare("delete from filiere where id=?");
  $result->execute([$id]);
  return $result;
}
function AjouterFiliere(array $f){
   $filiere=[$f["codeF"],$f["IntituleF"]];
   $cn=getCn();
   $result=$cn->prepare("insert into filiere (codeF,IntituleF) values (?,?)");
   $result->execute([$filiere]);
   return $result ;
}
function editFiliere(array $f){
  $filiere=[$f["codeF"],$f["IntituleF"],$f["id"]];
  $cn=getCn();
  $result=$cn->prepare("update filiere set codeF=?,IntituleF=? where id=?");
  return $result->execute($filiere);
}
