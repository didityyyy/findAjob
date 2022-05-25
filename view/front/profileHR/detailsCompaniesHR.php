<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/DR/view/layout/header.php"; ?>
<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/DR/src/controllers/front/profileHR/companiesHRController.php"; ?>

<?php if (isset($_SESSION['username']) && $_SESSION['role'] == 1) : ?>

    <div class="list-company my20">
        <h2 class="mb10">Фирмa</h2>
        <div class="flex-y">

            <h4><?php echo $row[0]['companyname']; ?></h4>
            <img src="/DR/assets/images/logos/<?php echo $row[0]['logo']; ?>" alt="logo" class="logo-company">
        </div>

        <div class="details">
            <div>
                <h6>Лични данни</h6>
                <p><span>Имена: </span><?php echo $row[0]['firstname']; ?> <?php echo $row[0]['lastname']; ?> </p>
                <p><span>Имейл: </span><?php echo $row[0]['email']; ?> </p>
                <p><span>Потребителско име: </span><?php echo $row[0]['username']; ?> </p>
                <p><span>БУЛСТАТ: </span><?php echo $row[0]['companyid']; ?> </p>
                <p><span>Телефон за връзка: </span><?php echo $row[0]['phone']; ?> </p>
            </div>
            <div>
                <h6>Обяви</h6>
                <?php for ($n = 0; $n < count($rowjob); $n += 1) : ?>
                    <p><a href="/DR/view/front/profileHR/detailsJobsHR.php?id=<?php echo $rowjob[$n]['id']; ?>"><span><?php echo $rowjob[$n]['title']; ?></span></a></p>
                <?php endfor; ?>
            </div>
        </div>
    </div>

<?php else : header('location: /DR/view/front/home.php'); ?>
<?php endif; ?>

<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/DR/view/layout/footer.php"; ?>