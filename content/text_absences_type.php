<?php
if ($_POST && $_POST["searchtext"]) {
    $search = $_POST["searchtext"];
}
?>


<div id="popup">


    <form action="absences_type.php" method="POST">
        <a href="#" id="right">&times;</a>
        <h1><?php print($popup_title) ?></h1>

        <label>Name der Absenzart</label>
        <input type="text" name="absenzart" placeholder="" required>
        <label>Ferientage relevant?</label>
        JA<input type="radio" name="ferienabzug" value="1" required>
        NEIN<input type="radio" name="ferienabzug" value="0" required>
        <br><br>
        <button id="right" type="submit" name="absenden">Absenden</button>
    </form>
</div>

<br/>
<div>

    <div id="popupE">


        <form action="absences_type.php" method="POST">
            <a href="#" id="right">&times;</a>
            <h1><?php print($popup_title) ?></h1>

            <label>Edit</label>
            <input type="text" name="absenzart" placeholder="" required>
            <label>Ferientage relevant?</label>
            JA<input type="radio" name="ferienabzug" value="1" required>
            NEIN<input type="radio" name="ferienabzug" value="0" required>
            <br><br>
            <button id="right" type="submit" name="absenden">Absenden</button>
        </form>
    </div>

    <br/>
    <div>

        <table class="table">
            <tr>
                <th>Name</th>
                <th>Abzug</th>
            </tr>

            <?php
            if ($_POST && $_POST["searchtext"]) {
                $search = $_POST["searchtext"];

            } else {
                $search = '';
            }

            $con = getCon();
            $sqlrequest = "SELECT name, abzug from absenzen where name like '%" . $search . "%';";
            $result = $con->query($sqlrequest);
            if ($result) {
                echo "insert complete";
            } else {
                echo "Error: " . $sqlrequest . "<br/>" . $con->error;
            }


            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr><td>" . $row["name"] . "<td/><td>" . $row["abzug"] . "<td/><td>" . "<a href='#popupE'> <button href='#popupE'>E</button> </a>" . "<td/><tr/>";
                }
                echo "<table/>";
            } else {
                echo "No Results";
            }
            ?>

