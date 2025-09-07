<?php

set_include_path("../");

$root_dir = "../";

// scan folder root
$dirs = array_filter(scandir($root_dir), function ($file) use ($root_dir) {
  return is_dir($root_dir . $file) && $file != '.' && $file != '..';
});

die(json_encode(array_values($dirs)));
