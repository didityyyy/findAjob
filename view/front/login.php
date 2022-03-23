<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/DR/view/layout/header.php"; ?>

<div class="login-bg height-bg flex-x">
    <div class="login flex-y">
        <p>Вход</p>
        <form action="" method="post" class="flex-y">

            <?php include $_SERVER['DOCUMENT_ROOT'] . "/DR/src/messages/error.php"; ?>
            
            <div class="form-group">
                <label for="username-login">Потребителско име</label>
                <input type="text" name="username-login" id="username-login">
            </div>
            <div class="form-group">
                <label for="password-login">Парола</label>
                <input type="password" name="password-login" id="password-login">
            </div>
            <button type="submit" name="btn-login" id="btn-login">Вход</button>
            <p><a href="">Забравена парола</a></p>
            <p>Нямате акаунт? <a href="/DR/view/front/signup.php">Регистрация</a></p>
        </form>
    </div>
</div>

<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/DR/view/layout/footer.php"; ?>