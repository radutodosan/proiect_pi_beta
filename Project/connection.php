<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "proiect_pi";

$con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

if(!$con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname)){
  die("failed to connect!");
}