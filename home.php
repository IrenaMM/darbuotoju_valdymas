<?php
include_once 'config.php';
?>

    <h2>New Employee</h2>
<?php

if (isset($_POST['first_name']) && isset($_POST['last_name'])) {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];

    $sql = 'insert into employees (first_name, last_name) value ("' . $_POST['first_name'] . '" , "' . $_POST['last_name'] . '")';
    mysqli_query($database, $sql);
}
$result = mysqli_query($database, 'select * from employees');
$employees = mysqli_fetch_all($result, MYSQLI_ASSOC);

?>
    <form action="home.php?page=home" method="post">
        <table border="1" cellpadding="10">
            <tr>
                <td>
                    <input type="text" placeholder="First name" name="first_name" maxlength="100">
                </td>
            <tr>
                <td>
                    <input type="text" placeholder="Last name" name="last_name" maxlength="100">
                </td>
            </tr>
            <tr>
                <td>
                    <button type="submit">Create</button>
                </td>
            </tr>
        </table>
    </form>

    <table border="1" cellpadding="10">
        <tr>
            <th>Employee_id</th>
            <th>First name</th>
            <th>Last name</th>
        </tr>
        <?php foreach ($employees

        as $employee) { ?>
        <tr>
            <td>
                <?php echo $employee['id'] ?>
            </td>
            <td>
                <?php echo $employee['first_name'] ?>
            </td>
            <td>
                <?php echo $employee['last_name'] ?>
            </td>
            <?php } ?>
    </table>

    <hr>
    <hr>

    <h2>New Assignment</h2>
<?php

if (isset($_POST['title']) && isset($_POST['employee_id'])) {
    $title = $_POST['title'];
    $employee_id = $_POST['employee_id'];

    $sql = 'insert into assignments (title, employee_id) value ("' . $_POST['title'] . '" , "' . $_POST['employee_id'] . '")';
    mysqli_query($database, $sql);
}
$result = mysqli_query($database, 'select * from assignments');
$assignments = mysqli_fetch_all($result, MYSQLI_ASSOC);

?>
    <form action="home.php?page=home" method="post">
        <table border="1" cellpadding="10">
            <tr>
                <td>
                    <input type="text" placeholder="Title" name="title" maxlength="255">
                </td>
            <tr>
                <td>
                    <select placeholder="Employees" name="employee_id" multiple>
                        <?php foreach ($employees as $employee) { ?>
                            <option value="<?php echo $employee['id'] ?>"><?php echo $employee['first_name'] ?><?php echo $employee['last_name'] ?></option>
                        <?php } ?>
                    </select>

                    <br/>
                </td>
            </tr>
            <tr>
                <td>
                    <button type="submit">Create</button>
                </td>
            <tr>
        </table>
    </form>
<?php
echo date('Y-m-d H:i:s');
?>