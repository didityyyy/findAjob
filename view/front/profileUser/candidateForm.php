<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/DR/view/layout/header.php"; ?>
<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/DR/src/controllers/front/profileUser/candidateFormController.php"; ?>

<?php if (isset($_SESSION['username']) && $_SESSION['role'] == 4) : ?>

    <form method="post" class="form my20">

        <h2 class="mb10">Кандидатстване</h2>

        <?php include $_SERVER['DOCUMENT_ROOT'] . "/DR/src/messages/error.php"; ?>
        <?php include $_SERVER['DOCUMENT_ROOT'] . "/DR/src/messages/success.php"; ?>


        <div class="form-group">
            <label for="firstname">Име</label>
            <input type="text" class="input" name="firstname">
        </div>
        <div class="form-group">
            <label for="lastname">Фамилия</label>
            <input type="text" class="input" name="lastname">
        </div>
        <div class="form-group">
            <label for="address">Адрес</label>
            <input type="text" class="input" name="address">
        </div>
        <div class="form-group">
            <label for="city">Град</label>
            <select name="city" class="input">
                <option selected disabled>Изберете Град</option>
                <?php for ($n = 0; $n < count($rowCity); $n += 1) : ?>
                    <option class="" value="<?php echo $rowCity[$n]['id']; ?>"><?php echo $rowCity[$n]['title']; ?></option>
                <?php endfor; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="zipcode">Пощенски код</label>
            <input type="text" class="input" name="zipcode">
        </div>
        <div class="form-group">
            <label for="phone">Телефон за връзка</label>
            <input type="text" class="input" name="phone">
        </div>
        <div class="form-group">
            <label for="dateofbirth">Дата на раждане</label>
            <input type="date" class="input" name="dateofbirth" max="<?php echo date("Y-m-d"); ?>">
        </div>
        <div class="form-group">
            <label for="workdescription">Трудов стаж</label>
            <textarea name="workdescription" rows="5" class="input" style="resize:vertical;max-height:400px;" placeholder="Дата от/до ; 
Име и адрес на работодателя ; 
Вид на дейността ; 
Заемана длъжност ; 
Основни дейности и отговорности"></textarea>
        </div>
        <div class="form-group">
            <label for="educationdescription">Образование и обучение</label>
            <textarea name="educationdescription" rows="5" class="input" style="resize:vertical;max-height:400px;" placeholder="Дата от/до ; 
Име и вид на обучаващата или образователна организация ; 
Наименование на придобитата квалификация"></textarea>
        </div>
        <div class="form-group">
            <label for="personaldescription">Лични умения</label>
            <textarea name="personaldescription" rows="5" class="input" style="resize:vertical;max-height:400px;" placeholder="Майчин език ; 
Други езици ; 
Социални умения , организационни умения , технически умения , други ;
Свидетелство за управление на МПС  "></textarea>
        </div>
        <div>
            <input type="checkbox" name="savecandidate" class="mr5">
            <label for="savecandidate">Запази кандидатура за следващи кандидатствания</label>
        </div>
        <?php if(count($rowCandidate) > 0) : ?>
        <div class="form-group">
            <hr>
            <select name="savedcandidates" class="input">
                <option selected disabled>Изберете запазена Кандидатура</option>
                <?php for ($n = 0; $n < count($rowCandidate); $n += 1) : ?>
                    <option class="" value="<?php echo $rowCandidate[$n]['id_c']; ?>"><?php echo $rowCandidate[$n][1] . " " . $rowCandidate[$n][2] . " " . $rowCandidate[$n]['id_c'];?></option>
                <?php endfor; ?>
            </select>
            <hr>
        </div>
        <?php endif; ?>

        <div class="form-group">
            <input type="submit" class="input btn" name="candidate-btn" value="Кандидатствай">
        </div>

    </form>

<?php else : header('location: /DR/view/front/home.php'); ?>
<?php endif; ?>

<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/DR/view/layout/footer.php"; ?>