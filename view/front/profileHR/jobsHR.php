<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/DR/view/layout/header.php"; ?>
<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/DR/src/controllers/front/profileHR/jobsHRController.php"; ?>

<?php if (isset($_SESSION['username']) && $_SESSION['role'] == 1) : ?>

    <div class="listing tabs w-80">
        <h2 class="mb10">Обяви</h2>
        <div class="signup-toggle">
            <button class="tab-toggle active" data-id="disapproved-jobs">Неодобрени обяви</button>
            <button class="tab-toggle" data-id="approved-jobs">Одобрени обяви</button>
        </div>

        <div class="signup-content">
            <div id="disapproved-jobs" class="content active">
                <?php for ($n = 0; $n < count($rowDisapproved); $n += 1) : ?>
                    <div class="flex-between-x list-jobs">
                        <div>
                            <a href="/DR/view/front/profileHR/detailsJobsHR.php?id=<?php echo $rowDisapproved[$n]['id']; ?>">
                                <h3><?php echo $rowDisapproved[$n]['title']; ?></h3>
                                <p><?php echo $rowDisapproved[$n]['City']; ?>; <?php echo $rowDisapproved[$n]['payment']; ?> лв</p>
                            </a>
                        </div>
                        <div>
                            <a href="/DR/view/front/profileHR/detailsCompaniesHR.php?id=<?php echo $rowDisapproved[$n]['companyid']; ?>">
                                <p><?php echo $rowDisapproved[$n]['companyname']; ?></p>
                            </a>
                        </div>
                    </div>
                <?php endfor; ?>
            </div>
            <div id="approved-jobs" class="content">
                <div class="form-group">
                    <input type="text" class="input searchbox" id="searchapprovedjob" placeholder="Потърси фирма">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </div>

                <div id="approved-jobs2"></div>
                <div id="approved-jobs1">
                    <?php for ($n = 0; $n < count($rowApproved); $n += 1) : ?>
                        <div class="flex-between-x list-jobs">
                            <div>
                                <a href="/DR/view/front/profileHR/detailsJobsHR.php?id=<?php echo $rowApproved[$n]['id']; ?>">
                                    <h3><?php echo $rowApproved[$n]['title']; ?></h3>
                                    <p><?php echo $rowApproved[$n]['City']; ?>; <?php echo $rowApproved[$n]['payment']; ?> лв</p>
                                </a>
                            </div>
                            <div>
                                <a href="/DR/view/front/profileHR/detailsCompaniesHR.php?id=<?php echo $rowApproved[$n]['companyid']; ?>">
                                    <p><?php echo $rowApproved[$n]['companyname']; ?></p>
                                </a>
                            </div>
                        </div>
                    <?php endfor; ?>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="/DR/assets/js/hr.js?v=<?php echo time(); ?>"></script>
<?php else : header('location: /DR/view/front/home.php'); ?>
<?php endif; ?>

<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/DR/view/layout/footer.php"; ?>