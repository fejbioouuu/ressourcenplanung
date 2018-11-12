<?php session_start(); ?>
<!DOCTYPE HTML>
<html>

<head>
  <title>WMC - <?php print($page_kurztitel); ?></title>
  <meta http-equiv="content-type" content="text/html; charset=utf8" />
  <link rel="stylesheet" type="text/css" href="css/style.css" />
  <!-- modernizr enables HTML5 elements and feature detects
  <script type="text/javascript" src="js/modernizr-1.5.min.js"></script>
  -->
</head>

<body>
        <div class="site">

            <!--Logo-->
            <header class="company-logo">
                <img src="images/logo.png" width="60%">
            </header>

            <!--Titel der Seite-->
            <header class="page-title">
                <h1><?php print($page_titel); ?></h1>
            </header>

            <!--Navigationsleiste-->
            <nav class="navbar">
                <ul>
                    <li><a href="#">Mitarbeiter</a></li>
                    <li><a href="#">Arbeiten / Projekte</a></li>
                    <li><a href="#">Auslastungdiagnose Woche</a></li>
                    <li><a href="#">Auslastungdiagnose Tag</a></li>
                </ul>
            </nav>




            <content class="main">

                <!--Erfassungsbutton-->
                <bar>
                    Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat,
                    sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.
                </bar>

                <!--Hauptteil-->
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
