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
              <a href="index.php"> <img src="images/logo.png" width="60%"> </a>
            </header>

            <!--Titel der Seite-->
            <header class="page-title">
                <h1><?php print($page_titel); ?></h1>
            </header>

            <!--Navigationsleiste-->
            <nav class="navbar">
                <ul>
                    <li><a href="absences_type.php">Absenzen</a></li>
                    <li><a href="employee.php">Mitarbeiter</a></li>
                    <li><a href="absences.php">Geplante Absenzen</a></li>
                </ul>
            </nav>


                <!--Erfassungsbutton-->
                <div class="search_bar">
                    <form action="<?php $page_name?>" method="POST"><input type="text" name="searchtext" id="right" placeholder="Hier Suchtext eingeben...">
                        <button type="submit" name="suchen">Suchen</button> </form>
                </div>

                <!--Editberreich-->
                <edit class="edit_content">
                    <?php
                    include "content/$page_edit_content";
                    ?>
                </edit>

                <content class="main">
                <!--Hauptteil-->
                <?php
                include "content/$page_content";
                ?>
                </content>



                <!--Beschreibung-->
                <description class="explanation">
                   <?php print ($page_description) ?>
                </description>

        </div>

</body>
</html>
