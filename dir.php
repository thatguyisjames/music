<?php
// location of all the music files, should be organized via /arist/ablum/song.mp3
$musicdir = "/media/files/music";
// if artist is set in url, then add that to the dir
if (isset($_GET["artist"])){
  $artist = $_GET["artist"];
  $dir = $musicdir."/".$artist;
  $limit = 999;
  $main = FALSE;
  // if artist AND album is set, add that to the dir
  if(isset($_GET["album"])){
    $album = $_GET["album"];
    $dir = $musicdir."/".$artist."/".$album;
  }
}
// if no artist is specified, then it might be on another page
// check for page number and set a variable
else{
  if(isset($_GET["page"])){
    $page = $_GET["page"];
    $count = 30 * $page + 4;
    $limit = 30 * $page + 34;
  }
  // if no page is set, skip first 4 entrys ".", "..", ".ds_store", and "._.ds_store"
  // then list 30 items.
  else{
    $count = 4;
    $limit = 34;
  }
  // unset is just incase that crap was set, really not needed, but
  // usefull if you just fell back to the main page. variables aren't sitting with old values
  unset($album);
  unset($artist);
  $main = TRUE;
  // this just makes sure the dir variable does use a old value
  $dir = $musicdir;
}
?>
