<?php

set_include_path("../");

include("xml_drag_drop/settings.php");

$folder = $_GET['folder'];

// scan file yang tipe xml dan di nama ada string menu return array full path file
$dirs = array_filter(scandir("../$folder/" . folder_settings), function ($file) {
  $needle = ".xml";
  $expectedPosition = strlen($file) - strlen($needle);
  return strripos($file, $needle, 0) === $expectedPosition && strpos($file, "menu") !== false;
});

die(json_encode(array_values($dirs)));
