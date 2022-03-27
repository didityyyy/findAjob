<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/DR/view/layout/header.php"; ?>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/DR/src/controllers/front/contactsController.php'; ?>

<div class="contacts height-bg flex-x">
    <div class="contact-us flex-between-y">
        <h4>Свържете с нас</h4>
        <h5>Задайте свободно вашия въпрос!</h5>
        <form method="POST" class="flex-y">

            <?php include $_SERVER['DOCUMENT_ROOT'] . "/DR/src/messages/error.php"; ?>
            <?php include $_SERVER['DOCUMENT_ROOT'] . "/DR/src/messages/success.php"; ?>

            <input type="text" name="contact-name" id="contact-name" placeholder="Вашето име...">
            <input type="email" name="contact-email" id="contact-email" placeholder="Вашият имейл...">
            <textarea id="contact-question" name="contact-question" placeholder="Вашият въпрос..."></textarea>
            <button type="submit" name="contact-send" id="contact-send">Изпрати</button>
        </form>
    </div>
    <div class="contact-details flex-y">
        <h4>Как да ни откриете</h4>
        <div class="socials">
            <div><i class="fas fa-map-marker-alt"></i> гр.Варна ул.Перуника</div>
            <div><i class="fas fa-envelope"></i> findajob@gmail.com</div>
            <div><i class="fab fa-skype"></i> findajob21</div>
            <div><i class="fas fa-phone-alt"></i> +359 988 350 579</div>
        </div>
    </div>
</div>




<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/DR/view/layout/footer.php"; ?>