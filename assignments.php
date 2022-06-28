<?php
include_once 'config.php';
?>


<h1>Assignments</h1>

<footer>
    <input type="button" value="New Employee" name="submit" onclick="location='home.php'"/>
    <input type="button" value="New Assignment" name="submit" onclick="location='home.php'"/>
</footer>
<br>
<?php
$sql = "select assignments.id, assignments.title, assignments.created_at, assignments.employee_id, employees.first_name, employees.last_name from employees
join assignments on employees.id = assignments.employee_id";
$result = mysqli_query($database, $sql);
$assignments = mysqli_fetch_all($result, MYSQLI_ASSOC);

$action = $_GET['action'] ?? null;
if ($action == 'delete') {
    $id = $_GET['id'];
    $delete = "update assignments set completed = 'canceled' where id = '$id'";
    mysqli_query($database, $delete);
    header('Location: index.php?page=assignments');
}

$action = $_GET['action'] ?? null;
if ($action == 'edit') {
    $id = $_GET['id'];
    $edit = "update assignments set completed = 'yes' where id = '$id'";

    mysqli_query($database, $edit);
    header('Location: assignments.php?page=archive');
}

?>
<table border="1" cellpadding="10">
    <tr>
        <th>Title</th>
        <th>Employee</th>
        <th>Created At</th>
        <th>Complete</th>
        <th>Delete</th>
    </tr>
    <?php foreach ($assignments

    as $assignment) { ?>
    <tr>
        <td align="center">
            <?php echo $assignment['title'] ?>
        </td>
        <td align="center">
            <?php echo $assignment['first_name'], ' ', $assignment['last_name'] ?>
        </td>
        <td>
            <?php echo $assignment['created_at'] ?>
        </td>
        <td>
            <a href="index.php?page=assignments&action=edit&id=<?php echo $assignment['id'] ?>">Complete</a>
        </td>
        <td>
            <a href="index.php?page=assignments&action=delete&id=<?php echo $assignment['id'] ?>">Delete</a>
        </td>
        <?php } ?>
</table>


