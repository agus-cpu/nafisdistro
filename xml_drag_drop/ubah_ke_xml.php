<?php

include("settings.php");
include("function.php");

$nodes = json_decode(file_get_contents('php://input'), true);

$xw = xmlwriter_open_memory();
xmlwriter_set_indent($xw, 1);
$res = xmlwriter_set_indent_string($xw, '    ');

xmlwriter_start_document($xw, '1.0', 'UTF-8');

xmlwriter_start_element($xw, 'humans');

// untuk parent
for ($index = 0; $index < sizeof($nodes); $index++) {
  $node = $nodes[$index];
  $data = $node['data'];
  $data['id'] = "id" . $index;

  if ($node['isLeaf'] != true) {
    $data['t'] = "m";
  } else {
    $data['t'] = "s";
  }

  buat_menu($xw, $data);
  if (isset($node['children'])) {
    buat_child($xw, $data, $node['children'], $node);
  }

  $node['data'] = $data;
  $nodes[$index] = $node;
}




xmlwriter_end_element($xw); // end humans

xmlwriter_end_document($xw);

echo xmlwriter_output_memory($xw);
