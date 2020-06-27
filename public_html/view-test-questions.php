<?php
session_start();
$title = "Просмотр вопросов теста";
$msg = '';
include_once('includes/header.php');
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
                    include_once("lib/RedBeanPHP5_4_2/rb.php");
                    include_once("Dbsettings.php");
                    include_once("model/DB.php");
                    include_once("controller/Test.php");
                    include_once("controller/Question.php");
                    new DB($host, $port, $db_name, $user, $password);
                    $testid = $_GET['id'];
                    ?>
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>Вопрос</th>
                            <th>Номер теста</th>
                            <th></th>
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
                            <td><?= $question['testid'] ?></td>
                            <td>
                                <a href="view-question-answers.php?id=<?= $question['id'] ?>&question=<?= $question['question'] ?>&testid=<?= $testid ?>"
                                   class='btn btn-info btn-sm'>Открыть
                                    варианты ответов</a></td>
                            <td><a href='edit-question.php?id=<?= $question['id'] ?>&testid=<?= $testid ?>'
                                   class='btn btn-info btn-sm'>Редактировать
                                    вопрос</a>
                            </td>
                            <?php
                            }
                            ?>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <a href="tests.php?id=<?= $testid ?>" class="btn btn-warning">Назад</a>
        </div>
    </div>
    </div>
    </div><!-- / Inner Page Content End -->
<?php include_once('includes/footer.php'); ?>