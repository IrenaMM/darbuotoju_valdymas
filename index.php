<?php

require_once 'migration.php';
$connection = new database;

$rez=$connection->connect();
include_once 'config.php';

?>
<hr>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Darbuotojų valdymo sistema</title>
</head>
<body>
<style>
    table, td, h4 {
        padding-left: 10px;
    }
    button {
        margin-left: 150px;
        padding-left: 20px;
        padding-right: 20px;
        padding-bottom: 5px;
        padding-top: 5px;
          }
</style>

<?php
$page = $_REQUEST['page'] ?? null;
if ($page === 'home') {
    include 'home.php';
} elseif ($page === 'assignments') {
    include 'assignments.php';
} elseif ($page === 'archive') {
    include 'archive.php';
}
?>

</body>
</html>

