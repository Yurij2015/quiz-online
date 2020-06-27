<?php
$testname = $_GET['testname'];
session_start();
$title = "Вопросы теста: $testname";
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
                    include_once("../controller/Test.php");
                    include_once("../controller/Question.php");
                    new DB($host, $port, $db_name, $user, $password);
                    $testid = $_GET['id'];
                    ?>
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>Вопрос</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $questions = new Question();
                        foreach ($questions->getQuestions($testid) as $question) {
                        ?>
                        <tr>
                            <td><?= $question['question'] ?></td>

                            <td>
                                <a href='view-question-answers.php?idquestion=<?= $question['id'] ?>&question=<?= $question['question'] ?>&testid=<?= $testid ?>' class='btn btn-info btn-sm'>Выбрать ответы</a>
                            </td>


                            <?php
                            }
                            ?>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <a href="testpage.php?id=<?= $testid ?>" class="btn btn-warning">Назад</a>
            <a href="testpage.php?id=<?= $testid ?>" class="btn btn-warning">Пройти тест</a>

        </div>
    </div>
<?php include_once('../includes/footer.php'); ?>