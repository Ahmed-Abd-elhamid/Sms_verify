<?php

if (isset($_POST['sub_user'])) {
    if (isset($_POST['first_name']) && isset($_POST['last_name']) && isset($_POST['email']) && isset($_POST['gender'])) {

        $conn = connection();
        $f_nam = mysqli_escape_string($conn, $_POST["first_name"]);
        $l_nam = mysqli_escape_string($conn, $_POST["last_name"]);
        $pss = mysqli_escape_string($conn, $_POST["password"]);
        $mail = mysqli_escape_string($conn, $_POST["email"]);
        $gend = mysqli_escape_string($conn, $_POST["gender"]);

        $check = insert($f_nam, $l_name, password_hash($pss, PASSWORD_DEFAULT), $mail, $gend, $conn);
        close($conn);

    } else {
        // $actual_link = "http://".$_SERVER['HTTP_HOST'];
        header("location: userForm.php?error=please fill form");
    }
}
