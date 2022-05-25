<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/DR/view/layout/header.php"; ?>
<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/DR/src/controllers/admin/HRsController.php"; ?>

<?php if (isset($_SESSION['username']) && $_SESSION['role'] == 2) : ?>
    <div class="form my20">
        <form id="searchform">

            <h2 class="mb10">Cлужители</h2>

            <div class="form-group">
                <input type="search" class="input searchbox" name="searchbox" placeholder="Потърси служител">
                <i class="fa-solid fa-magnifying-glass" id="icon-submit"></i>
            </div>
        </form>
        <form class="">
            <table class="table">
                <tr>
                    <th>Име</th>
                    <th>Фамилия</th>
                    <th>Потребителско име</th>
                    <th></th>
                </tr>
                <?php for ($n = 0; $n < count($rowHR); $n += 1) : ?>
                    <tr id=<?php echo $rowHR[$n]['username']; ?>>
                        <td><?php echo $rowHR[$n]['firstname']; ?></td>
                        <td><?php echo $rowHR[$n]['lastname']; ?></td>
                        <td><?php echo $rowHR[$n]['username']; ?></td>
                        <td style="text-align: center;">
                            <button class="btn-red input removeHR" style="margin: 0;width: 40px;" type="submit"><i class="fa-solid fa-trash-can"></i></button>
                        </td>
                    </tr>
                <?php endfor; ?>
            </table>
        </form>

    </div>


<?php else : header('location: /DR/view/front/home.php'); ?>
<?php endif; ?>

<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/DR/view/layout/footer.php"; ?>