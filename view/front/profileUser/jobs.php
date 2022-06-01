<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/DR/view/layout/header.php"; ?>

<?php if (isset($_SESSION['username']) && $_SESSION['role'] == 4) : ?>
    <div class="w-80" style="min-height: 65vh;">
    
    <?php include_once $_SERVER['DOCUMENT_ROOT'] . "/DR/view/front/jobsLayout.php"; ?>
        
    </div>
<?php else : header('location: /DR/view/front/home.php'); ?>
<?php endif; ?>

<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/DR/view/layout/footer.php"; ?>