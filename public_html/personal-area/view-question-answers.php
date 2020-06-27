<?php
session_start();
$question = $_GET['question'];
$title = "Выберите свой вариант ответа на вопрос: <span class='text-danger'>$question</span>";
$msg = '';
if ($_POST) {
    $userid = $_POST['userid'];
    $questionid = $_POST['questionid'];
    $answer = $_POST['answer'];
    if (!empty($answer)) {
        include_once("../lib/RedBeanPHP5_4_2/rb.php");
        include_once("../Dbsettings.php");
        include_once("../model/DB.php");
        include_once("../controller/Userstat.php");
        new DB($host, $port, $db_name, $user, $password);
        $create = new Userstat();
        $create->create($userid, $questionid, $answer);
        header('location: subjects.php?msg=Запись успешно добавлена!');
    }
}
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
                    include_once("../controller/Answer.php");
                    new DB($host, $port, $db_name, $user, $password);
                    $questionid = $_GET['idquestion'];
                    $testid = $_GET['testid'];
                    ?>
                    <table class="table table-hover table-bordered mb-5">
                        <thead>
                        <tr>
                            <th>Варианты ответа</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $ansers = new Answer();
                        foreach ($ansers->getAnswers($questionid) as $anser) {
                        ?>
                        <tr>
                            <td><?= $anser['anser'] ?></td>
                            <?php
                            }
                            ?>
                        </tr>
                        </tbody>
                    </table>
                    <hr class="mb-5">
                    <h5 class="white mb-3"><?= $title ?></h5>
                    <form method="post">
                        <div class="form-group">
                            <label for="answer" hidden></label>
                            <select id="answer" class="form-control" name="answer">
                                <?php
                                $ansers = new Answer();
                                foreach ($ansers->getAnswers($questionid) as $anser) {
                                    ?>
                                    <option value="<?= $anser['id'] ?>"><?= $anser['anser'] ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                            <input id="userid" hidden name="userid" value="<?= $_SESSION['id']; ?>">
                            <input id="questionid" hidden name="questionid" value="<?= $questionid ?>">
                        </div>
                        <input type="submit" class="btn btn-warning float-right" value="Сохранить">
                    </form>
                </div>
            </div>
            <hr class="mt-5">
            <a href="view-test-questions.php?id=<?= $testid ?>" class="btn btn-warning mt-5">Назад</a>
        </div>
    </div>
<?php include_once('../includes/footer.php'); ?>