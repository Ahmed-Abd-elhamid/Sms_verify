<?php

function connection()
{
    $conn = new mysqli("localhost", "root", "admin", "PhpDB");
    return $conn;
}

function select($user, $conn)
{
    $sql = "select * from User where name= ?;";
    $stmt = mysqli_stmt_init($conn);

    if (mysqli_stmt_prepare($stmt, $sql)) {
        mysqli_stmt_bind_param($stmt, "s", $user);
        mysqli_stmt_execute($stmt);
        $res = mysqli_stmt_get_result($stmt);
    }
    return (mysqli_fetch_assoc($res));
}

function selectAll($conn)
{
    $sql = "select * from User;";
    $stmt = mysqli_stmt_init($conn);

    if (mysqli_stmt_prepare($stmt, $sql)) {
        mysqli_stmt_execute($stmt);
        $res = mysqli_stmt_get_result($stmt);
        while ($row = mysqli_fetch_assoc($res)) {
            $data[] = $row;
        }
    }
    return $data;
}

function delete($conn, $id)
{
    $sql = "delete from User where id = ?;";
    $stmt = mysqli_stmt_init($conn);

    if (mysqli_stmt_prepare($stmt, $sql)) {
        mysqli_stmt_bind_param($stmt, "i", $id);
        mysqli_stmt_execute($stmt);
    }
}

function insert($first_name, $last_name, $pass, $mail, $gender, $conn)
{
    $sql = "insert into User(`first_name`, `last_name`, `passwd`,`email`,`gender`, `created_at`) values (?,?,?,?,?,Now());";
    $stmt = mysqli_stmt_init($conn);

    if (mysqli_stmt_prepare($stmt, $sql)) {
        mysqli_stmt_bind_param($stmt, "sssss", $first_name, $last_name, $pass, $mail, $gender);
        if (mysqli_stmt_execute($stmt)) {
            return true;
        }
    }
    return false;
}

function close($conn)
{
    $conn->close();
}