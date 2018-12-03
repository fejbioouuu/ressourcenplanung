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
                        <input type="text" name="" id="right" placeholder="Hier Suchtext eingeben...">


                    </div>

                </bar>

                <br />

                <!--Hauptteil-->
                <div id="popup" >


                    <form action="absences_type.php" method="POST">
                        <a href="#" id="right">&times;</a>
                        <h1><?php print($popup_title) ?></h1>

                        <label>Name der Absenzart</label>
                        <input type="text" name="absenzart" placeholder="" required>
                        <label>Ferientage relevant?</label>
                        JA<input type="radio" name="ferienabzug" value="1" required>
                        NEIN<input type="radio" name="ferienabzug" value="0" required>
                        <br/>
                        <button type="submit" name="absenden">Absenden</button>
                    </form>
                </div>

                    <br />
                <div>
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
