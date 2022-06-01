<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/DR/view/layout/header.php"; ?>
<div class="w-100">
    <div class="main-bg height-bg flex-x">
        <img src="/DR/assets/images/main-bg.jpg" alt="main-bg">
        <h1 class="title-main">Welcome to our Application</h1>
    </div>
    <?php if (!isset($_SESSION['username'])) : ?>
    <div class="w-80 my20 mx-auto">
        <?php include_once $_SERVER['DOCUMENT_ROOT'] . "/DR/view/front/jobsLayout.php"; ?>
    </div>
    <?php endif; ?>
</div>

<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/DR/view/layout/footer.php"; ?>