<?php

include "settings.php";

$xml = $_POST['xml'];
$menu = $_POST['menu'];
$folder = $_POST['folder'];

$myfile = fopen("../$folder/" . folder_settings . "/$menu", "w") or die("Unable to open file!");
fwrite($myfile, $xml);
fclose($myfile);
