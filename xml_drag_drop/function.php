<?php

function buat_menu($xw, $data)
{
  xmlwriter_start_element($xw, 'menu');

  xmlwriter_start_element($xw, 'id');
  xmlwriter_text($xw, $data['id']);
  xmlwriter_end_element($xw);

  xmlwriter_start_element($xw, 's');
  xmlwriter_text($xw, $data['s']);
  xmlwriter_end_element($xw);

  xmlwriter_start_element($xw, 't');
  xmlwriter_text($xw, $data['t']);
  xmlwriter_end_element($xw);

  xmlwriter_start_element($xw, 'n');
  xmlwriter_text($xw, $data['n']);
  xmlwriter_end_element($xw);

  xmlwriter_start_element($xw, 'l');
  xmlwriter_text($xw, $data['l']);
  xmlwriter_end_element($xw);

  xmlwriter_start_element($xw, 'i');
  xmlwriter_text($xw, $data['i']);
  xmlwriter_end_element($xw);

  xmlwriter_end_element($xw); // end menu
}

function buat_child($xw, $data, $childrens, $node)
{
  foreach ($childrens as $key => $child) {
    $sumber = $data['id'];
    if ($node['isLeaf']) {
      $sumber = "";
    }
    $data_child = $child['data'];
    $data_child['id'] = "";
    $data_child['s'] = $sumber;
    $data_child['t'] = 'sm';
    buat_menu($xw, $data_child);
  }
}
