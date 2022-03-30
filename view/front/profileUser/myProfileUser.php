<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/DR/view/layout/header.php"; ?>

<?php if(isset($_SESSION['username']) && $_SESSION['role'] == 4) : ?>


    
<?php else : header('location: /DR/view/front/home.php'); ?>
<?php endif; ?>    

<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/DR/view/layout/footer.php"; ?>