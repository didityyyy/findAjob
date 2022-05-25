</div>

<div class="footer" id="footer">
    <!-- <div class="footer-menu"> -->
        
        <ul>
            <li><a href="#"><i class="fa-brands fa-facebook"></i></a></li>
            <li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
            <li><a href="#"><i class="fa-brands fa-twitter"></i></a></li>
            <li><a href="#"><i class="fa-brands fa-linkedin"></i></a></li>
        </ul>
        <?php if ((!isset($_SESSION['role'])) || $_SESSION['role'] == 3 || $_SESSION['role'] == 4) : ?>
        <ul class="flex-y">
            <li><a href="">Начало</a></li>
            <li><a href="">Често задавани въпроси</a></li>
            <li><a href="/DR/view/front/contacts.php">Контакти</a></li>
        </ul>
        <?php endif; ?>
    <!-- </div> -->
    <p>© <?php echo date("Y"); ?> Copyright: Find a Job</p>
</div>
</div>

<script src="https://kit.fontawesome.com/0dfb737c10.js" crossorigin="anonymous"></script>

<script type="text/javascript" src="/DR/assets/js/js.js?v=<?php echo time(); ?>"></script>
</body>

</html>