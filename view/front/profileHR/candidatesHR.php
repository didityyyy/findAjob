<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/DR/view/layout/header.php"; ?>
<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/DR/src/controllers/front/profileHR/candidatesHRController.php"; ?>

<?php if (isset($_SESSION['username']) && $_SESSION['role'] == 1) : ?>
    <div class="flex-start-xx w-80" id="removeClassHR">
        <ul id="status-candidates" class="candidates">
            <li id="all">Всички</li>
            <li id="onhold">В изчакване</li>
            <li id="approvedinterview">Одобрени за интервю</li>
            <li id="interviewed">Интервюирани</li>
            <li id="approved">Одобрени</li>
            <li id="rejected">Отхвърлени</li>
        </ul>

        <div class="list-candidates">
            <div class="all">
                <h2 class="mb10">Всички кандидатури</h2>

                <div class="form-group">
                    <input type="text" class="input searchbox" id="searchcandidateHR" placeholder="Потърси кандидатура">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </div>

                <div id="listCandidates2"></div>
                <div id="listCandidates">
                    <?php for ($n = 0; $n < count($allresults); $n++) : ?>
                        <div class="flex-between-x list-jobs">
                            <a href="/DR/view/front/profileHR/detailsCandidateHR.php?id=<?php echo $allresults[$n]['id_c']; ?>">
                                <div>
                                    <h3><?php echo $allresults[$n]['firstname'] . " " . $allresults[$n]['lastname']; ?></h3>
                                    <p>Кандидатствал по обява : <?php echo $allresults[$n]['title']; ?></p>
                                </div>
                            </a>
                            <div>
                                <p>Статус: <?php echo $allresults[$n]['status']; ?></p>
                            </div>
                        </div>
                    <?php endfor; ?>
                    <?php if (!empty($allresults2)) : ?>
                        <?php for ($n = 0; $n < count($allresults2); $n++) : ?>
                            <div class="flex-between-x list-jobs">
                                <a href="/DR/view/front/profileHR/detailsCandidateHR.php?id_usc=<?php echo $allresults2[$n]['id_usc']; ?>">
                                    <div>
                                        <h3><?php echo $allresults2[$n]['firstname'] . " " . $allresults2[$n]['lastname']; ?></h3>
                                        <p>Кандидатствал по обява : <?php echo $allresults2[$n]['title']; ?></p>
                                    </div>
                                </a>
                                <div>
                                    <p>Статус: <?php echo $allresults2[$n]['status']; ?></p>
                                </div>
                            </div>
                        <?php endfor; ?>
                    <?php endif; ?>
                </div>
            </div>
            <div class="onhold" style="display: none;">
                <h2 class="mb10">Кандидатури в Изчакване</h2>
                <?php if (count($results1) > 0 || count($results12) > 0) : ?>
                    <?php for ($n = 0; $n < count($results1); $n++) : ?>
                        <div class="flex-between-x list-jobs">
                            <a href="/DR/view/front/profileHR/detailsCandidateHR.php?id=<?php echo $results1[$n]['id_c']; ?>">
                                <div>
                                    <h3><?php echo $results1[$n]['firstname'] . " " . $results1[$n]['lastname']; ?></h3>
                                    <p>Кандидатствал по обява : <?php echo $results1[$n]['title']; ?></p>
                                </div>
                            </a>
                        </div>
                    <?php endfor; ?>

                    <?php if (!empty($results12)) : ?>
                        <?php for ($n = 0; $n < count($results12); $n++) : ?>
                            <div class="flex-between-x list-jobs">
                                <a href="/DR/view/front/profileHR/detailsCandidateHR.php?id_usc=<?php echo $results12[$n]['id_usc']; ?>">
                                    <div>
                                        <h3><?php echo $results12[$n]['firstname'] . " " . $results12[$n]['lastname']; ?></h3>
                                        <p>Кандидатствал по обява : <?php echo $results12[$n]['title']; ?></p>
                                    </div>
                                </a>
                            </div>
                        <?php endfor; ?>
                    <?php endif; ?>
                <?php else : ?>
                    <p class="no-data">Няма данни</p>
                <?php endif; ?>
            </div>
            <div class="approved" style="display: none;">
                <h2 class="mb10">Одобрени Кандидатури</h2>
                <?php if (count($results5) > 0 || count($results52) > 0) : ?>
                    <?php for ($n = 0; $n < count($results5); $n++) : ?>
                        <div class="flex-between-x list-jobs">
                            <a href="/DR/view/front/profileHR/detailsCandidateHR.php?id=<?php echo $results5[$n]['id_c']; ?>">
                                <div>
                                    <h3><?php echo $results5[$n]['firstname'] . " " . $results5[$n]['lastname']; ?></h3>
                                    <p>Кандидатствал по обява : <?php echo $results5[$n]['title']; ?></p>
                                </div>
                            </a>
                        </div>
                    <?php endfor; ?>

                    <?php if (!empty($results52)) : ?>
                        <?php for ($n = 0; $n < count($results52); $n++) : ?>
                            <div class="flex-between-x list-jobs">
                                <a href="/DR/view/front/profileHR/detailsCandidateHR.php?id_usc=<?php echo $results52[$n]['id_usc']; ?>">
                                    <div>
                                        <h3><?php echo $results52[$n]['firstname'] . " " . $results52[$n]['lastname']; ?></h3>
                                        <p>Кандидатствал по обява : <?php echo $results52[$n]['title']; ?></p>
                                    </div>
                                </a>
                            </div>
                        <?php endfor; ?>
                    <?php endif; ?>
                <?php else : ?>
                    <p class="no-data">Няма данни</p>
                <?php endif; ?>
            </div>
            <div class="approvedinterview" style="display: none;">
                <h2 class="mb10">Одобрени за интервю Кандидатури </h2>
                <?php if (count($results2) > 0 || count($results22) > 0) : ?>
                    <?php for ($n = 0; $n < count($results2); $n++) : ?>
                        <div class="flex-between-x list-jobs">
                            <a href="/DR/view/front/profileHR/detailsCandidateHR.php?id=<?php echo $results2[$n]['id_c']; ?>">
                                <div>
                                    <h3><?php echo $results2[$n]['firstname'] . " " . $results2[$n]['lastname']; ?></h3>
                                    <p>Кандидатствал по обява : <?php echo $results2[$n]['title']; ?></p>
                                </div>
                            </a>
                        </div>
                    <?php endfor; ?>

                    <?php if (!empty($results22)) : ?>
                        <?php for ($n = 0; $n < count($results22); $n++) : ?>
                            <div class="flex-between-x list-jobs">
                                <a href="/DR/view/front/profileHR/detailsCandidateHR.php?id_usc=<?php echo $results22[$n]['id_usc']; ?>">
                                    <div>
                                        <h3><?php echo $results22[$n]['firstname'] . " " . $results22[$n]['lastname']; ?></h3>
                                        <p>Кандидатствал по обява : <?php echo $results22[$n]['title']; ?></p>
                                    </div>
                                </a>
                            </div>
                        <?php endfor; ?>
                    <?php endif; ?>
                <?php else : ?>
                    <p class="no-data">Няма данни</p>
                <?php endif; ?>
            </div>
            <div class="interviewed" style="display: none;">
                <h2 class="mb10">Интервюирани Кандидатури </h2>
                <?php if (count($results3) > 0 || count($results32) > 0) : ?>
                    <?php for ($n = 0; $n < count($results3); $n++) : ?>
                        <div class="flex-between-x list-jobs">
                            <a href="/DR/view/front/profileHR/detailsCandidateHR.php?id=<?php echo $results3[$n]['id_c']; ?>">
                                <div>
                                    <h3><?php echo $results3[$n]['firstname'] . " " . $results3[$n]['lastname']; ?></h3>
                                    <p>Кандидатствал по обява : <?php echo $results3[$n]['title']; ?></p>
                                </div>
                            </a>
                        </div>
                    <?php endfor; ?>

                    <?php if (!empty($results32)) : ?>
                        <?php for ($n = 0; $n < count($results32); $n++) : ?>
                            <div class="flex-between-x list-jobs">
                                <a href="/DR/view/front/profileHR/detailsCandidateHR.php?id_usc=<?php echo $results32[$n]['id_usc']; ?>">
                                    <div>
                                        <h3><?php echo $results32[$n]['firstname'] . " " . $results32[$n]['lastname']; ?></h3>
                                        <p>Кандидатствал по обява : <?php echo $results32[$n]['title']; ?></p>
                                    </div>
                                </a>
                            </div>
                        <?php endfor; ?>
                    <?php endif; ?>
                <?php else : ?>
                    <p class="no-data">Няма данни</p>
                <?php endif; ?>
            </div>
            <div class="rejected" style="display: none;">
                <h2 class="mb10">Отхвърлени Кандидатури </h2>
                <?php if (count($results4) > 0 || count($results42) > 0) : ?>
                    <?php for ($n = 0; $n < count($results4); $n++) : ?>
                        <div class="flex-between-x list-jobs">
                            <a href="/DR/view/front/profileHR/detailsCandidateHR.php?id=<?php echo $results4[$n]['id_c']; ?>">
                                <div>
                                    <h3><?php echo $results4[$n]['firstname'] . " " . $results4[$n]['lastname']; ?></h3>
                                    <p>Кандидатствал по обява : <?php echo $results4[$n]['title']; ?></p>
                                </div>
                            </a>
                        </div>
                    <?php endfor; ?>

                    <?php if (!empty($results42)) : ?>
                        <?php for ($n = 0; $n < count($results42); $n++) : ?>
                            <div class="flex-between-x list-jobs">
                                <a href="/DR/view/front/profileHR/detailsCandidateHR.php?id_usc=<?php echo $results42[$n]['id_usc']; ?>">
                                    <div>
                                        <h3><?php echo $results42[$n]['firstname'] . " " . $results42[$n]['lastname']; ?></h3>
                                        <p>Кандидатствал по обява : <?php echo $results42[$n]['title']; ?></p>
                                    </div>
                                </a>
                            </div>
                        <?php endfor; ?>
                    <?php endif; ?>
                <?php else : ?>
                    <p class="no-data">Няма данни</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php else : header('location: /DR/view/front/home.php'); ?>
<?php endif; ?>

<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/DR/view/layout/footer.php"; ?>