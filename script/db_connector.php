<?php

    $con = NULL;
 
    function getCon(){
        global $con;
        if(empty($con))
            $con = new mysqli("localhost", "root", "", 'test_test');
       /* if(!$con->connect_error){
            echo "Mit Datenbank verbunden!";
        }       */
        return $con;
}

/*

    function insertForm($absenzart, $ferienabzug){
 //     mysqli_query(getCon(), "INSERT INTO test (name, abzug) VALUES ('".$absenzart."', ".$ferienabzug.")");

        $sql = "INSERT INTO absenzen (name, abzug) VALUES ('".$absenzart."', ".$ferienabzug.")";
        $conn = getCon();
        if ($conn->query($sql)=== TRUE){
            echo "insert complete";
        }else{
            echo "Error: " . $sql . "<br/>" . $conn->error;
        }
        //mysqli_query(getCon(), "INSERT INTO test (name, abzug) VALUES ('".$absenzart."', ".$ferienabzug.")");
    }

    if(isset($_POST['absenden'])){
       $absenzart = $_POST['absenzart'];
       $ferienabzug = $_POST['ferienabzug'];

       var_dump($absenzart,$ferienabzug);

       insertForm($absenzart, $ferienabzug);
    }*/

    ?>

