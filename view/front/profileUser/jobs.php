<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/DR/view/layout/header.php"; ?>
<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/DR/src/controllers/front/profileUser/jobsController.php"; ?>

<?php if (isset($_SESSION['username']) && $_SESSION['role'] == 4) : ?>
    <div class="w-80" style="min-height: 65vh;">
        <form method="POST">
            <div class="flex-between-x">
                <div class="form-group">
                    <input type="search" class="input searchbox" id="search_job" name="searchbox" placeholder="Потърси обява">
                </div>
                <div class="form-group">
                    <select name="jobcategory" class="input" style="width: 220px;">
                        <option selected disabled>Изберете Категория</option>
                        <?php for ($n = 0; $n < count($rowCategory); $n += 1) : ?>
                            <option value="<?php echo $rowCategory[$n]['id']; ?>"><?php echo $rowCategory[$n]['title']; ?></option>
                        <?php endfor; ?>
                    </select>
                </div>
                <div class="form-group">
                    <select name="jobcity" class="input" style="width: 220px;">
                        <option selected disabled>Изберете Град</option>
                        <?php for ($n = 0; $n < count($rowCity); $n += 1) : ?>
                            <option value="<?php echo $rowCity[$n]['id']; ?>"><?php echo $rowCity[$n]['title']; ?></option>
                        <?php endfor; ?>
                    </select>
                </div>
                <div class="form-group">
                    <button type="submit" class="input btn" id="searchJob" name="searchJob">Търси</button>
                </div>
            </div>
        </form>

        <hr>

<div id="contentJobs">
        <?php for ($n = 0; $n < count($row); $n += 1) : ?>
            <div class="flex-between-x list-jobs" id="jobs">
                <div>
                    <a href="/DR/view/front/profileHR/detailsJobs.php?id=<?php echo $row[$n]['id']; ?>">
                        <h3><?php echo $row[$n]['title']; ?></h3>
                        <p><?php echo $row[$n]['City']; ?>; <?php echo $row[$n]['payment']; ?> лв</p>
                    </a>
                </div>
                <div>
                    <p><?php echo $row[$n]['companyname']; ?></p>
                    <img src="/DR/assets/images/logos/<?php echo $row[$n]['logo']; ?>" alt="logo" class="logo-company">
                </div>
            </div>
        <?php endfor; ?>
    </div>

        <div><?php include_once $_SERVER['DOCUMENT_ROOT'] . "/DR/src/database/pagination.php"; ?></div>
    </div>
<?php else : header('location: /DR/view/front/home.php'); ?>
<?php endif; ?>

<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/DR/view/layout/footer.php"; ?>