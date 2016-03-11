<?php
// real meat and potatos, scans current dir for artist, album, or song
// sets this into variable scan,
// *change* maybe limit the scan to 30 if its the main scan, to lighten workload
// *change* but you would have to still exclude the first 4 somehow.
$scan = scandir($dir);
// while count is less than limit keep doing this crap
while ($count <= $limit){
  // sets current artist, album, or song value
  $current = $scan[$count];
  // if the first 4 some how slow up in any of the directories for album or songs
  // *change* block everything thats not mp3 or a directory
  // *change* I have no dam clue how to do that, so maybe later
  if ($current == "." || $current == ".." || $current == ".DS_Store" || $current == "._.DS_Store" ){
    $count++;
  }
  // print the items on the screen
  // and increase count by 1
  else {
    ?>
    <div id="file">
    <a href='<?php
    if ($main == TRUE){
    print "?artist=" . $current;
    }
    elseif (isset($artist) == TRUE && isset($album) == FALSE){
    print "?artist=" . $artist . "&album=" . $current;
    }
    elseif (isset($album)){
    print "http://thatguyisjames.com/music/".$artist."/".$album."/".$current;
    }
    ?>'><?php print $current; ?></a>
    </div>
    <?php
    $count++;
    // since this is after count, it checks to see if the next item is blank
    // if the next item is blank, makes count = 999 which is over the limit
    // this just ends the list without actually counting 999 blank spaces.
    // who the hell has 999 songs anyways (only time it might get above 30)
    if ($scan[$count] == ""){
      while($count <= 999){
        $count++;
      }
    }
  }
}
?>
