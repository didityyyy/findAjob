<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/DR/view/layout/header.php"; ?>
<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/DR/src/controllers/front/profileHR/jobsHRController.php"; ?>

<?php if (isset($_SESSION['username']) && $_SESSION['role'] == 1) : ?>

    <div class="list-company my20">
        <h2 class="mb10">Обява</h2>
        <div class="flex-y">
            <h4><?php echo $rowdetails[0]['companyname']; ?></h4>
            <img src="/DR/assets/images/logos/<?php echo $rowdetails[0]['logo']; ?>" alt="logo" class="logo-company">
        </div>

        <div class="details">
            <div>
                <h3><?php echo $rowdetails[0]['title']; ?> </h3>
                <p><span>Град: </span><?php echo $rowdetails[0]['City']; ?> ; Заплата: <?php echo $rowdetails[0]['payment']; ?> лв ; Категория: <?php echo $rowdetails[0]['Category']; ?></p>
            </div>
            <div>
                <h6>Описание и Изисквания</h6>
                <pre class="text-break py20">
                <?php echo $rowdetails[0]['description']; ?>
                </pre>
            </div>
        </div>

        <?php if($rowdetails[0]['approved'] == '0'): ?>
        <div>
            <form method="post">
                <button type="submit" class="btn input" name="approve">Одобри обявата</button>
                <button type="submit" class="btn input btn-red" name="disapprove">Изтрий обявата</button>
            </form>
        </div>
        <?php endif; ?>
    </div>

<?php else : header('location: /DR/view/front/home.php'); ?>
<?php endif; ?>

<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/DR/view/layout/footer.php"; ?>