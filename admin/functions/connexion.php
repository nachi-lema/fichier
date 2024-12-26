<?php 

  $server   = 'localhost';
  $Username = 'root';
  $passWord = '';
  $BddName  = 'bakumbaefc_bd';

  $bd = new mysqli($server, $Username, $passWord, $BddName);

  if ($bd ->connect_error) {
    die("Connection failed:".$bd ->connect_error);
  }

  //change character set to utf
  mysqli_set_charset($bd,"utf8");
  //change character set to utf

?>