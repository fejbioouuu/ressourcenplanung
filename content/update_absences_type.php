<?php
/**
 * Created by PhpStorm.
 * User: Fejbioouuu
 * Date: 21.01.2019
 * Time: 14:45
 */


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
require_once 'class/Absencetype.php';
$connect = getCon();

$id = "";
$absence_name = "";
$absence_type = "";

/**
 * @return Absencetype
 */
function populateAbsencetypeFromPost() : Absencetype
{
    $Absencetype = new Absencetype();
    $Absencetype->setId(isset($_POST['Id']) ? $_POST['Id'] : null);
    $Absencetype->setAbsenceName(isset($_POST['absence_name']) ? $_POST['absence_name'] : null);
    $Absencetype->setAbsenceType(isset($_POST['absence_type']) ? $_POST['absence_type'] : null);
    return $Absencetype;
}

//search
if(isset($_POST['search'])){

    $Absencetype = populateEmployeeFromPost();
    $searchQuery = 'SELECT * FROM  absences WHERE id = '.$Absencetype->getId();
    echo $searchQuery;
    $search_Result = mysqli_query($connect, $searchQuery);


    if($search_Result){
        if(mysqli_num_rows($search_Result)){
            while($row = mysqli_fetch_array($search_Result)){
                $id = $row['id'];
                $absence_name = $row['absence_name'];
                $absence_type = $row['absence_type'];
            }
        }else{
            echo 'No Data for this Id';
        }
    }else{
        echo 'Result Error';
    }

}




if(isset($_POST['delete'])){
    $Absencetype = populateAbsencetypeFromPost();
    $delete_Query = 'DELETE FROM absences WHERE id = '.$Absencetype->getId();

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
    $Absencetype = populateAbsencetypeFromPost();
    $insert_Query = 'INSERT INTO absences (absence_name, absence_type) VALUES ("'.$Absencetype->getAbsenceName().'", "'.$Absencetype->getAbsenceType().'");';
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
    $Absencetype = populateAbsencetypeFromPost();
    $update_Query = 'UPDATE absences SET absence_name="'.$Absencetype->getAbsenceName().'", absence_type="'.$Absencetype->getAbsenceType().'" WHERE id = '.$Absencetype->getId().';';
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

        <form action="absences_type.php" method="post">
            <input type="number" name="Id" placeholder="Id" value="<?php echo $id;?>"><br><br>
            <input type="text" name="absence_name" placeholder="Absenz Name" value="<?php echo $absence_name;?>"><br><br>
            <select name="absence_type">
                <option value="Ja" <?= $absence_type === 'Ja' ? 'selected' : null;?>>Ja</option>
                <option value="Nein" <?= $absence_type === 'Nein' ? 'selected' : null;?>>Nein</option>
            </select><br><br>
            <div>
                <input type="submit" name="insert" value="Add">
                <input type="submit" name="update" value="Update">
                <input type="submit" name="delete"  value="Delete">
                <input type="submit" name="search" value="Find">
            </div>

        </form>
