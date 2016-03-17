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
  // *change* block everything thats not mp3 or a directory
  // *change* I have no dam clue how to do that, so maybe later
  foreach ($ignore as $skip){
    if ($current == $skip){
      $skipthis = TRUE;
      $count++;
    }
  }
  foreach ($ignoreft as $skipft){
    if (substr($current, -3) == $skipft){
      $skipthis = TRUE;
      $count++;
    }
  }
//  if ($current == "." || $current == ".." || $current == ".DS_Store" || $current == "._.DS_Store" || $current == "" ){
//    $count++;
//  }
  if ($skipthis == TRUE){
    unset($skipthis);
  }
  elseif (isset($album) && substr($current, -3) != "mp3"){
    $count++;
  }
  // print the items on the screen
  // and increase count by 1
  else {
    ?>
    <a href="<?php
    if ($main == TRUE){
    print "?artist=" . $current;
    }
    elseif (isset($artist) == TRUE && isset($album) == FALSE){
    print "?artist=" . $artist . "&album=" . $current;
    }
    elseif (isset($artist) == TRUE && isset($album) == TRUE){
      // dirty header trick to redirect the page if both album and artist are set.
      // gross, dont be like this. I should have made the links on the artist page work.
      header( $site."album.php?artist="$artist."&album=".$album );
    }
    ?>"><div id="file"><?php print $current; ?></div></a>
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
