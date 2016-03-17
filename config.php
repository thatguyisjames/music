<?php
// location of all the music files, should be organized via /arist/ablum/song.mp3
$musicdir = "/media/files/music";
// file names and directories to ignore while listing albums and artist.
$ignore = array("music", ".", "..", ".DS_Store", "._.DS_Store", "");
// file types to ignore when listing albums and artist
$ignoreft = array("ini");
// the site url, used for generating links to the MP3 file.
// ** should be phased out as .JS media player is intagrated.
$site = "http://thatguyisjames.com/music/";

// with that being said, location of .JS media player files.
$JSdir = "audiojs/";
?>
