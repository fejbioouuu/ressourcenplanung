<script src="script/bar.js" language="javascript"></script>

<?php
if (isset($_POST['searchtext'])) {
    $search = $_POST['searchtext'];

} else {
    $search = '';
}

$con = getCon();
$sqlrequest = 'SELECT * from employees where Vorname like "%' . $search . '%";';
var_dump($sqlrequest);

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
echo '<tr><td>' . $row['id'] . '</td>
    <td>' . $row['Vorname'] . '</td>
    <td>' . $row['Name'] . '</td>
    <td>' . $row['Anstellungsverhaeltnis'] . '</td>
    <td>
        <div class="myProgress">
            <div id="myBar'.$row['id'].'" class="progressBar" data-id="'.$row['id'].'" data-pensum="'.$row['Pensum'].'">data->0%</div>        
        </div>
       
       

    </td>
    <td>' . $row['Vertragsbeginn'] . '</td>
    <td>' . $row['Vertragsende'] . '</td></tr>';

}


echo '</table>';
} else {
echo '</table><br><h2>No Results</h2>';
}

?>;
<!---->
<!--<progress id="progressBar'.$row['id'].'" value="0" max="' . $row['Pensum'] . '">' . '</progress>-->
<!--<span id="status'.$row['id'].'"></span><script>fillProgressBar('.$row['id'].');</script>-->

<!--if ($result->num_rows > 0) {-->
<!---->
<!--while ($row = $result->fetch_assoc()) {-->
<!--echo '<tr><td>' . $row['id'] . '</td>-->
<!--    <td>' . $row['Vorname'] . '</td>-->
<!--    <td>' . $row['Name'] . '</td>-->
<!--    <td>' . $row['Anstellungsverhaeltnis'] . '</td>-->
<!--    <td>-->
<!--        <progress id="progressBar'.$row['id'].'" value="0" max="' . $row['Pensum'] . '">' . '</progress>-->
<!--        <span id="status'.$row['id'].'"></span><script>fillProgressBar('.$row['id'].');</script>-->
<!--    </td>-->
<!--    <td>' . $row['Vertragsbeginn'] . '</td>-->
<!--    <td>' . $row['Vertragsende'] . '</td></tr>';-->
<!--}-->
<!--echo '</table>';-->
<!--} else {-->
<!--echo '</table><br><h2>No Results</h2>';-->
<!--}-->
<!---->
<!--?>;-->
