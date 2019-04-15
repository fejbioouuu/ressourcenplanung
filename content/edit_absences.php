<?php
/**
 * Created by PhpStorm.
 * User: Fejbioouuu
 * Date: 18.03.2019
 * Time: 10:58
 */
require_once 'class/Employee.php';
require_once 'class/Absencetype.php';
require_once 'class/Absences.php';
$connect = getCon();

$id = "";
$idemployee = "";
$idabsence = "";
$start_date = "";
$end_date = "";

function populateAbsenceFromPost() : Absences
{

    $Absences = new Absences();
    $Absences->setId(isset($_POST['id']) ? $_POST['id'] : null);
    $Absences->setIdemployee(isset($_POST['idemployee']) ? $_POST['idemployee'] : null);
    $Absences->setIdabsence(isset($_POST['idabsence']) ? $_POST['idabsence'] : null);
    $Absences->setStartDate(isset($_POST['start_date']) ? $_POST['start_date'] : null);
    $Absences->setEndDate(isset($_POST['end_date']) ? $_POST['end_date'] : null);
    return $Absences;
}

//search
if(isset($_POST['search'])){

    $Absences = populateAbsenceFromPost();
    $searchQuery = 'SELECT * FROM  absence_entry WHERE id = '.$Absences->getId();
    echo $searchQuery;
    $search_Result = mysqli_query($connect, $searchQuery);


    if($search_Result){
        if(mysqli_num_rows($search_Result)){
            while($row = mysqli_fetch_array($search_Result)){
                $id = $row['id'];
                $idemployee = $row['idemployee'];
                $idabsence = $row['idabsence'];
                $start_date = $row['start_date'];
                $end_date = $row['end_date'];
            }
        }else{
            echo 'No Data for this Id';
        }
    }else{
        echo 'Result Error';
    }

}




if(isset($_POST['delete'])){
    $Absences = populateAbsenceFromPost();
    $delete_Query = 'DELETE FROM absence_entry WHERE id = '.$Absences->getId();

    try{
        $delete_Result = mysqli_query($connect, $delete_Query);

        if($delete_Result){
            if(mysqli_affected_rows($connect)>0){
                echo 'Data Deleted';
            }else{
                echo 'Data not Deleted';
            }
        }

    }catch (Exception $ex){
        echo 'Error Delete '.$ex->getMessage();
    }

}


if(isset($_POST['insert'])){
    $Absences = populateAbsenceFromPost();
   // var_dump($Absences);
    $insert_Query = 'INSERT INTO absence_entry (start_date, end_date, idemployee, idabsence) VALUES ("'.$Absences->getStartDate().'", "'.$Absences->getEndDate().'", "'.$Absences->getIdemployee().'", "'.$Absences->getIdabsence().'");';
    echo $insert_Query ;

    try{
        $insert_Result = mysqli_query($connect, $insert_Query);

        if($insert_Result){
            if(mysqli_affected_rows($connect)>0){
                echo 'Data Inserted';
            }else{
                echo 'Data not Inserted';
            }
        }

    }catch (Exception $ex){
        echo 'Error Insert '.$ex->getMessage();
    }

}

if(isset($_POST['update'])){
    $Absences = populateAbsenceFromPost();
    $update_Query = 'UPDATE absence_entry SET start_date="'.$Absences->getStartDate().'", end_date="'.$Absences->getEndDate().'", idemployee="'.$Absences->getIdemployee().'", idabsence="'.$Absences->getIdabsence().'" WHERE id = '.$Absences->getId().';';
    echo $update_Query;
    try{
        $update_Result = mysqli_query($connect, $update_Query);

        if($update_Result){
            if(mysqli_affected_rows($connect)>0){
                echo 'Data updated';
            }else{
                echo 'Data not updated';
            }
        }

    }catch (Exception $ex){
        echo 'Error update '.$ex->getMessage();
    }

}
//--------------------------------------------------------------------------

function getAllAbsenceTypes() {
	$connect = getCon();
	$sqlEmp = "SELECT id, absence_name from absences";
	$result = $connect->query($sqlEmp);
	if ($result->num_rows > 0) {
		$absence_types = [];
		while ($row = $result->fetch_assoc()) {
            $absence_type = new Absencetype();
            $absence_type->setId($row['id']);
            $absence_type->setAbsenceName($row['absence_name']);

            $absence_types[] = $absence_type;
		}
		return $absence_types;
	}
	return null;
}

function getAllEmployees() {
    $connect = getCon();
    $sqlEmp = "SELECT id, Vorname, Name from employees";
    $result = $connect->query($sqlEmp);
    if ($result->num_rows > 0) {
        $employees = [];
        while ($row = $result->fetch_assoc()) {
            $employee = new Employee();
            $employee->setId($row['id']);
            $employee->setVorname($row['Vorname']);
            $employee->setName($row['Name']);
            $employees[] = $employee;
        }
        return $employees;
    }
    return null;
}



?>



<?php
?>


<form action="absences.php" method="post">
    <input type="number" name="id" placeholder="Id" value="<?php echo $id; ?>"><br><br>
    <select name = "idemployee">
        <?php foreach (getAllEmployees() as $employee){ ?>
            <option value="<?php echo $employee->getId(); ?>"> <?php echo $employee->getVorname().' '.$employee->getName(); ?> </option>
        <?php } ?>
    </select>
    <br> <br>
    <select name = "idabsence">
        <?php foreach (getAllAbsenceTypes() as $absenceType){ ?>
            <option value="<?php echo $absenceType->getId(); ?>"> <?php echo $absenceType->getAbsenceName(); ?> </option>
        <?php } ?>
    </select>
    <br><br>
    <input type="date" name="start_date"  value="<?php echo $start_date; ?>"><br><br>
    <input type="date" name="end_date"  value="<?php echo $end_date; ?>"><br><br>
        <div>
        <input type="submit" name="insert" value="Add">
        <input type="submit" name="update" value="Update">
        <input type="submit" name="delete"  value="Delete">
        <input type="submit" name="search" value="Find">
    </div>

</form>
