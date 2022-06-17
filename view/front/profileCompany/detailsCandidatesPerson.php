<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/DR/view/layout/header.php"; ?>
<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/DR/src/controllers/front/profileCompany/viewCandidatesController.php"; ?>

<?php if (isset($_SESSION['username']) && $_SESSION['role'] == 3) : ?>

    <div class="list-company my20">
        <h2 class="mb10">Кандидатура</h2>
        <div class="flex-y">
            <h4>№ <?php echo $_GET['id-c']; ?></h4>
        </div>

        <div class="details">
            <div>
                <h6>Лични данни</h6>
                <p><span>Имена: </span><?php echo $rowDetails[0]['firstname']; ?> <?php echo $rowDetails[0]['lastname']; ?> </p>
                <p><span>Адрес: </span><?php echo $rowDetails[0]['address']; ?> ,<?php echo $rowDetails[0]['city']; ?> , ПК: <?php echo $rowDetails[0]['zipcode']; ?></p>
                <p><span>Телефон за връзка: </span><?php echo $rowDetails[0]['phone']; ?> </p>
                <p><span>Дата на раждане: </span><?php echo $rowDetails[0]['birthdate']; ?> </p>
            </div>
            <div>
                <h6>Трудов стаж</h6>
                <pre class="text-break py20">
                <?php echo $rowDetails[0]['workexperience']; ?>
                </pre>
            </div>
            <div>
                <h6>Образование и обучения</h6>
                <pre class="text-break py20">
                <?php echo $rowDetails[0]['educationexperience']; ?>
                </pre>
            </div>
            <div>
                <h6>Лични умения</h6>
                <pre class="text-break py20">
                <?php echo $rowDetails[0]['personalexperience']; ?>
                </pre>
            </div>
        </div>
    </div>
<?php else : header('location: /DR/view/front/home.php'); ?>
<?php endif; ?>

<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/DR/view/layout/footer.php"; ?>