<?php
include_once 'config.php';

?>

<h1>Archive</h1>
<?php

$sql = "select assignments.title, assignments.created_at, assignments.updated_at, assignments.completed, assignments.employee_id, employees.first_name, employees.last_name from employees
join assignments on employees.id = assignments.employee_id";
$result = mysqli_query($database, $sql);
$completedTasks = mysqli_fetch_all($result, MYSQLI_ASSOC);

?>

<table border="1" cellpadding="10">
    <tr>
        <th>Title</th>
        <th>Employee</th>
        <th>Completed</th>
        <th>Created_at</th>
        <th>Completed At</th>
    </tr>
    <?php
    foreach ($completedTasks

    as $completedTask) { ?>
    <tr>
        <td align="center">
            <?php echo $completedTask['title'] ?>
        </td>
        <td align="center">
            <?php echo $completedTask['first_name'], ' ', $completedTask['last_name'] ?>
        </td>
        <td align="center">
            <?php echo $completedTask['completed'] ?>
        </td>
        <td>
            <?php echo $completedTask['created_at'] ?>
        </td>
        <td>
            <?php echo $completedTask['updated_at'] ?>
        </td>
        <?php }
        ?>

</table>
