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

$connect = getCon();

$id = "";
$absence_name = "";
$absence_type = "";

function getPosts()
{
    $posts = array();
    $posts[0] = $_POST['id'];
    $posts[1] = $_POST['absence_name'];
    $posts[2] = $_POST['absence_type'];
    return $posts;
}

//search
if(isset($_POST['search'])){

    $data = getPosts();

    $searchQuery = 'SELECT * FROM  absences WHERE id = '.$data[0];
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
    $data = getPosts();
    $delete_Query = 'DELETE FROM absences WHERE id = '.$data[0];

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
    $data = getPosts();
    $insert_Query = 'INSERT INTO absences (absence_name, absence_type) VALUES ("'.$data[1].'", "'.$data[2].'");';
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
    $data = getPosts();
    $update_Query = 'UPDATE absences SET absence_name="'.$data[1].'", absence_type="'.$data[2].'" WHERE id = '.$data[0].';';
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
            <input type="number" name="id" placeholder="Id" value="<?php echo $id;?>"><br><br>
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
