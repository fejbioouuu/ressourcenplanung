<script src="script/bar.js" language="javascript"></script>

<?php
if (isset($_POST['searchtext'])) {
    $search = $_POST['searchtext'];
    $searchTextArray =  preg_split("/[\s,]+/", $search);

} else {
    $searchTextArray = '';
}

$con = getCon();
//$sqlrequest = 'SELECT * from employees where UPPER (Vorname) like UPPER ("%' . $search . '%") OR  UPPER (Name) like UPPER ("%' . $search . '%") OR  UPPER (Anstellungsverhaeltnis) like UPPER ("%' . $search . '%") OR Pensum = ("' . $search . '") OR (Vertragsbeginn) like ("%' . $search . '%") OR (Vertragsende) like ("%' . $search . '%");';
$newSqlRequest = "SELECT * from employees where";

if (!isset($_POST['searchtext'])) {
    $newSqlRequest = "SELECT * from employees";
} else {
    foreach ($searchTextArray as $searchTextString){
        $newSqlRequest .= " UPPER (Vorname) like UPPER ('%" . $searchTextString . "%') OR  UPPER (Name) like UPPER ('%" . $searchTextString . "%') OR  UPPER (Anstellungsverhaeltnis) like UPPER ('%" . $searchTextString . "%') OR Pensum = ('" . $searchTextString . "') OR (Vertragsbeginn) like ('%" . $searchTextString . "%') OR (Vertragsende) like ('%" . $searchTextString . "%') OR ";
    }
        $newSqlRequest = substr($newSqlRequest, 0, -3);

}

//print_r($newSqlRequest);


$result = $con->query($newSqlRequest);

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
    <td>' .  date('d.m.Y',strtotime($row['Vertragsbeginn']))  . '</td>
    <td>';

if ($row['Vertragsende']==='0000-00-00') {
   echo '00.00.0000';
}else{
    echo (date('d.m.Y',strtotime($row['Vertragsende'])));
}


    '</td></tr>';

}


echo '</table>';
} else {
echo '</table><br><h2>No Results</h2>';
}

?>
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
