<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/DR/src/controllers/front/loginController.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="/DR/assets/images/logo.png" sizes="100x100">

    <!-- FONTS -->
    <link href="https://fonts.googleapis.com/css2?family=Glass+Antiqua&family=Manrope&family=Montserrat+Alternates&display=swap" rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" href="/DR/assets/css/layout.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="/DR/assets/css/style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="/DR/assets/css/responsive.css?v=<?php echo time(); ?>">

    <script src="/DR/assets/libs/jquery/jquery.js"></script>

    <title>Find a Job</title>
</head>

<!--Start of Tawk.to Script-->
<?php if (isset($_SESSION['role'])) : ?>
    <?php if ($_SESSION['role'] == 3) : ?>
        <script type="text/javascript">
            var Tawk_API = Tawk_API || {},
                Tawk_LoadStart = new Date();
            (function() {
                var s1 = document.createElement("script"),
                    s0 = document.getElementsByTagName("script")[0];
                s1.async = true;
                s1.src = 'https://embed.tawk.to/62a463127b967b117993fa81/1g59260p2';
                s1.charset = 'UTF-8';
                s1.setAttribute('crossorigin', '*');
                s0.parentNode.insertBefore(s1, s0);
            })();
        </script>
    <?php endif; ?>
<?php endif; ?>
<!--End of Tawk.to Script-->

<body>
    <div class="container">
        <div class="nav" id="nav">
            <ul>
                <li class="logo"><img src="/DR/assets/images/logo.png" alt="logo"></li>
                <li class="text">Find a Job</li>
            </ul>

            <!-- GUEST MODE -->
            <?php if (!isset($_SESSION['role'])) : ?>

                <div id="open"><i class="fa-solid fa-bars"></i></div>
                <ul class="menu" id="menu-wrap">
                    <div id="close"><i class="fa-solid fa-xmark"></i></div>
                    <li><a href="/DR/view/front/home.php">Начало</a></li>
                    <li><a href="/DR/view/front/login.php">Вход</a></li>
                    <li><a href="/DR/view/front/signup.php">Регистрация</a></li>
                    <li><a href="/DR/view/front/contacts.php">Контакти</a></li>
                </ul>

            <?php endif; ?>

            <?php if (isset($_SESSION['role'])) : ?>
                <!-- HR MODE  -->
                <?php if ($_SESSION['role'] == 1) : ?>

                    <div id="open"><i class="fa-solid fa-bars"></i></div>
                    <ul class="menu" id="menu-wrap">
                        <div id="close"><i class="fa-solid fa-xmark"></i></div>
                        <li class="dropdown-menu">
                            <a onclick="return false">Опции<i class="fa-solid fa-angle-down"></i></a>
                            <ul class="dropdown-elements" id="removeClass">
                                <li><a href="/DR/view/front/profileHR/candidatesHR.php">Кандидатури</a></li>
                                <hr>
                                <li><a href="/DR/view/front/profileHR/jobsHR.php">Обяви</a></li>
                            </ul>
                        </li>
                        <li><a href="/DR/view/front/profileHR/companiesHR.php">Фирми</a></li>
                        <li><a href="/DR/view/front/home.php?logout=1"><i class="fas fa-sign-out-alt"></i></a></li>
                    </ul>

                <?php endif; ?>

                <!-- ADMIN MODE -->
                <?php if ($_SESSION['role'] == 2) : ?>

                    <div id="open"><i class="fa-solid fa-bars"></i></div>
                    <ul class="menu" id="menu-wrap">
                        <div id="close"><i class="fa-solid fa-xmark"></i></div>
                        <!-- <li><a href="#">Добавяне на категории</a></li> -->
                        <!-- <li class="dropdown-menu">
                            <a href="">Служители<i class="fa-solid fa-angle-down"></i></a>
                            <ul class="dropdown-elements" id="removeClass"> -->
                                <li><a href="/DR/view/admin/HRs.php">Списък Служители</a></li>
                                <hr>
                                <li><a href="/DR/view/admin/addHR.php">Добавяне на служител</a></li>
                            <!-- </ul>
                        </li> -->
                        <li><a href="/DR/view/front/home.php?logout=1"><i class="fas fa-sign-out-alt"></i></a></li>
                    </ul>

                <?php endif; ?>

                <!-- COMPANY MODE -->
                <?php if ($_SESSION['role'] == 3) : ?>

                    <div id="open"><i class="fa-solid fa-bars"></i></div>
                    <ul class="menu" id="menu-wrap">
                        <div id="close"><i class="fa-solid fa-xmark"></i></div>
                        <li><a href="/DR/view/front/profileCompany/myProfileCompany.php">Профил</a></li>
                        <li><a href="/DR/view/front/profileCompany/addJob.php">Добави обява</a></li>
                        <li><a href="/DR/view/front/profileCompany/viewCandidates.php">Кандидатури</a></li>
                        <li><a href="/DR/view/front/home.php?logout=1"><i class="fas fa-sign-out-alt"></i></a></li>
                    </ul>

                <?php endif; ?>

                <!-- USERS MODE -->
                <?php if ($_SESSION['role'] == 4) : ?>

                    <div id="open"><i class="fa-solid fa-bars"></i></div>
                    <ul class="menu" id="menu-wrap">
                        <div id="close"><i class="fa-solid fa-xmark"></i></div>
                        <li><a href="/DR/view/front/home.php">Начало</a></li>
                        <li><a href="/DR/view/front/profileUser/myProfileUser.php">Профил</a></li>
                        <li><a href="/DR/view/front/profileUser/jobs.php">Обяви</a></li>
                        <li><a href="/DR/view/front/contacts.php">Контакти</a></li>
                        <li><a href="/DR/view/front/home.php?logout=1"><i class="fas fa-sign-out-alt"></i></a></li>
                    </ul>

                <?php endif; ?>

            <?php endif; ?>


            <?php if (isset($_SESSION['username'])) : ?>
                <div class="nav-bottom">
                    <div class="user">
                        <h5> Welcome, <?php echo $_SESSION['username']; ?> </h5>
                    </div>
                </div>
            <?php endif; ?>


        </div>

        <div class="inner-container flex-start-x">