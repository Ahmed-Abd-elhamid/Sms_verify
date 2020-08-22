<?php
session_start();
if (isset($_COOKIE['valid']) && $_COOKIE['valid'] && isset($_SESSION['valid']) && $_SESSION['valid'] && !isset($_GET['error'])) {
    $welcome = "Welcome to our awesome app!";
} else {
    header("location: index.php");
}
?>
<?php require_once "layouts/header.php"; ?>

<main role="main" class="flex-shrink-0">
    <div class="container">
        <div class="row justify-content-center">
            <?php if (isset($_GET['error'])) { ?>
                <div class="col-12 border rounded border-danger m-3 p-2">
                    <p class="text-center m-1 bold text-danger"><?= $_GET['error'] ?></p>
                </div>
            <?php } ?>
            <?php if (isset($welcome)) { ?>
                <div class="col-12 border rounded border-success m-3 p-2">
                    <p class="text-center m-1 bold text-success"><?= $welcome ?></p>
                </div>
            <?php } ?>
            <div class="col-sm-8 col-lg-4 border rounded border-dark shadow m-3 p-2">
                <form action="verify_user.php" method="POST" name="userForm" id="user_form" onsubmit="return validateForm()">
                    <div class="form-group text-center border mb-3 p-2">
                        <h5 for="first_name" class="bg-danger p-2 rounded shadow mb-3 text-white">First Name</h5>
                        <input type="text" name="first_name" id="first_name" class="form-control text-center" placeholder="first name">
                    </div>
                    <div class="form-group text-center border mb-3 p-2">
                        <h5 for="last_name" class="bg-danger p-2 rounded shadow mb-3 text-white">Last Name</h5>
                        <input type="text" name="last_name" id="last_name" class="form-control text-center" placeholder="last name">
                    </div>
                    <div class="form-group text-center border mb-3 p-2">
                        <h5 for="email" class="bg-danger p-2 rounded shadow mb-3 text-white">Email</h5>
                        <input type="email" name="email" id="email" class="form-control text-center" placeholder="email">
                    </div>
                    <div class="form-group text-center border mb-3 p-2">
                        <h5 for="password" class="bg-danger p-2 rounded shadow mb-3 text-white">password</h5>
                        <input type="password" name="password" id="password" class="form-control text-center" placeholder="password">
                    </div>
                    <div class="form-group text-center border mb-3 p-2">
                        <h5 for="gender" class="bg-danger p-2 rounded shadow mb-3 text-white">Gender</h5>
                        <input type="radio" name="gender" id="male" value="male">male<br>
                        <input type="radio" name="gender" id="female" value="female">female<br>
                    </div>
                    <div class="form-group text-center border mb-3 p-2">
                        <button type="submit" class="btn btn-dark mt-3" name="sub_user">Confirm</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>

<?php require_once "layouts/footer.php"; ?>

<script src="public/js/user.js"></script>