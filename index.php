<?php require_once "layouts/header.php"; ?>

<main role="main" class="flex-shrink-0">
    <div class="container">
        <div class="row justify-content-center">
            <?php if (isset($_GET['error'])) { ?>
                <div class="col-12 border rounded border-danger m-3 p-2">
                    <p class="text-center m-1 bold text-danger"><?= $_GET['error'] ?></p>
                </div>
            <?php } ?>
            <div class="col-sm-9 col-lg-6 border rounded border-dark shadow m-3 p-2">
                <form action="verify_phone.php" method="POST" name="phoneForm" id="phone_form" onsubmit="return validateForm()">
                    <div class="form-group text-center">
                        <h4 for="phone" class="bg-danger p-2 rounded shadow mb-3 text-white">Phone Number</h4>
                        <input type="tel" name="phone" id="phone" class="form-control text-center" placeholder="ex: 01234567891">
                        <button type="submit" class="btn btn-dark mt-3" name="sub_phone">Confirm</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>

<?php require_once "layouts/footer.php"; ?>

<script src="public/js/phone.js"></script>