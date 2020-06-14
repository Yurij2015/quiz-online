<?php
session_start();
$title = "Просмотр урока";
$msg = '';
include_once('../includes/header.php');
?>
    <div class="banner padd mt-5">
        <div class="container">
            <img class="img-responsive" src="" alt=""/>
            <h2 class="white mb-3"><?= $title ?></h2>
            <ol class="breadcrumb">
                <li class="mr-1"><a href="index.php">Главная</a></li>
                <li class="active"><?= $title ?></li>
            </ol>
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="inner-page padd">
        <div class="container mb-5">
            <div class="row">
                <div class="col-md-12">
                    <?php
                    include_once("../lib/RedBeanPHP5_4_2/rb.php");
                    include_once("../Dbsettings.php");
                    include_once("../model/DB.php");
                    include_once("../controller/Lesson.php");
                    include_once("../controller/Tutor.php");
                    include_once("../controller/Subject.php");
                    include_once("../controller/Word.php");
                    include_once("../controller/Remember.php");
                    include_once("../controller/Translate.php");
                    new DB($host, $port, $db_name, $user, $password);
                    ?>
                    <?php
                    $id = $_GET['id'];
                    $learnbooks = new Test();
                    foreach ($learnbooks->getOne($id) as $learnbook) {
                        ?>
                        <p class="lead"><?= $learnbook['title'] ?></p>
                        <p><?= $learnbook['summary'] ?></p>
                        <p><?= htmlspecialchars_decode($learnbook['content']) ?></p>
                        <?php $tutor = new Tutor(); ?>
                        <p><?= $tutor->getTutor($learnbook['tutor_id']) ?></p>
                        <?php $category = new Subject(); ?>
                        <p><?= $category->getCategory($learnbook['category_id']) ?></p>
                        <div class="col-md-12 border border-success pb-5" style="min-height: 100px">
                            <h5 class="mt-2 font-weight-bold">Слова</h5>
                            <p><?= $learnbook['word_description'] ?></p>
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>Слово</th>
                                    <th>Аудио</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>

                                <?php
                                $words = new Word();
                                foreach ($words->getWords($id) as $word) {
                                    echo "<td>" . $word['word'] . "</td>";
                                    echo "<td><audio id='audio" . $word['id'] . " ' controls><source src='/" . $word['audio'] . "'></audio></td>";
                                    echo "<td><img id='img" . $word['id'] . " ' width='200px' alt=' " . $word['word'] . " ' src='/" . $word['image'] . "'></td></tr>";
                                    echo "<script>document.getElementById('img" . $word['id'] . " ').addEventListener('click', function() {
                                          document.getElementById('audio" . $word['id'] . " ').play();
                                        })</script>";
                                }
                                ?>

                                </tbody>
                            </table>

                        </div>
                        <div class="col-md-12 border border-success mt-4 pb-5" style="min-height: 100px">
                            <h5 class="mt-2 font-weight-bold">Задания</h5>
                            <p><?= $learnbook['translate_description'] ?></p>
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>Фраза</th>
                                    <th>Перевод</th>
                                    <th>Выберите правильный вариант</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $words = new Translate();
                                foreach ($words->getWords($id) as $word) {
                                    $idword = $word['id'];
                                    ?>
                                    <tr>
                                        <td><?= $word['text_english'] ?></td>
                                        <td><?= $word['text_russian'] ?></td>
                                        <td>
                                            <?php $random = rand(77, 99); ?>

                                            <form method="post" id="checkform<?= $random ?>">
                                                <div class="form-group">
                                                    <!--                                                    <label for="text_english"></label>-->
                                                    <input hidden name="taskwordid" value="<?= $idword; ?>">
                                                    <input hidden name="lessonid" value="<?= $_GET['id']; ?>">

                                                    <input hidden name="username" value="<?= $_SESSION['username']; ?>">
                                                    <input hidden name="text_russian"
                                                           value="<?= $word['text_russian'] ?>">
                                                    <select class="form-control mt-0" name="text_english"
                                                            id="result">
                                                        <?php
                                                        $words = new Translate();
                                                        foreach ($words->getWords($id) as $word) {
                                                            ?>
                                                            <option value='<?= $word['text_english'] ?>'><?= $word['text_english'] ?> </option>
                                                            <?php
                                                        }
                                                        ?>
                                                    </select>
                                                    <div class="mt-1">
                                                        <p class="btn btn-warning btn-sm disabled"
                                                           id="result<?= $random ?>">
                                                            Результат</p>

                                                        <p class="btn btn-primary btn-sm float-right" id="check"
                                                           onclick="send<?= $random ?>()">
                                                            Проверить</p>
                                                    </div>
                                                    <script>
                                                        //проверяем результат
                                                        function checkAnswer<?=$random?>() {
                                                            let checkanswer;
                                                            if (window.XMLHttpRequest) {
                                                                // code for IE7+, Firefox, Chrome, Opera, Safari
                                                                checkanswer = new XMLHttpRequest();
                                                            } else { // code for IE6, IE5
                                                                checkanswer = new ActiveXObject("Microsoft.XMLHTTP");
                                                            }
                                                            checkanswer.onreadystatechange = function () {
                                                                if (this.readyState === 4 && this.status === 200) {
                                                                    document.getElementById("result<?=$random?>").innerHTML = this.responseText;
                                                                }
                                                            };
                                                            checkanswer.open("GET", "../checkanswer.php", true);
                                                            checkanswer.send();
                                                        }
                                                    </script>

                                                    <script>
                                                        function send<?=$random?>() {
                                                            let msg = $("#checkform<?= $random ?>").serialize();
                                                            $.ajax({
                                                                type: 'POST',
                                                                url: '../checkanswer.php',
                                                                data: msg,
                                                                success: function (data) {
                                                                    if (data){
                                                                        console.log(data);
                                                                        document.getElementById("result<?=$random?>").innerHTML = data;
                                                                    } else {
                                                                        console.log("ответ не верный");
                                                                        document.getElementById("result<?=$random?>").innerHTML = "ответ не верный";
                                                                    }

                                                                }
                                                            });
                                                        }
                                                    </script>

                                                </div>
                                            </form>
                                        </td>
                                    </tr>
                                    <?php
                                }
                                ?>
                                </tbody>
                            </table>


                        </div>
                        <div class="col-md-12 border border-success mt-4 pb-5 mb-4" style="min-height: 100px">
                            <h5 class="mt-2 font-weight-bold">Запомни</h5>
                            <p><?= $learnbook['remember_description'] ?></p>
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>Слово</th>
                                    <th>Аудио</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $rwords = new Remember();
                                foreach ($rwords->getWords($id) as $rword) {
                                    echo "<td id='p" . $rword['id'] . " '>" . $rword['word'] . "</td>";
                                    echo "<td><audio id='raudio" . $rword['id'] . " ' controls><source src='/" . $rword['audio'] . "'></audio></td>";
                                    echo "</tr>";
                                    echo "<script>document.getElementById('p" . $rword['id'] . " ').addEventListener('click', function() {
                                          document.getElementById('raudio" . $rword['id'] . " ').play();
                                        })</script>";
                                }
                                ?>

                                </tbody>
                            </table>

                        </div>
                        <?php
                    }
                    ?>
                    <a href="/personal-area/view-lesson.php?id=<?=$_GET['id'] - 1?>" class="btn btn-warning">Предыдущий урок</a>
                    <a href="/personal-area/view-lesson.php?id=<?=$_GET['id'] + 1?>" class="btn btn-warning">Следующий урок</a>

                    <a href="#" class="btn btn-warning float-right">Завершить урок</a>
                </div>
            </div>
        </div>
    </div><!-- / Inner Page Content End -->
<?php include_once('../includes/footer.php'); ?>