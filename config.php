<?php
echo "<h2>Darbuotojų užduočių valdymo panelė</h2>";

session_start();

$database = mysqli_connect('localhost', 'root', '', 'darbuotoju_valdymas', 3307);

if (!$database) {
    die("Connection failed: " . mysqli_connect_error());
} else {
    echo 'Pavyko pridėti' . '<hr>';
}

?>
    <table>
        <tr>
            <td>
                <a href="home.php?page=home">Home</a>
            </td>
            <td>
                <a href="assignments.php?page=assignments">Assignments</a>
            </td>
            <td>
                <a href="archive.php?page=archive">Archive</a>
            </td>
        </tr>
    </table>
