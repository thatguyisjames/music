<?php
// pull the config settings from another file.
include "config.php";
?>
<html>
<head>
  <!-- pull the Jquery mini script in... the player script needs it I guess -->
  <script src="<?php print $JSdir; ?>jquery.min.js"></script>
  <!-- pull the actual audio player script in -->
  <script src="<?php print $JSdir; ?>audio.min.js"></script>
  <!-- pull the player init script in, this requires ol and li tags to work, lame -->
  <script src="<?php print $JSdir; ?>player.js"></script>
  <!-- pull my css stylesheet in, nothing special here -->
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<?php
// get artist from ?artist= in url
if (isset($_GET["artist"])){
  $artist = $_GET["artist"];
}
// get album from ?album= in url
if (isset($_GET["album"])){
  $album = $_GET["album"];
}
// combine them this will then make the directy layout
// this will help make the url link for the mp3s
// final setup $site . $artist . $album . $song
// so make sure that url is accesable via the url
// *hint* its some apache settings stuff.
$dir = $musicdir . "/" . $artist . "/" . $album;
// scan for all files in said directory
$scan = scandir($dir);
?>
<body>
<div id="center">
  <div id="search">
    <?php print $artist . "-" . $album; ?>
  </div>
  <div id="dir">
    <!-- this is the JS player location -->
    <audio preload></audio>
      <ol>
    <?php
    // loop php, goes though every file it scanned.
    foreach($scan as $song) {
      // this makes the URL for the mp3 to link to
      $url =  $sitemusic . $artist . "/" . $album . "/" . $song;
      // if the scanned file is anything other than a mp3, does nothing.
      if (substr($song, -3) != "mp3"){

      }
      // otherwise makes a entery with the mp3 link
      else{
        ?>
          <li><a href="#" data-src="<?php print $url; ?>"><div id=file><?php print $song; ?></div></a></li>
        <?php
      }
    }
?>
</ol>
</div>
</div>
</body>
</html>
