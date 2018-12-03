
<table class="table">
                    <tr>
                        <th>Name</th>
                        <th>Abzug</th>
                    </tr>

    <?php
        $con = getCon();
        $sqlrequest = "SELECT name, abzug from absenzen";
        $result = $con-> query($sqlrequest);

        if($result-> num_rows > 0) {
            while ($row = $result-> fetch_assoc()){
                echo "<tr><td>" . $row["name"] . "<td/><td>" . $row["abzug"] . "<td/><tr/>";
            }echo "<table/>";
        }else{
            echo"No Results";
        }
    ?>

