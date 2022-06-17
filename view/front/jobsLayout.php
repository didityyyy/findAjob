<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/DR/src/controllers/front/profileUser/jobsController.php"; ?>

<form method="POST">
    <div class="flex-between-x flex-wrap">
        <div class="form-group">
            <input type="search" class="input searchbox" id="searchbox" name="searchbox" placeholder="Потърси обява">
        </div>
        <div class="form-group">
            <select id="jobcategory" class="input" style="width: 220px;">
                <option selected disabled>Изберете Категория</option>
                <?php for ($n = 0; $n < count($rowCategory); $n += 1) : ?>
                    <option value="<?php echo $rowCategory[$n]['id']; ?>"><?php echo $rowCategory[$n]['title']; ?></option>
                <?php endfor; ?>
            </select>
        </div>
        <div class="form-group">
            <select id="jobcity" class="input" style="width: 220px;">
                <option selected disabled>Изберете Град</option>
                <?php for ($n = 0; $n < count($rowCity); $n += 1) : ?>
                    <option value="<?php echo $rowCity[$n]['id']; ?>"><?php echo $rowCity[$n]['title']; ?></option>
                <?php endfor; ?>
            </select>
        </div>
        <div class="form-group">
            <button type="submit" class="input btn" id="clearSearch">Изчисти</button>
        </div>
    </div>
</form>

<hr>

<div class="no-data" id="not-found" style="display: none;"></div>
<div id="contentJobs">
</div>

<div><?php include_once $_SERVER['DOCUMENT_ROOT'] . "/DR/src/database/pagination.php"; ?></div>

<script src="/DR/assets/js/searchjob.js"></script>