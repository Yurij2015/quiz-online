<?php
if ($_POST) {
    $title = trim(htmlspecialchars($_POST['title']));
    $summary = trim(htmlspecialchars($_POST['summary'])) ?: null;
    $content = htmlspecialchars($_POST['content']) ?: null;
    $tutor_id = $_POST['tutor_id'] ?: null;
    $category_id = $_POST['category_id'] ?: null;
    $id = $_POST['id'] ?: null;
    if (!empty($title)) {
        include_once("lib/RedBeanPHP5_4_2/rb.php");
        include_once("Dbsettings.php");
        include_once("model/DB.php");
        include_once("controller/Lesson.php");
        new DB($host, $port, $db_name, $user, $password);
        $update = new Test();
        $update->update($title, $summary, $content, $tutor_id, $category_id, $id);
        header('location: lessons.php?msg=Запись успешно обновлена!');
    }
}
?>
<?php
session_start();
$title = "Редактировать урок";
$msg = '';
include_once('includes/header.php');
?>
    <div class="banner padd mt-5">
        <div class="container">
            <img class="img-responsive" src="" alt=""/>
            <h2 class="white"><?= $title ?></h2>
            <ol class="breadcrumb">
                <li class="mr-1"><a href="index.php">Главная</a></li>
                <li class="active"><?= $title ?></li>
            </ol>
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="inner-page padd">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <?php
                    include_once("lib/RedBeanPHP5_4_2/rb.php");
                    include_once("Dbsettings.php");
                    include_once("model/DB.php");
                    include_once("controller/Lesson.php");
                    include_once("controller/Subject.php");
                    include_once("controller/Tutor.php");
                    include_once("controller/Remember.php");
                    include_once("controller/Word.php");
                    include_once("controller/Translate.php");

                    new DB($host, $port, $db_name, $user, $password);
                    ?>
                    <?php
                    $id = $_GET['id'];
                    $learnbooks = new Test();
                    foreach ($learnbooks->getOne($id) as $lesson) {
                        ?>
                        <form method="post">
                            <div class="form-group">
                                <label for="title">Название учебного материала</label>
                                <input type="text" class="form-control" id="title"
                                       placeholder="Название учебного материала"
                                       name="title"
                                       value="<?= $lesson['title'] ?>">
                                <input name="id" hidden value="<?= $lesson['id'] ?>">
                            </div>

                            <div class="form-group">
                                <label for="summary">Описание</label>
                                <input type="text" class="form-control" id="summary" placeholder="Описание"
                                       name="summary"
                                       value="<?= $lesson['summary'] ?>">
                            </div>

                            <div class="form-group">
                                <label for="content">Текст учебного материала</label>
                                <textarea type="text" class="form-control" id="content"
                                          name="content"><?= htmlspecialchars_decode($lesson['content']) ?></textarea>
                            </div>
                            <div class="col-md-12 border border-success pb-5" style="min-height: 100px">
                                <h5 class="mt-2 font-weight-bold">Слова</h5>
                                <p><?= $lesson['word_description'] ?></p>
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
                                <a href="add-word-to-lesson.php?lesson-id=<?= $id ?>"
                                   class="btn btn-outline-warning btn-sm mb-5 float-right">Добавить | Редактировать</a>

                            </div>
                            <div class="col-md-12 border border-success mt-4 pb-5" style="min-height: 100px">
                                <h5 class="mt-2 font-weight-bold">Задания</h5>
                                <p><?= $lesson['translate_description'] ?></p>
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th>Урок</th>
                                        <th>Фраза</th>
                                        <th>Перевод</th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $words = new Translate();
                                    foreach ($words->getWords($id) as $word) {
                                        $idword = $word['id'];
                                        echo "<tr>
                                        <td>" . $word['lesson_id'] . "</td>
                                        <td>" . $word['text_english'] . "</td>  
                                        <td>" . $word['text_russian'] . "</td>           
                                        </tr>";
                                    }
                                    ?>
                                    </tbody>
                                </table>

                                <a href="add-task-translate.php?lesson-id=<?= $id ?>"
                                   class="btn btn-outline-warning  btn-sm mb-5 float-right">Добавить | Редактировать</a>

                            </div>
                            <div class="col-md-12 border border-success mt-4 pb-5 mb-4" style="min-height: 100px">
                                <h5 class="mt-2 font-weight-bold">Запомни</h5>
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
                                <p><?= $lesson['remember_description'] ?></p>
                                <a href="add-task-remember.php?lesson-id=<?= $id ?>"
                                   class="btn btn-outline-warning  btn-sm mb-5 float-right">Добавить | Редактировать</a>

                            </div>
                            <div class="form-group">
                                <label for="tutor_id">Автор (преподаватель)</label>
                                <select type="text" class="form-control" name="tutor_id"
                                        id="tutor_id">
                                    <?php
                                    $tutors = new Tutor();
                                    ?>
                                    <option value="<?= ($lesson['tutor_id']) ?>" selected="selected">
                                        <?= $tutors->getTutor($lesson['tutor_id']) ?>
                                    </option>
                                    <?php
                                    foreach ($tutors->get() as $tutor) { ?>
                                        <option value="<?php echo $tutor['id']; ?>">
                                            <?php echo $tutor['first_name'] . " " . $tutor['last_name']; ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="category_id">Категория</label>
                                <select type="text" class="form-control" name="category_id"
                                        id="category_id">
                                    <?php
                                    $categories = new Subject();
                                    ?>
                                    <option value="<?= $lesson['category_id'] ?>" selected="selected">
                                        <?= $categories->getCategory($lesson['category_id']) ?>
                                    </option>
                                    <?php
                                    foreach ($categories->get() as $category) { ?>
                                        <option value="<?php echo $category['id']; ?>">
                                            <?php echo $category['name']; ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-warning mb-5">Обновить</button>
                            <a href="view-lesson.php?id=<?= $id ?>" class="btn btn-warning mb-5">Отмена</a>
                        </form>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div><!-- / Inner Page Content End -->
<?php include_once('includes/footer.php'); ?>