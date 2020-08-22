<?php require_once "layouts/header.php"; ?>

<main role="main" class="flex-shrink-0">
    <div class="container">
        <div class="row justify-content-center">
            <?php if (isset($_GET['error'])) { ?>
                <div class="col-12 border rounded border-danger m-3 p-2">
                    <p class="text-center m-1 bold text-danger"><?= $_GET['error'] ?></p>
                </div>
            <?php } ?>
            <form action="verify_phone.php" method="POST" name="codeForm" id="code_form" onsubmit="return validateForm()">
                <div class="form-group text-center">
                    <h4 for="code" class="bg-danger p-2 rounded shadow mb-3 text-white">code Number</h4>
                    <input type="tel" name="code" id="code" class="form-control text-center" placeholder="ex: 123456">
                    <input type="hidden" name="service" value="<?= $_GET['service'] ?>">
                    <input type="hidden" name="phone" value="<?= $_GET['phone'] ?>">
                    <button type="submit" class="btn btn-dark mt-3" name="sub_code">Confirm</button>
                </div>
            </form>
        </div>
    </div>
    </div>
</main>

<?php require_once "layouts/footer.php"; ?>

<script src="public/js/code.js"></script>