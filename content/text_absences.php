

<?php
if (isset($_POST['searchtext'])) {
    $search = $_POST['searchtext'];
    $searchTextArray =  preg_split("/[\s,]+/", $search);
   // print_r($searchTextArray);

} else {
    $searchTextArray = '';
}

$con = getCon();
//$sqlrequest = "SELECT ae.id, ae.start_date, ae.end_date, a.absence_name, e.Vorname, e.Name FROM absence_entry AS ae LEFT JOIN absences AS a  ON  a.id = ae.idabsence
//LEFT JOIN employees AS e ON  e.id = ae.idemployee where UPPER (a.absence_name) like UPPER('%" . $search . "%') OR UPPER (e.Vorname) like UPPER('%" . $search . "%') OR UPPER (e.Name) like UPPER('%" . $search . "%') OR UPPER (ae.end_date) like UPPER('%" . $search . "%')OR UPPER (ae.start_date) like UPPER('%" . $search . "%');";
//$result = $con->query($sqlrequest);

$newSqlRequest = "SELECT ae.id, ae.start_date, ae.end_date, a.absence_name, e.Vorname, e.Name FROM absence_entry AS ae LEFT JOIN absences AS a  ON  a.id = ae.idabsence
LEFT JOIN employees AS e ON  e.id = ae.idemployee where";


if (!isset($_POST['searchtext'])){
    $newSqlRequest = "SELECT ae.id, ae.start_date, ae.end_date, a.absence_name, e.Vorname, e.Name FROM absence_entry AS ae LEFT JOIN absences AS a  ON  a.id = ae.idabsence
LEFT JOIN employees AS e ON  e.id = ae.idemployee";
}else{
    foreach ($searchTextArray as $searchTextString){
        $newSqlRequest .= " UPPER (a.absence_name) like UPPER('%" . $searchTextString . "%') OR UPPER (e.Vorname) like UPPER('%" . $searchTextString . "%') OR UPPER (e.Name) like UPPER('%" . $searchTextString . "%') OR UPPER (ae.end_date) like UPPER('%" . $searchTextString . "%')OR UPPER (ae.start_date) like UPPER('%" . $searchTextString . "%') OR ";
    }
    $newSqlRequest = substr($newSqlRequest, 0, -3);
}



//print_r("$newSqlRequest");

$result = $con->query($newSqlRequest);




echo '<table><tr>
    <th>ID</th>
    <th>Vorname</th>
    <th>Name</th>
    <th>Absenzart</th>
    <th>Start</th>
    <th>Ende</th>
  </tr>';
if ($result->num_rows > 0) {

    while ($row = $result->fetch_assoc()) {
        echo '<tr><td>' . $row['id'] . '</td><td>' . $row['Vorname'] . '</td><td>' . $row['Name'] . '</td><td>' . $row['absence_name'] . '</td><td>' . $row['start_date'] . '</td><td>' . $row['end_date'] . '</td></tr>';
    }
    echo '</table>';
} else {
    echo '</table><br><h2>No Results</h2>';
}

?>