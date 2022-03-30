<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/DR/view/layout/header.php"; ?>
<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/DR/src/controllers/front/resetPass/resetPassController.php"; ?>

<?php if(isset($_GET['tokenpass'])) : ?>

<div class="login-bg height-bg flex-x">
    <div class="login flex-y">
        <p>Възстановяване на парола</p>
        <form action="" method="post" class="flex-y">

            <?php include $_SERVER['DOCUMENT_ROOT'] . "/DR/src/messages/error.php"; ?>
            <?php include $_SERVER['DOCUMENT_ROOT'] . "/DR/src/messages/success.php"; ?>
            
            <div class="form-group">
                <label for="pass-forgotten">Нова Парола</label>
                <input type="password" name="pass-forgotten" id="pass-forgotten">
            </div>
            <div class="form-group">
                <label for="pass-forgotten-repeat">Повтори Парола</label>
                <input type="password" name="pass-forgotten-repeat" id="pass-forgotten-repeat">
            </div>
            <button type="submit" name="btn-renew-pass" id="btn-renew-pass">Промяна на парола</button>
        </form>
    </div>
</div>

<?php else : header('location: /DR/view/front/home.php'); ?>
<?php endif; ?>


<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/DR/view/layout/footer.php"; ?>