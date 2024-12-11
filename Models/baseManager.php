<?php
function getCn(){
  static $cn;
  if(!$cn)
    $cn= new PDO("mysql:host=localhost;dbname=tp", "root", "");
return $cn;
}
