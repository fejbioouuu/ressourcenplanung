<?php include "script/db_connector.php";


?>
<!DOCTYPE HTML>
<html>

<head>
  <title>WMC - <?php print($page_kurztitel); ?></title>
  <meta http-equiv="content-type" content="text/html; charset=utf8" />
  <link rel="stylesheet" type="text/css" href="css/style.css" />

</head>

<body>
        <div class="site">

            <!--Logo-->
            <header class="company-logo">
              <a href="absences.php"> <img src="images/logo.png" width="50%" > </a>
            </header>

            <!--Titel der Seite-->
            <header class="page-title">
                <h1><?php print($page_titel); ?></h1>
            </header>

            <!--Navigationsleiste-->
            <nav class="navbar">
                <ul>
                    <li><a href="absences_type.php">Absenzart</a></li>
                    <li><a href="employee.php">Mitarbeiter</a></li>
                    <li><a href="absences.php">Geplante Absenzen</a></li>
                </ul>
            </nav>


                <!--Erfassungsbutton-->
                <div class="search_bar">
                    <form class="h100" action="<?php $page_name?>" method="POST"><input class="h100 rlpadding" type="text" name="searchtext" id="right" placeholder="Hier Suchtext eingeben...">
                        <button  class="border-right h100 rlpadding" type="submit" name="suchen">Suchen</button> </form>
                </div>

                <!--Editberreich-->
                <edit class="edit_content">
                    <?php
                    include "content/update/$page_edit_content";
                    ?>
                </edit>

                <content class="main">
                <!--Hauptteil-->
                <?php
                include "content/list/$page_content";
                ?>
                </content>



                <!--Beschreibung-->
                <description class="explanation">
                   <?php print ($page_description) ?>
                </description>

        </div>
        <script src="script/eventlistener.js" language="javascript"></script>
</body>
</html>
