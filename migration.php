<?php

class database
{
    function connect()
    {
        $connection = new mysqli('localhost', 'root', '', "", 3307);
        $this->dbh = $connection;

        $sql = "CREATE DATABASE IF NOT EXISTS darbuotoju_valdymas";

        if ($connection->query($sql) === true) {
            echo "Database created";
        } else {
            echo "Error: Could not able to execute $sql." . $connection->error;
        }

        $link = mysqli_connect("localhost", "root", "", "darbuotoju_valdymas", 3307);
        if ($link === false) {
            die("ERROR: Could not connect. " . mysqli_connect_error());
        }

        $sql1 = "CREATE TABLE IF NOT EXISTS employees (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
    first_name varchar(100) not NULL,
last_name varchar(100) not NULL)";

        $sql2 = "CREATE TABLE IF NOT EXISTS assignments (
       id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
employee_id int(6) not NULL,
title varchar(255) not NULL,
completed enum('no','yes', 'canceled') not NULL default 'no',
created_at DATE NOT NULL DEFAULT CURRENT_TIMESTAMP, 
updated_at TIMESTAMP on update CURRENT_TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP)";
        if (mysqli_query($link, $sql1)) {
            echo "Table employees created successfully.";
        } else {
            echo "ERROR: Could not able to execute $sql1. " . mysqli_error($link);
        }

        if (mysqli_query($link, $sql2)) {
            echo "Table assignments created successfully.";
        } else {
            echo "ERROR: Could not able to execute $sql2. " . mysqli_error($link);
        }
        mysqli_close($link);
    }
}

?>

