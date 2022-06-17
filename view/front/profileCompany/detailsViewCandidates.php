<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/DR/view/layout/header.php"; ?>
<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/DR/src/controllers/front/profileCompany/viewCandidatesController.php"; ?>

<?php if (isset($_SESSION['username']) && $_SESSION['role'] == 3) : ?>

    <div class="list-company my20">
        <h2 class="mb10">Кандидатура по обява: <?php echo $rowCand[0]['titlejob'] ?></h2>

        <form style="float:right;">
            <div class="form-group">
                <select id="status" class="input" style="width: 220px;">
                    <option selected disabled>Изберете Статус</option>
                    <?php for ($n = 0; $n < count($rowStatus); $n += 1) : ?>
                        <option value="<?php echo $rowStatus[$n]['id']; ?>"><?php echo $rowStatus[$n]['title']; ?></option>
                    <?php endfor; ?>
                </select>
            </div>
        </form>

        <table id="cands2" class="table"></table>
        <table id="cands" class="table">
            <tr>
                <th>Име и Фамилия</th>
                <th>Имейл</th>
                <th>Статус</th>
            </tr>
            <?php for ($n = 0; $n < count($rowCand); $n++) : ?>
                <tr>
                    <td>
                        <a href="/DR/view/front/profileCompany/detailsCandidatesPerson.php?id-c=<?php echo $rowCand[$n]['id_c']; ?>"><?php echo $rowCand[$n]['firstname'] . " " . $rowCand[$n]['lastname']; ?></a>
                    </td>
                    <td><?php echo $rowCand[$n]['email']; ?></td>
                    <td><?php echo $rowCand[$n]['status']; ?></td>
                </tr>
            <?php endfor; ?>
            <?php for ($n = 0; $n < count($rowCand2); $n++) : ?>
                <tr>
                    <td>
                        <a href="/DR/view/front/profileCompany/detailsCandidatesPerson.php?id-c=<?php echo $rowCand2[$n]['id_c']; ?>"><?php echo $rowCand2[$n]['firstname'] . " " . $rowCand2[$n]['lastname']; ?></a>
                    </td>
                    <td><?php echo $rowCand2[$n]['email']; ?></td>
                    <td><?php echo $rowCand2[$n]['status']; ?></td>
                </tr>
            <?php endfor; ?>
        </table>

    </div>
<?php else : header('location: /DR/view/front/home.php'); ?>
<?php endif; ?>

<script src="/DR/assets/js/viewCandidates.js?v=<?php echo time(); ?>"></script>

<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/DR/view/layout/footer.php"; ?>