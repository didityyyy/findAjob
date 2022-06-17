<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/DR/view/layout/header.php"; ?>
<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/DR/src/controllers/front/profileHR/candidatesHRController.php"; ?>

<?php if (isset($_SESSION['username']) && $_SESSION['role'] == 1) : ?>

    <div class="back"><a href="/DR/view/front/profileHR/candidatesHR.php"><i class="fa-solid fa-arrow-left"></i></a></div>

    <div class="list-company my20">
        <h2 class="mb10">Кандидатура</h2>
        <div class="flex-y">
            <h4>По обява: <?php echo $result[0]['title']; ?></h4>
        </div>

        <?php include $_SERVER['DOCUMENT_ROOT'] . "/DR/src/messages/error.php"; ?>
        <?php include $_SERVER['DOCUMENT_ROOT'] . "/DR/src/messages/success.php"; ?>

        <div class="details">
            <div>
                <h6>Лични данни</h6>
                <p><span>Имена: </span><?php echo $result[0]['firstname']; ?> <?php echo $result[0]['lastname']; ?> </p>
                <p><span>Адрес: </span><?php echo $result[0]['address']; ?> ,<?php echo $result[0]['city']; ?> , ПК: <?php echo $result[0]['zipcode']; ?></p>
                <p><span>Телефон за връзка: </span><?php echo $result[0]['phone']; ?> </p>
                <p><span>Дата на раждане: </span><?php echo $result[0]['birthdate']; ?> </p>
            </div>
            <div>
                <h6>Трудов стаж</h6>
                <pre class="text-break py20">
                <?php echo $result[0]['workexperience']; ?>
                </pre>
            </div>
            <div>
                <h6>Образование и обучения</h6>
                <pre class="text-break py20">
                <?php echo $result[0]['educationexperience']; ?>
                </pre>
            </div>
            <div>
                <h6>Лични умения</h6>
                <pre class="text-break py20">
                <?php echo $result[0]['personalexperience']; ?>
                </pre>
            </div>
        </div>

        <!-- <div class="flex-around-x"> -->
        <form method="POST" class="flex-around-x" id="buttonsCandidateHR">
            <?php if ($result[0]['id'] == 5) : ?>
                <input type="submit" class="input btn" style="width: 30%;" name="approvedinterview" value="Одобри за интервю">
            <?php endif; ?>
            <?php if ($result[0]['id'] == 1) : ?>
                <input type="submit" class="input btn" style="width: 30%;" name="interviewed" value="Интервюиран">
            <?php endif; ?>
            <?php if ($result[0]['id'] == 2) : ?>
                <input type="submit" class="input btn" style="width: 30%;" name="approved" value="Одобри">
            <?php endif; ?>
            <?php if ($result[0]['id'] == 5 || $result[0]['id'] == 1 || $result[0]['id'] == 2) : ?>
                <input type="submit" class="input btn-red" style="width: 30%;" name="rejected" value="Отхвърли">
            <?php endif; ?>
        </form>
        <!-- </div> -->
    </div>
<?php else : header('location: /DR/view/front/home.php'); ?>
<?php endif; ?>

<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/DR/view/layout/footer.php"; ?>