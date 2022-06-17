<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/DR/view/layout/header.php"; ?>
<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/DR/src/controllers/front/profileCompany/myProfileCompanyController.php"; ?>

<?php if (isset($_SESSION['username']) && $_SESSION['role'] == 3) : ?>

    <div class="list-company my20">
        <h2 class="mb10">Обява</h2>

        <div class="details">
            <div>
                <h3><?php echo $rowdetails[0]['job']; ?> </h3>
                <p><span>Град: </span><?php echo $rowdetails[0]['city']; ?> ; <span>Заплата:</span> <?php echo $rowdetails[0]['payment']; ?> лв ; <span>Категория:</span> <?php echo $rowdetails[0]['category']; ?></p>
            </div>
            
            <div>
                <h6>Описание и Изисквания</h6>
                <pre class="text-break py20">
                <?php echo $rowdetails[0]['description']; ?>
                </pre>
            </div>
        </div>

    </div>

<?php else : header('location: /DR/view/front/home.php'); ?>
<?php endif; ?>

<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/DR/view/layout/footer.php"; ?>