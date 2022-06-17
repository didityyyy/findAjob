<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/DR/view/layout/header.php"; ?>
<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/DR/src/controllers/front/profileCompany/viewCandidatesController.php"; ?>

<?php if (isset($_SESSION['username']) && $_SESSION['role'] == 3) : ?>

    <div class="w-80 my20">
        <h2 class="mb10">Кандидатури</h2>

        <form method="POST">
            <div class="form-group">
                <select id="jobid" class="input">
                    <option selected disabled>Изберете Обява</option>
                    <?php for ($n = 0; $n < count($rowJob); $n += 1) : ?>
                        <option value="<?php echo $rowJob[$n]['id']; ?>"><?php echo $rowJob[$n]['job']; ?></option>
                    <?php endfor; ?>
                </select>
            </div>
        </form>

        <div id="jobCandidates"></div>
        <div id="jobs-list">
            <?php for ($n = 0; $n < count($rowJob); $n++) : ?>
                    <div class='flex-between-x list-jobs' id='jobs'>
                        <div>
                            <h3><?php echo $rowJob[$n]['job'] ?></h3>
                            <p><?php echo $rowJob[$n]['city'] . " " . $rowJob[$n]['payment'] ?> лв</p>
                        </div>
                        <div>
                            <p>Брой кандидатури: <?php echo $rowJob[$n]['count'] ?></p>
                            <a href="/DR/view/front/profileCompany/detailsViewCandidates.php?id-j=<?php echo $rowJob[$n]['id']; ?>"> <input type="button" class='input btn' style='padding: 3px;' value="Преглед"></a>
                        </div>
                    </div>
            <?php endfor; ?>
        </div>

    </div>

<?php else : header('location: /DR/view/front/home.php'); ?>
<?php endif; ?>

<script src="/DR/assets/js/viewCandidates.js?v=<?php echo time(); ?>"></script>

<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/DR/view/layout/footer.php"; ?>