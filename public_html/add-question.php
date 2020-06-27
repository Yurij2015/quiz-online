<?php
if ($_POST) {
    $question = trim(htmlspecialchars($_POST['question']));
    $testid = $_POST['testid'];
    if (!empty($question)) {
        include_once("lib/RedBeanPHP5_4_2/rb.php");
        include_once("Dbsettings.php");
        include_once("model/DB.php");
        include_once("controller/Question.php");
        include_once("controller/Answer.php");
        new DB($host, $port, $db_name, $user, $password);
        $create = new Question();
//        $create->create($question, $testid);
        $questionid = $create->create($question, $testid);
        $answer1 = trim(htmlspecialchars($_POST['answer1']));
        $answer2 = trim(htmlspecialchars($_POST['answer2']));
        $answer3 = trim(htmlspecialchars($_POST['answer3']));
        $answer4 = trim(htmlspecialchars($_POST['answer4']));

        $rightanswer = $_POST['rightanswer'];

        $createanswer1 = new Answer();
        $createanswer1->create($questionid, $answer1, $rightanswer, 1);

        $createanswer2 = new Answer();
        $createanswer2->create($questionid, $answer2, $rightanswer, 2);

        $createanswer3 = new Answer();
        $createanswer3->create($questionid, $answer3, $rightanswer, 3);

        $createanswer4 = new Answer();
        $createanswer4->create($questionid, $answer4, $rightanswer, 4);

        header('location: tests.php?msg=Запись успешно добавлена!');
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
                            <label for="rightanswer">Верный ответ</label>
                            <select name="rightanswer" id="rightanswer" class="form-control">
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
                        include_once("controller/Test.php");
                        new DB($host, $port, $db_name, $user, $password);
                        ?>
                        <div class="form-group">
                            <label for="testid">Tecт</label>
                            <select type="text" class="form-control" name="testid"
                                    id="testid">
                                <?php
                                $categories = new Test();
                                foreach ($categories->get() as $category) { ?>
                                    <option value="<?php echo $category['id']; ?>">
                                        <?php echo $category['name']; ?>
                                    </option>
                                <?php } ?>

                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary mb-5">Сохранить</button>
                        <a href="tests.php" class="btn btn-primary mb-5">Отмена</a>
                    </form>
                </div>
            </div>
        </div>
    </div><!-- / Inner Page Content End -->
<?php include_once('includes/footer.php'); ?>