

<?php

if (isset($_POST['searchtext'])) {
    $search = $_POST['searchtext'];
    $searchTextArray =  preg_split("/[\s,]+/", $search);

} else {
    $searchTextArray = '';
}

print_r($searchTextArray);

$con = getCon();
//$sqlrequest = "SELECT id, absence_name, absence_type from absences where UPPER(absence_name) like UPPER('%" . $search . "%') OR UPPER(absence_type) like UPPER('%" . $search . "%');";
$newSqlRequest = "SELECT id, absence_name, absence_type from absences where";





if (!isset($_POST['searchtext'])){
    $newSqlRequest = "SELECT id, absence_name, absence_type from absences";
}else{
    foreach ($searchTextArray as $searchTextString){
        $newSqlRequest .= " UPPER(absence_name) like UPPER('%" . $searchTextString . "%') OR UPPER(absence_type) like UPPER('%" . $searchTextString . "%') OR ";
    }

    $newSqlRequest = substr($newSqlRequest, 0, -3);
}
//

//print_r("$newSqlRequest");

$result = $con->query($newSqlRequest);

/*
 Prüfung auf Dublikate
insert into employees (Vorname, Name, Anstellungsverhaeltnis, Pensum, Vertragsbeginn, Vertragsende)

select "Bababa", "Vorlalal", "Teilzeit", 100, "2019-04-18", "0000-00-00"
From employees
where not exists(
	select Vorname, Name, Anstellungsverhaeltnis, Pensum, Vertragsbeginn, Vertragsende
	from employees
	where Vorname = "Bababa" and Name = "Vorlalal" and Anstellungsverhaeltnis = "Teilzeit" and Pensum = 100 and Vertragsbeginn = "2019-04-18" and Vertragsende = "0000-00-00"
)
*/




echo '<table><tr>
    <th>ID</th>
    <th>Absenzname</th>
    <th>Ferienrelevant</th>
  </tr>';
if ($result->num_rows > 0) {

    while ($row = $result->fetch_assoc()) {
        echo '<tr><td>' . $row['id'] . '</td><td>' . $row['absence_name'] . '</td><td>' . $row['absence_type'] . '</td></tr>';
    }
    echo '</table>';
} else {
    echo '</table><br><h2>No Results</h2>';
}




?>


<!--

<?php
/*if ($_POST && $_POST["searchtext"]) {
    $search = $_POST["searchtext"];
}
*/?>


<div id="popup">


    <form action="absences_type.php" method="POST">
        <a href="#" id="right">&times;</a>
        <h1><?php /*print($popup_title) */?></h1>

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
            <h1><?php /*print($popup_title) */?></h1>

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
/*            if ($_POST && $_POST["searchtext"]) {
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
            */?>


-->