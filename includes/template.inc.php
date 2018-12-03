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


                    <form action="template.inc.php" method="post">
                        <a href="#" id="right">&times;</a>
                        <h1>BLABLABLA</h1>

                        <label>Name der Absenzart</label>
                        <input type="text" name="absenzart" placeholder="">
                        <label>Ferientage relevant?</label>
                        JA<input type="radio" name="ferienabzug" value="abzug">
                        NEIN<input type="radio" name="ferienabzug" value="kein-abzug">
                        <br/>
                        <button type="submit" name="absenden">Absenden</button>
                    </form>

                </div>

                    <br />

                <table>
                    <tr>
                        <th>Vorname</th>
                        <th>Nachname</th>
                        <th>Geburtsdatum</th>
                        <th>Pensum in %</th>
                        <th>Anstellungsverhälnis</th>
                        <th>Vertragsende</th>
                    </tr>
                    <tr>
                        <td>Jill</td>
                        <td>Smith</td>
                        <td>26.07.1985</td>
                        <td>100%</td>
                        <td>Vollzeit</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Aaron</td>
                        <td>Solo</td>
                        <td>26.07.1996</td>
                        <td>100%</td>
                        <td>Lehrling</td>
                        <td>31.08.2019</td>
                    </tr>
                    <tr>
                        <td>Jill</td>
                        <td>Smith</td>
                        <td>26.07.1985</td>
                        <td>100%</td>
                        <td>Vollzeit</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Aaron</td>
                        <td>Solo</td>
                        <td>26.07.1996</td>
                        <td>100%</td>
                        <td>Lehrling</td>
                        <td>31.08.2019</td>
                    </tr>
                    <tr>
                        <td>Jill</td>
                        <td>Smith</td>
                        <td>26.07.1985</td>
                        <td>100%</td>
                        <td>Vollzeit</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Aaron</td>
                        <td>Solo</td>
                        <td>26.07.1996</td>
                        <td>100%</td>
                        <td>Lehrling</td>
                        <td>31.08.2019</td>
                    </tr>
                </table>

                <!--Beschreibung-->
                <description>
                    Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat,
                    sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.
                </description>

            </content>



        </div>
</body>
</html>
