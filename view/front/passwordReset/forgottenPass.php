<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/DR/view/layout/header.php"; ?>
<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/DR/src/controllers/front/resetPass/forgottenPassController.php"; ?>

<?php if(!isset($_SESSION['username'])) : ?>

<div class="login-bg height-bg flex-x">
    <div class="login flex-y">
        <p>Забравена парола</p>
        <form action="" method="post" class="flex-y">

            <?php include $_SERVER['DOCUMENT_ROOT'] . "/DR/src/messages/error.php"; ?>
            <?php include $_SERVER['DOCUMENT_ROOT'] . "/DR/src/messages/success.php"; ?>
            
            <div class="form-group">
                <label for="email-forgotten">Имейл</label>
                <input type="text" name="email-forgotten" id="email-forgotten">
            </div>
            <button type="submit" name="btn-forgotten-pass" id="btn-email-forgotten">Изпращане на линк</button>
        </form>
    </div>
</div>

<?php else : header('location: /DR/view/front/home.php'); ?>
<?php endif; ?>


<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/DR/view/layout/footer.php"; ?>