<?php

    $con = mysqli_connect("localhost", "root", "", test);
/*
    if(mysqli_connect_errno() == 0){
        echo "Mit Datenbank verbunden!";
    }
*/
    funcion getCon{
        if(!isset($con))
            $con = mysqli_connect("localhost", "root", "", test);
        return $con;
}

    function insertForm(){
        mysqli_query(getCon(), "INSERT INTO test (id, name, abzug) VALUES ('', '', '' )");
    }

    ?>

