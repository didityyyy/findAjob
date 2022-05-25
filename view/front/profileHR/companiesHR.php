<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/DR/view/layout/header.php"; ?>
<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/DR/src/controllers/front/profileHR/companiesHRController.php"; ?>

<?php if (isset($_SESSION['username']) && $_SESSION['role'] == 1) : ?>
    <div class="form my20 listing">
        <form id="searchform">

            <h2 class="mb10">Фирми</h2>

            <div class="form-group">
                <input type="search" class="input searchbox" name="searchbox" placeholder="Потърси фирма">
                <i class="fa-solid fa-magnifying-glass" id="icon-submit"></i>
            </div>
        </form>
        <form>
            <table class="table">
                <tr>
                    <th>Име на фирма</th>
                    <th>БУЛСТАТ</th>
                    <th></th>
                </tr>
                <?php for ($n = 0; $n < count($rowHR); $n += 1) : ?>
                    <tr id=<?php echo $rowHR[$n]['username']; ?>>
                        <td><?php echo $rowHR[$n]['companyname']; ?></td>
                        <td><?php echo $rowHR[$n]['companyid']; ?></td>
                        <td style="text-align: center;">
                            <a href="/DR/view/front/profileHR/detailsCompaniesHR.php?id=<?php echo $rowHR[$n]['companyid']; ?>" class="btn" style="color:white;">Преглед</a>
                        </td>
                    </tr>
                <?php endfor; ?>
            </table>
        </form>

    </div>


<?php else : header('location: /DR/view/front/home.php'); ?>
<?php endif; ?>

<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/DR/view/layout/footer.php"; ?>