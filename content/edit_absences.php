<?php
/**
 * Created by PhpStorm.
 * User: Fejbioouuu
 * Date: 18.03.2019
 * Time: 10:58
 */
require_once 'class/Employee.php';

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






<form action="absences.php" method="post">
    <input type="number" name="Id" placeholder="Id" value="<?php ?>"><br><br>
    <select name="empId">
        <?php foreach (getAllEmployees() as $employee){ ?>
            <option value="<?php echo $employee->getId(); ?>"> <?php echo $employee->getVorname().' '.$employee->getName(); ?> </option>
                <?php } ?>
    </select>
        <div>
        <input type="submit" name="insert" value="Add">
        <input type="submit" name="update" value="Update">
        <input type="submit" name="delete"  value="Delete">
        <input type="submit" name="search" value="Find">
    </div>
    <input type="submit">
</form>
