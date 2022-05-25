<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/DR/view/layout/header.php"; ?>
<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/DR/src/controllers/front/profileCompany/addJobController.php"; ?>

<?php if (isset($_SESSION['username']) && $_SESSION['role'] == 3) : ?>

    <form method="post" class="form my20">

        <h2 class="mb10">Добавяне на обява</h2>

        <?php include $_SERVER['DOCUMENT_ROOT'] . "/DR/src/messages/error.php"; ?>
        <?php include $_SERVER['DOCUMENT_ROOT'] . "/DR/src/messages/success.php"; ?>

        <div class="form-group">
            <label for="jobtitle">Заглавие на обява</label>
            <input type="text" class="input" name="jobtitle">
        </div>
        <div class="form-group">
            <label for="jobpayment">Заплата</label>
            <input type="text" class="input" name="jobpayment">
        </div>
        <div class="form-group">
            <label for="jobcategory">Категория</label>
            <select name="jobcategory" class="input">
                <option selected disabled>Изберете Категория</option>
                <?php for ($n = 0; $n < count($rowCategory); $n += 1) : ?>
                    <option class="" value="<?php echo $rowCategory[$n]['id']; ?>"><?php echo $rowCategory[$n]['title']; ?></option>
                <?php endfor; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="jobcity">Град</label>
            <select name="jobcity" class="input">
                <option selected disabled>Изберете Град</option>
                <?php for ($n = 0; $n < count($rowCity); $n += 1) : ?>
                    <option class="" value="<?php echo $rowCity[$n]['id']; ?>"><?php echo $rowCity[$n]['title']; ?></option>
                <?php endfor; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="jobdescription">Описание</label>
            <textarea name="jobdescription" rows="5" class="input" style="resize:vertical;max-height:400px;"></textarea>
        </div>

        <div class="form-group">
            <input type="submit" class="input btn" name="add-job-btn" value="Добави обява">
        </div>

    </form>

<?php else : header('location: /DR/view/front/home.php'); ?>
<?php endif; ?>

<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/DR/view/layout/footer.php"; ?>