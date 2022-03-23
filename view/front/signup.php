<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/DR/view/layout/header.php"; ?>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/DR/src/controllers/front/signupController.php'; ?>

<div class="signup-bg flex-x">
    <div class="signup flex-y">
        <div class="signup-toggle">
            <button class="tab-toggle active" data-id="signup-client">Регистрация за Потребители</button>
            <button class="tab-toggle" data-id="signup-company">Регистрация за Фирми</button>
        </div>
        <div class="signup-content">
            <div class="content active" id="signup-client">
                <p>Регистрация</p>
                <form action="" method="post" class="flex-y">

                <?php include $_SERVER['DOCUMENT_ROOT'] . "/DR/src/messages/error.php"; ?>
                <?php include $_SERVER['DOCUMENT_ROOT'] . "/DR/src/messages/success.php"; ?>

                    <div class="form-group">
                        <label for="firstnameClient">Име</label>
                        <input type="text" name="firstnameClient">
                    </div>
                    <div class="form-group">
                        <label for="lastnameClient">Фамилия</label>
                        <input type="text" name="lastnameClient">
                    </div>
                    <div class="form-group">
                        <label for="usernameRegisterClient">Потребителско име</label>
                        <input type="text" name="usernameRegisterClient">
                    </div>
                    <div class="form-group">
                        <label for="emailClient">Имейл</label>
                        <input type="text" name="emailClient">
                    </div>
                    <div class="form-group">
                        <label for="repeatemailClient">Повтори имейл</label>
                        <input type="text" name="repeatemailClient">
                    </div>
                    <div class="form-group">
                        <label for="passwordRegisterClient">Парола</label>
                        <input type="password" name="passwordRegisterClient">
                    </div>
                    <div class="form-group">
                        <label for="repeatpasswordClient">Повтори парола</label>
                        <input type="password" name="repeatpasswordClient">
                    </div>
                    <div class="form-check">
                        <input type="checkbox" name="invalidCheckClient" id="invalidCheckClient">
                        <label for="invalidCheckClient">
                            Съгласен съм с Условията за ползване, Политиката за защита на лични данни
                        </label>
                    </div>

                    <button type="submit" name="signup-btn-client" id="btn-signup-client">Регистрация</button>
                    <p>Имате акаунт? <a href="/DR/view/front/login.php">Вход</a></p>
                </form>
            </div>
            <div class="content" id="signup-company">
                <p>Регистрация</p>
                <form action="" method="post" class="flex-y" enctype="multipart/form-data">

                <?php //include $_SERVER['DOCUMENT_ROOT']. "/DR/src/messages/error.php"; ?>
                <?php //include $_SERVER['DOCUMENT_ROOT'] . "/DR/src/messages/success.php"; ?>

                    <div class="form-group">
                        <label for="firstnameCompany">Име</label>
                        <input type="text" name="firstnameCompany">
                    </div>
                    <div class="form-group">
                        <label for="lastnameCompany">Фамилия</label>
                        <input type="text" name="lastnameCompany">
                    </div>
                    <div class="form-group">
                        <label for="phoneCompany">Телефон</label>
                        <input type="text" name="phoneCompany">
                    </div>
                    <div class="form-group">
                        <label for="usernameRegisterCompany">Потребителско име</label>
                        <input type="text" name="usernameRegisterCompany">
                    </div>
                    <div class="form-group">
                        <label for="emailCompany">Имейл</label>
                        <input type="text" name="emailCompany">
                    </div>
                    <div class="form-group">
                        <label for="repeatemailCompany">Повтори имейл</label>
                        <input type="text" name="repeatemailCompany">
                    </div>
                    <div class="form-group">
                        <label for="passwordRegisterCompany">Парола</label>
                        <input type="password" name="passwordRegisterCompany">
                    </div>
                    <div class="form-group">
                        <label for="repeatpasswordCompany">Повтори парола</label>
                        <input type="password" name="repeatpasswordCompany">
                    </div>
                    <div class="form-group">
                        <label for="companyname">Юридическо име на фирмата</label>
                        <input type="text" name="companyname">
                    </div>
                    <div class="form-group">
                        <label for="companyid">БУЛСТАТ</label>
                        <input type="text" name="companyid">
                    </div>
                    <div class="form-group">
                        <label for="companylogo">Лого</label>
                        <input type="file" name="companylogo" id="upload-logo" multiple accept=".jpg, .png, .gif, .jpeg" style="padding: 3px;">
                        <label for="upload-logo"><i class="fa-solid fa-upload"></i>Прикачете лого</label>
                        <span class="file-name">
                            <strong>Избран файл: </strong>
                            <span id="file-name"></span>
                        </span>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" value="" name="invalidCheckCompany" id="invalidCheckCompany">
                        <label for="invalidCheckCompany">
                            Съгласен съм с Условията за ползване, Политиката за защита на лични данни
                        </label>
                    </div>

                    <button type="submit" name="signup-btn-company" id="btn-signup-company">Регистрация</button>
                    <p>Имате акаунт? <a href="/DR/view/front/login.php">Вход</a></p>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    //TOGGLE REGISTRATION
    const tabs = document.querySelector(".signup");
    const tabButton = document.querySelectorAll(".tab-toggle");
    const contents = document.querySelectorAll(".content");

    tabs.onclick = e => {
        const id = e.target.dataset.id;
        if (id) {
            tabButton.forEach(btn => {
                btn.classList.remove("active");
            });
            e.target.classList.add("active");
            contents.forEach(content => {
                content.classList.remove("active");
            });
            const element = document.getElementById(id);
            element.classList.add("active");
        }
    }


    //FILE UPLOAD
    var inputfile = document.getElementById('upload-logo');
    var filename = document.getElementById('file-name');
    inputfile.addEventListener('change', function(e){
        var uploadedfile = e.target.files[0].name;
        filename.textContent = uploadedfile;
    })
    
</script>
<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/DR/view/layout/footer.php"; ?>