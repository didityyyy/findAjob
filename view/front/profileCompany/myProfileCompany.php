<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/DR/view/layout/header.php"; ?>
<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/DR/src/controllers/front/profileCompany/myProfileCompanyController.php"; ?>

<?php if (isset($_SESSION['username']) && $_SESSION['role'] == 3) : ?>

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
                        <li><a href="#added-jobs">Добавени обяви</a></li>
                    </ul>
                </li>
            </ul>
        </div>

        <h2>Моят профил</h2>

        <div class="my20 flex-x">
            <?php include $_SERVER['DOCUMENT_ROOT'] . "/DR/src/messages/error.php"; ?>
            <?php include $_SERVER['DOCUMENT_ROOT'] . "/DR/src/messages/success.php"; ?>
        </div>
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
                    <tr>
                        <td>Фирма: </td>
                        <td><?php echo $row[0]['companyname']; ?></td>
                    </tr>
                    <tr>
                        <td>Булстат: </td>
                        <td><?php echo $row[0]['companyid']; ?></td>
                    </tr>
                    <tr>
                        <td>Лого: </td>
                        <td><img src="/DR/assets/images/logos/<?php echo $row[0]['logo']; ?>" alt="logo" class="logo-company"></td>
                    </tr>
                </table>
            </div>
        </div>

        <div id="change-pass">
            <h3>Смяна на парола</h3>
            <div class="change-pass">
                <form method="POST">

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
                    <button type="button" id="btn-delete-profile">Изтрийте профила</button>
                </form>

                <div class="terms-bg flex">
                    <div class="deleteConfirmation">
                        <div id="closeTerms"><i class="fa-solid fa-xmark"></i></div>
                        <div class="text">
                            <h2 style="text-align: center; margin-top:15px;">Потвърждение</h2>
                            <form method="POST">
                                <?php include $_SERVER['DOCUMENT_ROOT'] . "/DR/src/messages/error.php"; ?>
                                <div class="form-group">
                                    <input type="password" name="passwordDelete" placeholder="Парола...">
                                </div>
                                <p style="text-align: center;" class="my20">Акаунтът ви ще бъде изтрит!</p>
                                <div class="flex-between-x"> <button type="button" id="btn-cancel" class="btn-small">Откажи</button>
                                    <button type="button" id="btn-delete" name="btn-delete-profile" class="btn-small">Изтрий</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <h2>Дейности</h2>

        <div id="added-jobs">
            <h3>Добавени обяви</h3>
            <div class="liked-details">
                <?php if (mysqli_num_rows($resultsAddedJobs) > 0) : ?>
                    <table>
                        <tr>
                            <th>Обява</th>
                            <th>Одобрена</th>
                            <th>Валидна до:</th>
                            <th>Общо кандидатури</th>
                        </tr>
                        <?php for ($n = 0; $n < count($rowAddedJobs); $n += 1) : ?>
                            <tr>
                                <td><a href="/DR/view/front/profileUser/detailsJobs.php?id=<?php echo $rowLiked[$n]['id']; ?>" class="bold-text"><?php echo $rowAddedJobs[$n]['title']; ?></a></td>
                                <td><?php if($rowAddedJobs[$n]['approved'] == 0){ echo "В изчакване";}
                                else{ echo "ДА"; }?></td>
                                <td><abbr title="<?php echo $rowAddedJobs[$n]['expire_date']; ?>"> <?php
                                $datenow = date("Y-m-d");
                                $expiredate = $rowAddedJobs[$n]['expire_date'];
                                $difference = abs(strtotime($expiredate) - strtotime($datenow));
                                $years  = floor($difference / (365 * 60 * 60 * 24));
                                $months = floor(($difference - $years * 365 * 60 * 60 * 24) / (30 * 60 * 60 * 24));
                                $days   = floor(($difference - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 *24) / (60 * 60 * 24));
                                echo $days . ' дни'; ?></abbr></td>
                                <td><?php echo $rowAddedJobs[$n]['title']; ?></td>
                            </tr>



                        <?php endfor; ?>
                    </table>
                <?php else : ?>
                    <p class="no-data">Няма налични данни</p>
                <?php endif; ?>
            </div>
        </div>

    </div>

<?php else : header('location: /DR/view/front/home.php'); ?>
<?php endif; ?>

<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/DR/view/layout/footer.php"; ?>