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




            <content class="main">

                <!--Erfassungsbutton-->
                <bar >

                    <div class="search_bar">


                       <a href="#popup"> <button class="btnr">+</button></a><?php print(" ").($button_name); ?>
                      <form action="absences_type.php" method="POST"><input type="text" name="searchtext" id="right" placeholder="Hier Suchtext eingeben...">
                          <button type="submit" name="suchen">Suchen</button> </form>


                    </div>

                </bar>

                <br />

                <!--Hauptteil-->

                <?php
                include "content/$page_content";
                ?>
                </div>


                <!--Beschreibung-->
                <description>
                   <?php print ($page_description) ?>
                </description>

            </content>



        </div>
</body>
</html>
