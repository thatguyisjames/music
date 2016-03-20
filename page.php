<?php
if (isset($_GET['page'])){
  $page = $_GET['page'];
  $pagef = $page + 1;
  $pageb = $page - 1;
  $forward = $site . "?page=" . $pagef;
  $backward = $site . "?page=" . $pageb;
  if ($pageb == 0){
    $backward = $site;
    $forward = $site . "?page=2";
  }
}
else {
  $forward = $site . "?page=1";
  $backward = "#";
}
?>
