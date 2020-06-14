<?php
if ($_POST) {
    $name = trim(htmlspecialchars($_POST['name']));
    $id = $_POST['id'];
    if (!empty($name)) {
        include_once("lib/RedBeanPHP5_4_2/rb.php");
        include_once("Dbsettings.php");
        include_once("model/DB.php");
        include_once("controller/Subject.php");
        new DB($host, $port, $db_name, $user, $password);
        $update = new Subject();
        $update->update($name, $id);
        header('location: category.php?msg=Запись успешно обновлена!');
    }
}
?>
<?php
session_start();
$title = "Редактировать тему";
$msg = '';
include_once('includes/header.php');
?>
    <div class="banner padd">
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
                    include_once("controller/Subject.php");
                    new DB($host, $port, $db_name, $user, $password);
                    ?>
                    <?php
                    $id = $_GET['id'];
                    $categories = new Subject();
                    foreach ($categories->getOne($id) as $category) {
                        ?>
                        <form method="post">
                            <div class="form-group">
                                <label for="name">Название категории</label>
                                <input type="text" class="form-control" id="name"
                                       placeholder="Название учебного материала"
                                       name="name"
                                       value="<?= $category['name'] ?>">
                                <input name="id" hidden value="<?= $category['id'] ?>">
                            </div>
                            <button type="submit" class="btn btn-primary">Обновить</button>
                            <a href="category.php?id=<?=$id?>" class="btn btn-primary">Отмена</a>
                        </form>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div><!-- / Inner Page Content End -->
<?php include_once('includes/footer.php'); ?>