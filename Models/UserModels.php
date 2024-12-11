<?php
require_once "baseManager.php";
 function user_exists(array $t){
  $cn=getCn();
    $Email=["Email"=>$t["Email"],"PW"=>$t["PW"]];
   $result=$cn->prepare("select PW from login where Email=?");
   $result->execute([$Email["Email"]]);
   $pw=$result->fetchColumn();
   return password_verify($Email["PW"], $pw);
 }
 function session_exists($token){
   $cn=getCn();
   $result=$cn->prepare("select Email from session where token=? and expire>?");
   $result->execute([$token,time()]);
   return $result->fetchColumn();
 }
function saveSession(array $t){
  $cn=getCn();
  $session=[$t["Email"],$t["token"],$t["expire"]];
  $result=$cn->prepare("insert into session (Email,token,expire) values(?,?,?)");
  return $result->execute($session);
}
function creeUser(array $t){
  $cn=getCn();
  $user=[$t["Email"],$t["PW"]];
  $Rq=$cn->prepare("insert into login(Email,PW)values(?,?)");
  return $Rq->execute($user);
}

function resetPW($t){
  $cn=getCn();
  $result=$cn->prepare("insert into reset(token,Email,expire) values(?,?,?)");
  return $result->execute($t);
}

  function user_exist($t){
    $cn=getCn();
    $result=$cn->prepare("select * from login where Email=?");
    $result->execute([$t]);
    return $result->rowCount();
  }
  // function token_exists($t){
  //   $cn=getCn();
  //   $result=$cn->prepare("select Email from reset where token=?");
  //   $result->execute([$t]);
  //   return $result->fetchColumn();
  // }
  function token_exists($t){
    $cn=getCn();
    $result=$cn->prepare("select * from reset where token=?");
    $result->execute([$t]);
    return $result->fetch();
  }
// function newPW($t){
//     $cn=getCn();
//     $result=$cn->prepare("select Email from login where token=?");
//     $result->execute([$t]);
//     return $result->fetchColumn();
// }
function updatePW($t){
  $cn=getCn();
  $result=$cn->prepare("update login set PW=? where Email=?");
  return $result->execute([$t["PW"],$t["Email"]]);
}
