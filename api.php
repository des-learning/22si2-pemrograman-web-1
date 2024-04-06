<?php
$data = $_GET['data'];

sleep(10);

header("Content-Type: application/json");
$hasil = strtoupper($data);
echo <<<JSON
  {
    "hasil":"{$hasil}"
  }
JSON;
?>
