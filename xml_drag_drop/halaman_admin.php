<?php

set_include_path("../");

$root_dir = "../admin/app/page";

// scan folder root
$dirs = array_filter(scandir($root_dir), function ($file) use ($root_dir) {
  return is_dir($root_dir . "/" . $file) && $file != '.' && $file != '..';
});

$datas = [];

foreach ($dirs as $key => $folder) {

  array_push($datas, [
    "preview_link" => $root_dir . "/" . $folder . "/index.php",
    "link" => "../" . $folder . "/index.php",
    "nama" => ucwords(str_replace("_", " ", $folder))
  ]);

  if ($folder != "home") {
    array_push($datas, [
      "preview_link" => $root_dir . "/" . $folder . "/index.php?input=tambah",
      "link" => "../" . $folder . "/index.php?input=tambah",
      "nama" => ucwords(str_replace("_", " ", $folder . "_tambah"))
    ]);

    array_push($datas, [
      "preview_link" => $root_dir . "/" . $folder . "/index.php?input=edit",
      "link" => "../" . $folder . "/index.php?input=edit",
      "nama" => ucwords(str_replace("_", " ", $folder . "_edit"))
    ]);

    array_push($datas, [
      "preview_link" => $root_dir . "/" . $folder . "/cetak.php?preview=",
      "link" => "../" . $folder . "/cetak.php?preview=",
      "nama" => ucwords(str_replace("_", " ", $folder . "_cetak preview"))
    ]);

    array_push($datas, [
      "preview_link" => $root_dir . "/" . $folder . "/cetak.php?cetak=",
      "link" => "../" . $folder . "/cetak.php?cetak=",
      "nama" => ucwords(str_replace("_", " ", $folder . "_cetak"))
    ]);

    array_push($datas, [
      "preview_link" => $root_dir . "/" . $folder . "/cetak.php?export=",
      "link" => "../" . $folder . "/cetak.php?export=",
      "nama" => ucwords(str_replace("_", " ", $folder . "_cetak export"))
    ]);

    array_push($datas, [
      "preview_link" => $root_dir . "/home/index.php?import=x&tabel=$folder",
      "link" => "../home/index.php?import=x&tabel=$folder",
      "nama" => ucwords(str_replace("_", " ", $folder . "_import"))
    ]);
  }
}

die(json_encode(array_values($datas)));
