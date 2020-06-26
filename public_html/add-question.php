<?php
if ($_POST) {
    $title = trim(htmlspecialchars($_POST['title']));
    $summary = trim(htmlspecialchars($_POST['summary'])) ?: null;
    $content = htmlspecialchars($_POST['content']) ?: null;
    $tutor_id = $_POST['tutor_id'] ?: null;
    $category_id = $_POST['category_id'] ?: null;
    if (!empty($title)) {
        include_once("lib/RedBeanPHP5_4_2/rb.php");
        include_once("Dbsettings.php");
        include_once("model/DB.php");
        include_once("controller/Test.php");
        new DB($host, $port, $db_name, $user, $password);
        $create = new Test();
        $create->create($title, $summary, $content, $tutor_id, $category_id);
        
        header('location: lesson.php?msg=Запись успешно добавлена!');
    }
}
?>
<?php
session_start();
$title = "Добавить вопрос";
$msg = '';
include_once('includes/header.php');
?>
    <div class="banner padd">
        <div class="container mt-5 ">
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
                    <form method="post">
                        <div class="form-group">
                            <label for="question">Вопрос</label>
                            <input type="text" class="form-control" id="question" placeholder="Вопрос"
                                   name="question"
                                   value="">
                        </div>
                        <div class="form-group">
                            <label for="answer1">Вариант ответа 1</label>
                            <input type="text" class="form-control" id="answer1" placeholder="Вариант ответа 1"
                                   name="answer1"
                                   value="">
                        </div>
                        <div class="form-group">
                            <label for="answer2">Вариант ответа 2</label>
                            <input type="text" class="form-control" id="answer2" placeholder="Вариант ответа 2"
                                   name="answer2"
                                   value="">
                        </div>
                        <div class="form-group">
                            <label for="answer3">Вариант ответа 3</label>
                            <input type="text" class="form-control" id="answer3" placeholder="Вариант ответа 3"
                                   name="answer3"
                                   value="">
                        </div>
                        <div class="form-group">
                            <label for="answer4">Вариант ответа 4</label>
                            <input type="text" class="form-control" id="answer4" placeholder="Вариант ответа 4"
                                   name="answer4"
                                   value="">
                        </div>
                        <div class="form-group">
                            <label for="right-answer">Верный ответ</label>
                            <select name="role" id="right-answer" class="form-control">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                            </select>

                        </div>
                        <?php
                        include_once("lib/RedBeanPHP5_4_2/rb.php");
                        include_once("Dbsettings.php");
                        include_once("model/DB.php");
                        include_once("controller/Subject.php");
                        new DB($host, $port, $db_name, $user, $password);
                        ?>
                        <div class="form-group">
                            <label for="category_id">Дисциплина (тема)</label>
                            <select type="text" class="form-control" name="category_id"
                                    id="category_id">
                                <?php
                                $categories = new Subject();
                                foreach ($categories->get() as $category) { ?>
                                    <option value="<?php echo $category['id']; ?>">
                                        <?php echo $category['name']; ?>
                                    </option>
                                <?php } ?>

                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary mb-5">Сохранить</button>
                        <a href="lesson.php" class="btn btn-primary mb-5">Отмена</a>
                    </form>
                </div>
            </div>
        </div>
    </div><!-- / Inner Page Content End -->
<?php include_once('includes/footer.php'); ?>