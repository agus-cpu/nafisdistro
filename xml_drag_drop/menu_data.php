<?php
set_include_path("../");

include("xml_drag_drop/settings.php");

$menu = $_GET['menu'];
$folder = $_GET['folder'];

$xmls = new SimpleXMLElement("../$folder/" . folder_settings . "/$menu", null, true);
$json = json_encode($xmls);
$array = json_decode($json, TRUE);


$menus = [];
for ($index = 0; $index < sizeof($array['menu']); $index++) {
  $data_menu = $array['menu'][$index];
  $data_menu_baru = [];
  $data_menu_baru['isLeaf'] = false;
  if ($data_menu['t'] == "m") {
    $data_menu_baru['isExpanded'] = true;
  } else if ($data_menu['t'] == 'sm' || $data_menu['t'] == 's') {
    $data_menu_baru['isLeaf'] = true;
  }
  $data_menu_baru['data'] = $data_menu;
  $menus[] = $data_menu_baru;
}

$ret_menus = array_values(array_filter($menus, function ($menu) {
  return $menu['data']['t'] == "m" || $menu['data']['t'] == "s";
}));

foreach ($ret_menus as $key => $menu) {
  if ($menu['data']['t'] == 's') {
    continue;
  };
  $menu['children'] = array_values(array_filter($menus, function ($sub) use ($menu) {
    return $sub['data']['t'] == "sm" && $sub['data']['s'] == $menu['data']["id"];
  }));
  $ret_menus[$key] = $menu;
}

echo (json_encode($ret_menus));
