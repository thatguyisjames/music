<html>
  <head>
    <meta charset="utf-8">
    <title>Media Player</title>
    <link rel="stylesheet" type="text/css" href="style.css">
  </head>
  <body>
    <!-- Background div holding it all -->
    <?php
    // give me the dam dir variable based on url
    include "config.php";
    include "dir.php";
    ?>
    <div id="center">
      <!-- Title bar with "search" div -->

<!--      <div id="search">
        <form>
          <input class="search" type="text" src="index.php" />
        </form>
      </div> -->
      <!-- current Directory list div -->
      <div id="dir">
        <!-- media player div, with audio tag -->
        <?php
        // scan for the file/folder names and list them
        // output is the div with a id of file
        include "list.php";
        ?>
      </div>
    </div>
  </body>
</html>
