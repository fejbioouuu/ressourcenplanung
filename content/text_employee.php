
<?php
if (isset($_POST['searchtext'])) {
    $search = $_POST['searchtext'];

} else {
    $search = '';
}

$con = getCon();
$sqlrequest = "SELECT * from employees where Vorname like '%" . $search . "%';";
$result = $con->query($sqlrequest);

echo '<table><tr>
    <th>ID</th>
    <th>Vorname</th>
    <th>Name</th>
    <th>Anstellungsverhältnis</th>
    <th>Pensum in %</th>
    <th>Vertragsbeginn</th>
    <th>Vertragsende</th>
  </tr>';
if ($result->num_rows > 0) {

    while ($row = $result->fetch_assoc()) {
        echo '<tr><td>' . $row['id'] . '</td><td>' . $row['Vorname'] . '</td><td>' . $row['Name'] . '</td><td>' . $row['Anstellungsverhaeltnis'] . '</td><td>' . $row['Pensum'] . '</td><td>' . $row['Vertragsbeginn'] . '</td><td>' . $row['Vertragsende'] . '</td></tr>';
    }
    echo '</table>';
} else {
    echo '</table><br><h2>No Results</h2>';
}




?>;