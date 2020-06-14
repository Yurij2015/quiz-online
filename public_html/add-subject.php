<?php
if ($_POST) {
    $name = trim(htmlspecialchars($_POST['name']));
    if (!empty($name)) {
        include_once("lib/RedBeanPHP5_4_2/rb.php");
        include_once("Dbsettings.php");
        include_once("model/DB.php");
        include_once("controller/Subject.php");
        new DB($host, $port, $db_name, $user, $password);
        $create = new Subject();
        $create->create($name);
        header('location: subjects.php?msg=Запись успешно добавлена!');
    }
}
?>
<?php
session_start();
$title = "Добавить дисциплину (тему)";
$msg = '';
include_once('includes/header.php');
?>
    <div class="banner padd mt-5">
        <div class="container">
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
                            <label for="name">Название дисциплины (темы)</label>
                            <input type="text" class="form-control" id="name" placeholder="Название дисциплины">
                        </div>
                        <button type=" submit" class="btn btn-primary">Сохранить</button>
                        <a href="subjects.php" class="btn btn-primary">Отмена</a>
                    </form>
                </div>
            </div>
        </div>
    </div><!-- / Inner Page Content End -->
<?php include_once('includes/footer.php'); ?>