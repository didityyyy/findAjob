<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/DR/view/layout/header.php"; ?>
<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/DR/src/controllers/admin/addHRController.php"; ?>

<?php if (isset($_SESSION['username']) && $_SESSION['role'] == 2) : ?>

    <form method="post" class="form my20">

        <h2 class="mb10">Добавяне на нов служител</h2>

        <?php include $_SERVER['DOCUMENT_ROOT'] . "/DR/src/messages/error.php"; ?>
        <?php include $_SERVER['DOCUMENT_ROOT'] . "/DR/src/messages/success.php"; ?>

        <div class="form-group">
            <label for="usernameHR">Потребителско име</label>
            <input type="text" class="input" name="usernameHR">
        </div>
        <div class="form-group">
            <label for="passwordHR">Парола</label>
            <input type="password" class="input" name="passwordHR">
        </div>
        <div class="form-group">
            <label for="firstnameHR">Име</label>
            <input type="text" class="input" name="firstnameHR">
        </div>
        <div class="form-group">
            <label for="lastnameHR">Фамилия</label>
            <input type="text" class="input" name="lastnameHR">
        </div>

        <div class="form-group">
            <input type="submit" class="input btn" name="add-HR-btn" value="Добави служител">
        </div>

    </form>

<?php else : header('location: /DR/view/front/home.php'); ?>
<?php endif; ?>

<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/DR/view/layout/footer.php"; ?>