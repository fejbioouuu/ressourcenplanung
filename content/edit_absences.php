<?php
/**
 * Created by PhpStorm.
 * User: Fejbioouuu
 * Date: 18.03.2019
 * Time: 10:58
 */

$connect = getCon();

$sqlEmp = "SELECT id, Vorname, Name from employees";

$stmt = $connect->prepare($sqlEmp);

$stmt->execute();

$users = $stmt->fetch();

?>






<form action="absences.php" method="post">
    <input type="number" name="Id" placeholder="Id" value="<?php echo $id;?>"><br><br>
    <select>
        <?php foreach ($users as $user): ?>
            <option value="<?php $user['id']; ?>"><?php $user['name']; ?> ok </option>
                <?php endforeach; ?>



    </select>
        <div>
        <input type="submit" name="insert" value="Add">
        <input type="submit" name="update" value="Update">
        <input type="submit" name="delete"  value="Delete">
        <input type="submit" name="search" value="Find">
    </div>

</form>
