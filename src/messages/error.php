<?php if (count($errors) > 0) : ?>
    <div class="alert alert-danger" style="margin:auto;">
        <?php foreach ($errors as $error) : ?>
            <li><?php echo $error; ?> </li>
        <?php endforeach; ?>
    </div>
<?php endif; ?>