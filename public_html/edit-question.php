<?php
$id = $_GET['id'];
$testid = $_GET['testid'];
if ($_POST) {
    $question = trim(htmlspecialchars($_POST['question']));
    $id = $_POST['id'];
    if (!empty($question)) {
        include_once("lib/RedBeanPHP5_4_2/rb.php");
        include_once("Dbsettings.php");
        include_once("model/DB.php");
        include_once("controller/Question.php");
        new DB($host, $port, $db_name, $user, $password);
        $update = new Question();
        $update->update($question, $id);
        header("location: view-test-questions.php?id=" . $testid);
    }
}
?>
<?php
session_start();
$title = "Редактировать вопрос";
$msg = '';
include_once('includes/header.php');
?>
    <div class="banner padd">
        <div class="container">
            <img class="img-responsive" src="" alt=""/>
            <h2 class="white mt-3 mb-3"><?= $title ?></h2>
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
                    include_once("controller/Question.php");
                    new DB($host, $port, $db_name, $user, $password);
                    ?>
                    <?php
                    $categories = new Question();
                    foreach ($categories->getOne($id) as $category) {
                        ?>
                        <form method="post">
                            <div class="form-group">
                                <label for="name">Текст вопроса</label>
                                <input type="text" class="form-control" id="name"
                                       placeholder="Название учебного материала"
                                       name="question"
                                       value="<?= $category['question'] ?>">
                                <input name="id" hidden value="<?= $category['id'] ?>">
                            </div>
                            <button type="submit" class="btn btn-primary">Обновить</button>
                            <a href="view-test-questions.php?id=<?= $testid ?>" class="btn btn-primary">Отмена</a>
                        </form>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div><!-- / Inner Page Content End -->
<?php include_once('includes/footer.php'); ?>