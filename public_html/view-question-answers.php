<?php
session_start();
$question = $_GET['question'];
$title = "Просмотр вариантов ответа на вопрос: <span class='text-danger'>$question</span>";
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
                    include_once("controller/Answer.php");
                    new DB($host, $port, $db_name, $user, $password);
                    $questionid = $_GET['id'];
                    $testid = $_GET['testid'];
                    ?>
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>Ответ</th>
                            <th>Номер в списке ответов</th>
                            <th>Правильный вариант ответа</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $ansers = new Answer();
                        foreach ($ansers->getAnswers($questionid) as $anser) {
                        if ($anser['ansnuminques'] === $anser['rightanswer']) {
                            $style = "#b3d4fc";
                        } else {
                            $style = "";
                        }
                        ?>

                        <tr style="background-color: <?= $style ?>">
                            <td><?= $anser['anser'] ?></td>
                            <td><?= $anser['ansnuminques'] ?></td>
                            <td><?= $anser['rightanswer'] ?></td>
                            <td><a href='view-test-questions.php?id=<?= $questionid ?>'
                                   class='btn btn-info btn-sm'>Открыть</a></td>
                            <?php
                            }
                            ?>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <a href="view-test-questions.php?id=<?= $testid ?>" class="btn btn-warning">Назад</a>
        </div>
    </div>
    </div>
    </div><!-- / Inner Page Content End -->
<?php include_once('includes/footer.php'); ?>