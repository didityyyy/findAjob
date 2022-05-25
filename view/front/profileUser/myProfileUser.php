<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/DR/view/layout/header.php"; ?>
<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/DR/src/controllers/front/profileUser/myProfileUserController.php"; ?>

<?php if (isset($_SESSION['username']) && $_SESSION['role'] == 4) : ?>

    <div class="my-profile">
        <div class="nav-profile">
            <ul class="profile-menu">
                <li>
                    <div>Моят профил<i class="fa-solid fa-angle-down"></i></div>
                    <ul>
                        <li><a href="#view-profile">Преглед на профила</a></li>
                        <li><a href="#change-pass">Смяна на парола</a></li>
                        <li><a href="#delete-profile">Изтриване на профил</a></li>
                    </ul>
                </li>
                <li>
                    <div>Дейности<i class="fa-solid fa-angle-down"></i></div>
                    <ul>
                        <li><a href="">Кандидаствания</a></li>
                        <li><a href="">Харесани обяви</a></li>
                        <!-- <li><a href=""></a></li> -->
                    </ul>
                </li>
            </ul>
        </div>

        <h2>Моят профил</h2>

        <div id="view-profile">
            <h3>Преглед на профила</h3>
            <div class="profile-details">
                <table>
                    <tr>
                        <td>Потребителско име: </td>
                        <td><?php echo $row[0]['username']; ?></td>
                    </tr>
                    <tr>
                        <td>Име: </td>
                        <td><?php echo $row[0]['firstname'] . " " . $row[0]['lastname'];  ?></td>
                    </tr>
                    <tr>
                        <td>Имейл: </td>
                        <td><?php echo $row[0]['email']; ?></td>
                    </tr>
                </table>
            </div>
        </div>

        <div id="change-pass">
            <h3>Смяна на парола</h3>
            <div class="change-pass">
                <form method="POST">

                <?php include $_SERVER['DOCUMENT_ROOT'] . "/DR/src/messages/error.php"; ?>
                <?php include $_SERVER['DOCUMENT_ROOT'] . "/DR/src/messages/success.php"; ?>

                    <div class="form-group">
                        <label for="oldPass">Стара Парола</label>
                        <input type="password" name="oldPass">
                    </div>
                    <div class="form-group">
                        <label for="newPass">Нова Парола</label>
                        <input type="password" name="newPass">
                    </div>
                    <div class="form-group">
                        <label for="newPassRepeat">Повторете Нова Парола</label>
                        <input type="password" name="newPassRepeat">
                    </div>
                    <button type="submit" name="btn-change-pass-user" id="btn-login">Смяна</button>
                </form>
            </div>
        </div>

        <div id="delete-profile">
            <h3>Изтриване на профил</h3>
            <div class="delete-profile">
                <form method="POST" class="flex-y">
                    <span>След натискане на бутона , вашият профил ще се изтрие перманентно!</span>
                    <button type="submit" name="btn-delete-profile" id="btn-delete-profile">Изтрийте профила</button>
                </form>
            </div>
        </div>

    </div>

<?php else : header('location: /DR/view/front/home.php'); ?>
<?php endif; ?>

<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/DR/view/layout/footer.php"; ?>