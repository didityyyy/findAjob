<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/DR/view/layout/header.php"; ?>
<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/DR/src/controllers/front/profileUser/jobsController.php"; ?>

<?php //if (isset($_SESSION['username']) && $_SESSION['role'] == 4) : ?>

    <div class="list-company my20">
        <h2 class="mb10">Обява</h2>
        <div class="flex-y">
            <h4><?php echo $rowdetails[0]['companyname']; ?></h4>
            <img src="/DR/assets/images/logos/<?php echo $rowdetails[0]['logo']; ?>" alt="logo" class="logo-company">
        </div>

        <div class="details">
            <div>
                <h3><?php echo $rowdetails[0]['title']; ?> </h3>
                <p><span>Град: </span><?php echo $rowdetails[0]['City']; ?> ; <span>Заплата:</span> <?php echo $rowdetails[0]['payment']; ?> лв ; <span>Категория:</span> <?php echo $rowdetails[0]['Category']; ?></p>
            </div>
            <?php if(isset($_SESSION['username'])) : ?>
            <div>
                <?php if (mysqli_num_rows($result) > 0) : ?>
                    <form method="POST" class="flex">
                        <button type="submit" class="btn-unlike" name="unlike-job-btn">
                            <i class="fa-solid fa-heart"></i>
                        </button>
                        <p>Премахни от любими</p>
                    </form>
                <?php else : ?>
                    <form method="POST" class="flex">
                        <button type="submit" class="btn-like" name="like-job-btn">
                            <i class="fa-regular fa-heart"></i>
                        </button>
                        <p>Добави в любими</p>
                    </form>
                <?php endif; ?>
            </div>
            <?php endif; ?>
            <div>
                <h6>Описание и Изисквания</h6>
                <pre class="text-break py20">
                <?php echo $rowdetails[0]['description']; ?>
                </pre>
            </div>
        </div>

        <div>
            <form method="post">
                <button type="submit" class="btn input" name="candidate">Кандидатствай</button>
            </form>
        </div>
    </div>

<?php //else : header('location: /DR/view/front/home.php'); ?>
<?php //endif; ?>

<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/DR/view/layout/footer.php"; ?>