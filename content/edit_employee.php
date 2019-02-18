<?php
/**
 * Created by PhpStorm.
 * User: Fejbioouuu
 * Date: 21.01.2019
 * Time: 14:45
 */

require_once 'class/Employee.php';
/*$host = "localhost";
$user = "root";
$password = "";
$database = "test_test";


//mysqli_report(mysqli_report_error | mysqli_report_strict);

try{
    $connect = mysqli_connect($host, $user, $password, $database);
}catch (Exception $ex){
    echo 'Error';
}
*/

$connect = getCon();

$id = "";
$vorname = "";
$name = "";
$anstellungsverhaeltnis = "";
$pensum = "";
$vertragsbeginn = "";
$vertragsende = "";

//    ->    ruft methode einer classe auf
function populateEmployeeFromPost() : Employee{
    $employee = new Employee();
    $employee->setId(isset($_POST['Id']) ? $_POST['Id'] : null);
    $employee->setVorname(isset($_POST['Vorname']) ? $_POST['Vorname'] : null);
    $employee->setName(isset($_POST['Name']) ? $_POST['Name'] : null);
    $employee->setAnstellungsverhaeltnis(isset($_POST['Anstellungsverhaeltnis']) ? $_POST['Anstellungsverhaeltnis'] : null);
    $employee->setPensum(isset($_POST['Pensum']) ? $_POST['Pensum'] : null);
    $employee->setVertragsbeginn(isset($_POST['Vertragsbeginn']) ? $_POST['Vertragsbeginn'] : null);
    $employee->setVertragsende(isset($_POST['Vertragsende']) ? $_POST['Vertragsende'] : null);
    return $employee;
}


//function getPosts()
//{
//
//
//    $posts = array();
//    $posts['id'] = $_POST['id'];
//    $posts['vorname'] = isset($_POST['Vorname']) ? $_POST['Vorname'] : null;
//    $posts[2] = $_POST['Name'];
//    $posts[3] = $_POST['Anstellungsverhaeltnis'];
//    $posts[4] = $_POST['Pensum'];
//    $posts[5] = $_POST['Vertragsbeginn'];
//    $posts[6] = $_POST['Vertragsende'];
//    return $posts;
//}

//search
if(isset($_POST['search'])){
//    $data = getPosts();
$employee = populateEmployeeFromPost();
//var_dump($employee);
    $searchQuery = 'SELECT * FROM  employees WHERE id = '.$employee->getId();
    echo $searchQuery;
    $search_Result = mysqli_query($connect, $searchQuery);


    if($search_Result){
        if(mysqli_num_rows($search_Result)){
            while($row = mysqli_fetch_array($search_Result)){
                $id = $row['id'];
                $vorname = $row['Vorname'];
                $name = $row['Name'];
                $anstellungsverhaeltnis = $row['Anstellungsverhaeltnis'];
                $pensum = $row['Pensum'];
                $vertragsbeginn = $row['Vertragsbeginn'];
                $vertragsende = $row['Vertragsende'];
            }
        }else{
            echo 'No Data for this Id';
        }
    }else{
        echo 'Result Error';
    }

}




if(isset($_POST['delete'])){
   $employee = populateEmployeeFromPost();
    $delete_Query = 'DELETE FROM employees WHERE id = '.$employee->getId();

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
//    $data = getPosts();
    $employee = populateEmployeeFromPost();

    $insert_Query = 'INSERT INTO employees 
(Vorname, Name, Anstellungsverhaeltnis, Pensum, Vertragsbeginn, Vertragsende) 
VALUES ("'.$employee->getVorname().'", "'.$employee->getName().'", "'.$employee->getAnstellungsverhaeltnis().'", '.$employee->getPensum().', "'.$employee->getVertragsbeginn().'", "'.$employee->getVertragsende().'");';


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


//    $data = getPosts();
    $employee = populateEmployeeFromPost();
    $update_Query = 'UPDATE employees SET Vorname="'.$employee->getVorname().'", Name="'.$employee->getAnstellungsverhaeltnis().'" WHERE id = '.$employee->getId().';';
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
/*
$absence_type === 'Ja' ? selected : null;

Ist das gleiche wie unten.


if( $absence_type === 'Ja'){
    echo 'selected';
}else{
    echo null;
}
*/




?>


<form action="employee.php" method="post">
    <input type="number" name="Id" placeholder="Id" value="<?php echo $id;?>"><br><br>
    <input type="text" name="Vorname" placeholder="Vorname" value="<?php echo $vorname;?>"><br><br>
    <input type="text" name="Name" placeholder="Name" value="<?php echo $name;?>"><br><br>
    <select name="Anstellungsverhaeltnis">
        <option value="Vollzeit" <?= $anstellungsverhaeltnis === 'Vollzeit' ? 'selected' : null;?>>Vollzeit</option>
        <option value="Teilzeit" <?= $anstellungsverhaeltnis === 'Teilzeit' ? 'selected' : null;?>>Teilzeit</option>
        <option value="Praktikum" <?= $anstellungsverhaeltnis === 'Praktikum' ? 'selected' : null;?>>Praktikum</option>
        <option value="Lehrling" <?= $anstellungsverhaeltnis === 'Lehrling' ? 'selected' : null;?>>Lehrling</option>
    </select><br><br>
    <input type="text" name="Pensum" placeholder="Pensum" value="<?php echo $pensum;?>"><br><br>
    <input type="date" name="Vertragsbeginn" placeholder="Vertragsbeginn" value="<?php echo $vertragsbeginn;?>"><br><br>
    <input type="date" name="Vertragsende" value="<?php echo $vertragsende;?>"><br><br>
    <div>
        <input type="submit" name="insert" value="Add">
        <input type="submit" name="update" value="Update">
        <input type="submit" name="delete"  value="Delete">
        <input type="submit" name="search" value="Find">
    </div>

</form>

